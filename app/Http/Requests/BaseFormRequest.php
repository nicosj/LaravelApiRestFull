<?php

namespace App\Http\Requests;

use App\Exceptions\JsonAutorizationException;
use App\Exceptions\JsonValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{

    protected function failedAuthorization()
    {
        throw new JsonAutorizationException;
    }

    protected function failedValidation(Validator $validator)
    {
        // parent::failedValidation($validator);
        throw new JsonValidationException($validator);
    }
}
