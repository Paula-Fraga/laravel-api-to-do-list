<?php

namespace App\Http\Requests;

use App\Exceptions\BadRequestException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->route('id');

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'password' => 'nullable|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name must not exceed :max characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken for another user.',
            'password.min' => 'The password must be at least :min characters.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $userId = $this->route('id');
            if($userId != auth()->user()->id)
            {
                $validator->errors()->add('id', 'The id passed does not belong to the logged in user!');
            }
        });

        if ($validator->fails()) 
        {
            throw new BadRequestException($validator->errors());
        }
    }
}
