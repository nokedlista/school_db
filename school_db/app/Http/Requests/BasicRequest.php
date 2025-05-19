<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            // 'grade' => 'required|min:1|max:1',
            // 'subject' => 'required|min:3|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A név kötelező mező!',
            'name.min' => 'A név legalább 2 karakter legyen!',
            'name.max' => 'A név legfeljebb 255 karakter legyen!',
            // 'grade.required' => 'A jegy kötelező mező!',
            // 'grade.max' => 'A jegy legfeljebb 255 karakter legyen!',
            // 'grade.min' => 'A jegy legalább 3 karakter legyen!',
            // 'subject.required' => 'A tantárgy kötelező!',
            // 'subject.min' => 'Legalább 3 karakter legyen!',
            // 'subject.max' => 'Legfeljebb 255 karakter legyen!'
        ];
    }
}
