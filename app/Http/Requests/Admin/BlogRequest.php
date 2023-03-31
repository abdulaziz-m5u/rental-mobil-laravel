<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
                    'title' => 'required|string|max:255',
                    'excerpt' => 'required|string|max:255',
                    'description' => 'required',
                    'type_id' => 'required',
                    'status' => 'required',
                    'image' =>  ['required','image','mimes:jpeg,png,jpg,gif','max:4096'],
                ];
            }
            case 'PUT' :
            case 'PATCH' : {
                return [
                    'title' => ['required', 'max:255', 'unique:blogs,title,'. $this->route()->blog->id],
                    'excerpt' => 'required|string|max:255',
                    'description' => 'required',
                    'type_id' => 'required',
                    'status' => 'required',
                    'image' =>  ['image','mimes:jpeg,png,jpg,gif','max:4096'],
                ];
            }
        }
    }
}
