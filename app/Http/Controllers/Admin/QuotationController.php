<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuotationRequest;
use App\Http\Requests\StoreQuotationRequest;
use App\Http\Requests\UpdateQuotationRequest;
use App\Models\Quotation;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuotationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotations = Quotation::with(['subject'])->get();

        return view('admin.quotations.index', compact('quotations'));
    }

    public function create()
    {
        abort_if(Gate::denies('quotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Service::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.quotations.create', compact('subjects'));
    }

    public function store(StoreQuotationRequest $request)
    {
        $quotation = Quotation::create($request->all());

        return redirect()->route('admin.quotations.index');
    }

    public function edit(Quotation $quotation)
    {
        abort_if(Gate::denies('quotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Service::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $quotation->load('subject');

        return view('admin.quotations.edit', compact('quotation', 'subjects'));
    }

    public function update(UpdateQuotationRequest $request, Quotation $quotation)
    {
        $quotation->update($request->all());

        return redirect()->route('admin.quotations.index');
    }

    public function show(Quotation $quotation)
    {
        abort_if(Gate::denies('quotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotation->load('subject');

        return view('admin.quotations.show', compact('quotation'));
    }

    public function destroy(Quotation $quotation)
    {
        abort_if(Gate::denies('quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotation->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuotationRequest $request)
    {
        $quotations = Quotation::find(request('ids'));

        foreach ($quotations as $quotation) {
            $quotation->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
