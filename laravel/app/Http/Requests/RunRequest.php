<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RunRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'descr' => 'required|string',
            'duration' => 'required|integer|min:1',
            'theme' => 'string|max:255',
            'img' => 'required|image|mimes:jpeg,png|max:2048',
            'departure' => 'required|array',
            'arrival' => 'required|array',
        ];
    }
}
