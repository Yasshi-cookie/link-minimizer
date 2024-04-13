<?php

namespace App\Http\Requests;

use App\ValueObjects\RedirectableUrl;
use Illuminate\Foundation\Http\FormRequest;

class UrlMinimizeRequest extends FormRequest
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
            'long_url' => ['required'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'long_url.required' => 'urlは必須です',
        ];
    }

    /**
     * @return RedirectableUrl
     */
    public function getLongUrl(): RedirectableUrl
    {
        return new RedirectableUrl($this->long_url);
    }
}
