<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'phone' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:100']
        ];

        foreach ($locales as $locale) {
            $rules[$locale] = ['required', 'array'];
            $rules["$locale.address"] = ['required', 'string', 'min:0', 'max:255'];
        }

        return $rules;
    }
}
