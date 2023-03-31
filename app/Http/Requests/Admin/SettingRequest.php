<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch($this->method()){
            case 'POST' : {
                return [
                    'alamat' => 'required|string|max:255',
                    'phone' => 'required',
                    'email' => 'required|email',
                    'footer_description' => 'required',
                    'tentang_perusahaan' => 'required',
                    'sejarah_perusahaan' => 'required',
                    'facebook' => 'required',
                    'twitter' => 'required',
                    'instagram' => 'required',
                    'linkedin' => 'required',
                ];
            }
            case 'PUT' :
            case 'PATCH' : {
                return [
                    'alamat' => 'required|string|max:255',
                    'phone' => 'required',
                    'email' => 'required|email|max:255',
                    'footer_description' => 'required',
                    'tentang_perusahaan' => 'required',
                    'sejarah_perusahaan' => 'required',
                    'facebook' => 'required|max:255',
                    'twitter' => 'required|max:255',
                    'instagram' => 'required|max:255',
                    'linkedin' => 'required|max:255',
                ];
            }
        }
    }
}
