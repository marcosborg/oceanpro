<?php

namespace App\Http\Requests;

use App\Models\InnerService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInnerServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inner_service_edit');
    }

    public function rules()
    {
        return [
            'service_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'required',
            ],
        ];
    }
}
