<?php

namespace App\Http\Requests;

use App\Models\ServiceList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyServiceListRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('service_list_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:service_lists,id',
        ];
    }
}
