<?php

namespace App\Http\Requests;

use App\Models\UserNotification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_notification_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
