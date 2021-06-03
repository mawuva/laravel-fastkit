<?php

namespace Mawuekom\Fastkit\Http\Requests;

use Urameshibr\Requests\FormRequest;

/**
 * Allow to implement form requests for lumen
 * 
 * Abstract Class BaseFormRequest
 * 
 * @package Mawuekom\Fastkit\Http\Requests
 */
abstract class BaseFormRequest extends FormRequest
{
    public function validateResolved()
    {
        parent::validateResolved();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();
}