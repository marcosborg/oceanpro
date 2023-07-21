<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFeatureRequest;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FeatureController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('feature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $features = Feature::with(['media'])->get();

        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        abort_if(Gate::denies('feature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.features.create');
    }

    public function store(StoreFeatureRequest $request)
    {
        $feature = Feature::create($request->all());

        if ($request->input('image', false)) {
            $feature->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $feature->id]);
        }

        return redirect()->route('admin.features.index');
    }

    public function edit(Feature $feature)
    {
        abort_if(Gate::denies('feature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.features.edit', compact('feature'));
    }

    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $feature->update($request->all());

        if ($request->input('image', false)) {
            if (! $feature->image || $request->input('image') !== $feature->image->file_name) {
                if ($feature->image) {
                    $feature->image->delete();
                }
                $feature->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($feature->image) {
            $feature->image->delete();
        }

        return redirect()->route('admin.features.index');
    }

    public function show(Feature $feature)
    {
        abort_if(Gate::denies('feature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.features.show', compact('feature'));
    }

    public function destroy(Feature $feature)
    {
        abort_if(Gate::denies('feature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feature->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeatureRequest $request)
    {
        $features = Feature::find(request('ids'));

        foreach ($features as $feature) {
            $feature->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('feature_create') && Gate::denies('feature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Feature();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
