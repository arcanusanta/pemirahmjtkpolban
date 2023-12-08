<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreWitnessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'nim' => 'required',
            'name' => 'required',
            'grade' => 'required',
            'study_program' => 'required',
            'year' => 'required',
            'email' => 'required|unique:witnesses',
            'password' => 'required'
        ];
    }
}
