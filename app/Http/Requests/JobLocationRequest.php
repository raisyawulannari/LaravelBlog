<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobLocationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'job_id' => 'required|exists:jobs,id',
            'location_id' => 'required|exists:locations,location_id',
        ];
    }
}
