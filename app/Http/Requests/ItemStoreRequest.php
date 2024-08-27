<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'name'        => 'required|max:255|string',
             'number_code' => 'required|numeric',
            'section'     => 'required|integer',
            'site'        => 'required|integer',
            'price_pay'   => 'integer',
            'quantity'    => 'required|integer',
            'unit'        => 'required|max:255|string',
        ];
    }
}
