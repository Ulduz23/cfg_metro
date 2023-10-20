<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
        $locales = config('translatable.locales');

        $rules = [
            'image' => ['required', 'image', 'max:1024', 'dimensions:ratio=1/1,min_width=650,min_height=650'],
        ];

        foreach ($locales as $locale) {
            $rules = [
                $locale => ['required', 'array'],
                "$locale.title" => ['required', 'string', 'max:255']
            ];
        }

        return $rules;
    }
}
