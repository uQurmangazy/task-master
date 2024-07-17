<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'status_id' => 'sometimes|exists:statuses,id',
            'due_date' => [
                'sometimes',
                'date',
                'after_or_equal:' . date('Y-m-d')
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'title.sometimes' => 'The title field is sometimes required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.sometimes' => 'The description field is sometimes required.',
            'description.string' => 'The description must be a string.',
            'status_id.sometimes' => 'The status field is sometimes required.',
            'status_id.exists' => 'The selected status is invalid.',
            'due_date.sometimes' => 'The due date field is sometimes required.',
            'due_date.date' => 'The due date must be a valid date.',
            'due_date.after_or_equal' => 'The due date cannot be in the past.'
        ];
    }
}
