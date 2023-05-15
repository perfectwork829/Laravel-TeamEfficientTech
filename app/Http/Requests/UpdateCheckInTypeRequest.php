<?php

namespace App\Http\Requests;

use App\Models\CheckInType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCheckInTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('check_in_type_edit');
    }

    public function rules()
    {
        return [
            'check_in_type' => [
                'string',
                'required',
            ],
        ];
    }
}
