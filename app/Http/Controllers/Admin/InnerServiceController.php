<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInnerServiceRequest;
use App\Http\Requests\StoreInnerServiceRequest;
use App\Http\Requests\UpdateInnerServiceRequest;
use App\Models\InnerService;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InnerServiceController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('inner_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $innerServices = InnerService::with(['service', 'media'])->get();

        return view('admin.innerServices.index', compact('innerServices'));
    }

    public function create()
    {
        abort_if(Gate::denies('inner_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.innerServices.create', compact('services'));
    }

    public function store(StoreInnerServiceRequest $request)
    {
        $innerService = InnerService::create($request->all());

        if ($request->input('image', false)) {
            $innerService->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $innerService->id]);
        }

        return redirect()->route('admin.inner-services.index');
    }

    public function edit(InnerService $innerService)
    {
        abort_if(Gate::denies('inner_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $innerService->load('service');

        return view('admin.innerServices.edit', compact('innerService', 'services'));
    }

    public function update(UpdateInnerServiceRequest $request, InnerService $innerService)
    {
        $innerService->update($request->all());

        if ($request->input('image', false)) {
            if (! $innerService->image || $request->input('image') !== $innerService->image->file_name) {
                if ($innerService->image) {
                    $innerService->image->delete();
                }
                $innerService->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($innerService->image) {
            $innerService->image->delete();
        }

        return redirect()->route('admin.inner-services.index');
    }

    public function show(InnerService $innerService)
    {
        abort_if(Gate::denies('inner_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $innerService->load('service');

        return view('admin.innerServices.show', compact('innerService'));
    }

    public function destroy(InnerService $innerService)
    {
        abort_if(Gate::denies('inner_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $innerService->delete();

        return back();
    }

    public function massDestroy(MassDestroyInnerServiceRequest $request)
    {
        $innerServices = InnerService::find(request('ids'));

        foreach ($innerServices as $innerService) {
            $innerService->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('inner_service_create') && Gate::denies('inner_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new InnerService();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
