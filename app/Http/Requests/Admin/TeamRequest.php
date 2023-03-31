<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
                    'nama' => 'required|string|max:255',
                    'jabatan' => 'required',
                    'photo' => ['required','image','mimes:jpeg,png,jpg,gif','max:4096'],
                    'bio' => 'required',
                ];
            }
            case 'PUT' :
            case 'PATCH' : {
                return [
                    'nama' => ['required', 'max:255', 'unique:teams,nama,'. $this->route()->team->id],
                    'jabatan' => 'required',
                    'photo' => ['image','mimes:jpeg,png,jpg,gif','max:4096'],
                    'bio' => 'required',
                ];
            }
        }
    }
}
