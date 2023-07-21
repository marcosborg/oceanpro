<?php

namespace App\Http\Requests;

use App\Models\ServiceList;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceListRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_list_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
