<?php

namespace Mawuekom\Fastkit\Http\Requests;

use Mawuekom\Fastkit\Http\Requests\BaseFormRequest;

class CheckMetaIDRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'meta_id' => 'required|string'
        ];
    }

    /**
     * Set the messages for validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}