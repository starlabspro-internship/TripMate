<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image',],
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'], 
            'lastname' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'], 
            'phone' => ['nullable', 'string', 'regex:/^\+?[0-9\s-]*$/', 'max:20'], 
            'city' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
        ];
    }
}
