<?php

namespace App\Http\Requests;

use App\Models\CheckIn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCheckInRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('check_in_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
