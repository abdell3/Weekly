<?php

namespace App\Http\Requests;

use App\Models\Announcement;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnouncementRequest extends FormRequest
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
    public function rules(Announcement $annoyncement): array
    {
        return [
            'titre' => 'required|unique:annonces,titre,' . $annoyncement->id,
            'slug' => 'required|unique:annonces,slug,' . $annoyncement->id,
            'description' => 'required',
            'prix' => 'required|numeric',
            'status' => 'required|in:actif,brouillon,archive'
        ];
    }
}
