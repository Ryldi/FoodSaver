<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
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
            'customer_name' => 'required|string|min:3|max:250',
            'customer_email' => 'required|email',
            'customer_password' => 'required|min:8|regex:/[0-9]/|regex:/[a-z]/|regex:/[A-Z]/|regex:/[@$!%*?&#]/',
            'customer_phone' => 'required|string|min:11|max:13',
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_name.required' => 'Kolom nama wajib diisi.',
            'customer_name.min' => 'Kolom nama minimal memiliki 3 karakter.',
            'customer_name.max' => 'Kolom nama maksimal memiliki 250 karakter',
            'customer_email.required' => 'Kolom email wajib diisi.',
            'customer_password.required' => 'Kolom kata sandi wajib diisi',
            'customer_password.min' => 'Kolom password minimal memiliki 8 karakter',
            'customer_password.regex:/[0-9]/' => 'Kata sandi harus mengandung setidaknya satu angka.',
            'customer_password.regex:/[a-z]/' => 'Kata sandi harus mengandung setidaknya satu huruf kecil.',
            'customer_password.regex:/[A-Z]/' => 'Kata sandi harus mengandung setidaknya satu huruf besar.',
            'customer_password.regex:/[@$!%*?&#]/' => 'Kata sandi harus mengandung setidaknya satu karakter spesial.',
            'customer_phone.required' => 'Kolom nomor HP wajib diisi.',
            'customer_phone.min' => 'Panjang nomor HP minimal 11 angka.',
            'customer_phone.max' => 'Panjang nomor HP maksimal 13 angka.'
        ];
    }
}
