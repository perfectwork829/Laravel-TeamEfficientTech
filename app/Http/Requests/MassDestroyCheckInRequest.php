<?php

namespace App\Http\Requests;

use App\Models\CheckIn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCheckInRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('check_in_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:check_ins,id',
        ];
    }
}
