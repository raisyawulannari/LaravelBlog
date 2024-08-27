<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:20',
            'content' => 'nullable|image|max:2048',
            'status' => 'required',
        ];        

        return $rules;
    }
}
