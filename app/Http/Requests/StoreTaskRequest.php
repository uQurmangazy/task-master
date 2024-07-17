<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status_id' => 'required|exists:statuses,id',
            'due_date' => [
                'required',
                'date',
                'after_or_equal:' . date('Y-m-d')
            ]
        ];
    }

    public function messages() : array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'status_id.required' => 'The status field is required.',
            'status_id.exists' => 'The selected status is invalid.',
            'due_date.required' => 'The due date field is required.',
            'due_date.date' => 'The due date is not a valid date.',
            'due_date.after_or_equal' => 'The due date cannot be in the past.'
        ];
    }
}
