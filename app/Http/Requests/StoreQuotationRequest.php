<?php

namespace App\Http\Requests;

use App\Models\Quotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quotation_create');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'subject_id' => [
                'required',
                'integer',
            ],
            'message' => [
                'required',
            ],
        ];
    }
}
