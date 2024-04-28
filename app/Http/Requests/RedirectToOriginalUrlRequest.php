<?php

namespace App\Http\Requests;

use App\ValueObjects\MinimizedUrl;
use Illuminate\Foundation\Http\FormRequest;

class RedirectToOriginalUrlRequest extends FormRequest
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
            'minimized_url' => ['required', 'string'],
        ];
    }

    /**
     * @return array
     */
    public function validationData(): array
    {
        return array_merge(
            $this->all(),
            [
                'minimized_url' => $this->route('minimized_url'),
            ]
        );
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'minimized_url.required' => 'minimized_urlは必須です',
            'minimized_url.string' => 'minimized_urlは文字列である必要があります',
        ];
    }

    /**
     * @return MinimizedUrl
     */
    public function getMinimizedUrl(): MinimizedUrl
    {
        return new MinimizedUrl($this->minimized_url);
    }
}
