<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
   
    public function authorize(): bool
    {
         return true;
    }

    public function rules(): array
    {
        return [
            'activity_name' => 'required|string|max:255',  
            'platform' => 'required|string|max:255',  
            'description' => 'required',               
            'deadline' => 'required|date',         
            'post_id' => 'required|exists:posts,id' 
        ];
    }

    public function messages(): array
    {
        return [
            
            'activity_name.required' => 'Field activity name harus diisi.',
            'platform.required' => 'Field platform harus diisi.',
            'platform.string' => 'Field platform harus berupa string.',
            'platform.max' => 'Field platform tidak boleh lebih dari 255 karakter.',
            'description.required' => 'Field description harus diisi.',
            'deadline.required' => 'Field deadline harus diisi.',
            'deadline.date' => 'Field deadline harus berupa tanggal yang valid.',
            'post_id.required' => 'Field post ID harus diisi.',
            'post_id.exists' => 'Post ID yang dipilih tidak valid atau tidak ada.'
        ];
    }
}
