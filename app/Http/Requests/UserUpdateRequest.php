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
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
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
