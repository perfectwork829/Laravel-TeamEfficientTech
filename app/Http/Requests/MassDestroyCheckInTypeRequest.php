<?php

namespace App\Http\Requests;

use App\Models\CheckInType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCheckInTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('check_in_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:check_in_types,id',
        ];
    }
}
