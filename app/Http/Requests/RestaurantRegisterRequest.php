<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRegisterRequest extends FormRequest
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
            'restaurant_name' => 'required|string|min:3|max:250',
            'restaurant_email' => 'required|email',
            'restaurant_password' => 'required|min:8|regex:/[0-9]/|regex:/[a-z]/|regex:/[A-Z]/|regex:/[@$!%*?&#]/',
            'restaurant_phone' => 'required|string|min:11|max:13',
            'restaurant_category' => 'required',

            'restaurant_street' => 'required|string|min:10',
            'restaurant_province' => 'required|string|min:3',
            'restaurant_city' => 'required|string|min:3',
            'restaurant_subdistrict' => 'required|string|min:3',
            'restaurant_postal_code' => 'required|digits:5',
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
            'restaurant_name.required' => 'Kolom nama wajib diisi.',
            'restaurant_name.min' => 'Kolom nama minimal memiliki 3 karakter.',
            'restaurant_name.max' => 'Kolom nama maksimal memiliki 250 karakter',
            'restaurant_email.required' => 'Kolom email wajib diisi.',
            'restaurant_password.required' => 'Kolom kata sandi wajib diisi.',
            'restaurant_password.min' => 'Kolom password minimal memiliki 8 karakter',
            'restaurant_password.regex:/[0-9]/' => 'Kata sandi harus mengandung setidaknya satu angka.',
            'restaurant_password.regex:/[a-z]/' => 'Kata sandi harus mengandung setidaknya satu huruf kecil.',
            'restaurant_password.regex:/[A-Z]/' => 'Kata sandi harus mengandung setidaknya satu huruf besar.',
            'restaurant_password.regex:/[@$!%*?&#]/' => 'Kata sandi harus mengandung setidaknya satu karakter spesial.',
            'restaurant_phone.required' => 'Kolom nomor HP wajib diisi.',
            'restaurant_phone.min' => 'Panjang nomor HP minimal 11 angka.',
            'restaurant_phone.max' => 'Panjang nomor HP maksimal 13 angka.',
            'restaurant_category.required' => 'Kolom kategori wajib dipilih.',
            'restaurant_street.required' => 'Kolom jalan wajib diisi.',
            'restaurant_street.min' => 'Kolom jalan minimal memiliki 10 karakter.',
            'restaurant_province.required' => 'Kolom provinsi wajib diisi.',
            'restaurant_province.min' => 'Kolom jalan minimal memiliki 3 karakter.',
            'restaurant_city.required' => 'Kolom kota wajib diisi.',
            'restaurant_city.min' => 'Kolom jalan minimal memiliki 3 karakter.',
            'restaurant_subdistrict.required' => 'Kolom kecamatan wajib diisi.',
            'restaurant_subdistrict.min' => 'Kolom kecamatan minimal memiliki 3 karakter.',
            'restaurant_postal_code.required' => 'Kolom kode pos wajib diisi.',
            'restaurant_postal_code.digits' => 'Kolom kode pos harus 5 angka.',
        ];
    }
}
