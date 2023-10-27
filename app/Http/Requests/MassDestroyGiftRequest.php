<?php

namespace App\Http\Requests;

use App\Models\Gift;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGiftRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gift_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gifts,id',
        ];
    }
}
