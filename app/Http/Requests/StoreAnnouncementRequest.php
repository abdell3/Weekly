<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnouncementRequest extends FormRequest
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
            'titre' => 'required|unique:annonces,titre',
            'slug' => 'required|unique:annonces,slug',
            'description' => 'required',
            'prix' => 'required|numeric',
            'status' => 'required|in:actif,brouillon,archive'
        ];
    }
}
