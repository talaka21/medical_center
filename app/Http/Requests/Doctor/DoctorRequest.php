<?php

namespace App\Http\Requests\Doctor;
use Illuminate\Foundation\Http\FormRequest;
class DoctorRequest extends FormRequest
{
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
         'name' => ['required', 'array'],
         'name.en' => ['required', 'string', 'max:255'],
         'name.ar' => ['required', 'string', 'max:255'],
         'email'=>['required','email','unique:doctors,email'],
         'password'=>['required','string','min:8']
        ];
    }

}
