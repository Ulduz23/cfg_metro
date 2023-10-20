<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlideRequest extends FormRequest
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
            'image' => ['image', 'dimensions:ratio=16/9,min_width=1920,min_height=1080']
        ];

        foreach (config('translatable.locales') as $locale) {
            $rules[$locale] = ['array'];
            $rules["$locale.title"] = ['string', 'max:50'];
        }

        return $rules;
    }
}
