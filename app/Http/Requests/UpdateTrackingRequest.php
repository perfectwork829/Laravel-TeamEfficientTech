<?php

namespace App\Http\Requests;

use App\Models\Tracking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTrackingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tracking_edit');
    }

    public function rules()
    {
        return [
            'lat' => [
                'string',
                'required',
            ],
            'lon' => [
                'string',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
