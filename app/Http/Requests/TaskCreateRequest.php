<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\BadRequestException;
use Illuminate\Support\Facades\Auth;

class TaskCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:Pendente,Em andamento,Concluido',
            'priority' => 'required|string|in:Baixo,Medio,Alto',
            'due_date' => 'nullable|date',
        ];
    }

    /**
     * Get custom error messages for the rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title must not be more than :max characters.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be "Pendente", "Em andamento", or "Concluido".',
            'priority.required' => 'The priority field is required.',
            'priority.in' => 'The priority must be "Baixo", "Medio", or "Alto".',
            'due_date.date' => 'The due date field must be a valid date.',
        ];
    }

    public function withValidator($validator)
    {
        if($validator->fails())
        {
            throw new BadRequestException($validator->errors()); 
        }
    }
}
