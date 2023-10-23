<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'image' => ['required', 'image', 'dimensions=ratio:16/9,min_width:1920,min_height:1080'],
            'link' => ['required', 'string', 'max:255']
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules["$locale.title"] = ['required', 'string', 'max:255'];
            $rules["$locale.description"] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }
}
