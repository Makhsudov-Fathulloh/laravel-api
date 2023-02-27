<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function attributes(): array
    {
        return [
            'title' => 'Sarlavha',
            'short_content' => 'Qisqacha mazmuni',
            'content' => 'Maqola',
            'photo' => 'Photo'
        ];
    }


    public function authorize() // dostup
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'short_content' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|max:2048'
        ];
    }
}
