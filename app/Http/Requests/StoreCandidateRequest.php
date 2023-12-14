<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCandidateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'sequence_number' => "required|unique:candidates",
            'fullname' => "required|unique:candidates",
            "photo" => "required|mimes:jpeg,png,jpg|max:2048",
            "vision_and_mission" => "required|mimes:pdf",
            "curriculum_vitae" => "required|mimes:pdf",
        ];
    }
}
