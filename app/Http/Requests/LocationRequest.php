<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ];
    }
}
