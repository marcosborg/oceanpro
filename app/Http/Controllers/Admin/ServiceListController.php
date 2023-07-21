<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceListRequest;
use App\Http\Requests\StoreServiceListRequest;
use App\Http\Requests\UpdateServiceListRequest;
use App\Models\ServiceList;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceListController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_list_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceLists = ServiceList::all();

        return view('admin.serviceLists.index', compact('serviceLists'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_list_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceLists.create');
    }

    public function store(StoreServiceListRequest $request)
    {
        $serviceList = ServiceList::create($request->all());

        return redirect()->route('admin.service-lists.index');
    }

    public function edit(ServiceList $serviceList)
    {
        abort_if(Gate::denies('service_list_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceLists.edit', compact('serviceList'));
    }

    public function update(UpdateServiceListRequest $request, ServiceList $serviceList)
    {
        $serviceList->update($request->all());

        return redirect()->route('admin.service-lists.index');
    }

    public function show(ServiceList $serviceList)
    {
        abort_if(Gate::denies('service_list_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.serviceLists.show', compact('serviceList'));
    }

    public function destroy(ServiceList $serviceList)
    {
        abort_if(Gate::denies('service_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceList->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceListRequest $request)
    {
        $serviceLists = ServiceList::find(request('ids'));

        foreach ($serviceLists as $serviceList) {
            $serviceList->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
