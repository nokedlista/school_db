<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends BasicRequest
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
        if ($this->method() === 'PATCH') {
            return ['name' => 'nullable|min:2|max:255'];
        }
        return [
            'grade' => 'required|min:1|max:1',
        ];
    }

    public function messages(): array
    {
        return [
            'grade.required' => 'A jegy kötelező mező!',
            'grade.max' => 'A jegy legfeljebb 255 karakter legyen!',
            'grade.min' => 'A jegy legalább 3 karakter legyen!',
        ];
    }
}
