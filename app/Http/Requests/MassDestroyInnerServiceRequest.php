<?php

namespace App\Http\Requests;

use App\Models\InnerService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInnerServiceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('inner_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:inner_services,id',
        ];
    }
}
