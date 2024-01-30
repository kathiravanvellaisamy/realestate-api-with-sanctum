<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'property_type' => [$this->isPostRequest()],
            'address' => [$this->isPostRequest(),'max:255'],
            'city' => [$this->isPostRequest()],
            'zip_code' => [$this->isPostRequest()],
            'description' => [$this->isPostRequest()],
            'build_year' => [$this->isPostRequest()],
            'bedrooms' => [$this->isPostRequest()],
            'bathrooms' => [$this->isPostRequest()],
            'sqft' => [$this->isPostRequest()],
            'price' => [$this->isPostRequest()],
            'price_sqft' => [$this->isPostRequest()],
            'property_category' => [$this->isPostRequest()],
            'status' => [$this->isPostRequest()],
        ];
    }
    private function isPostRequest(){
        return request()->isMethod('post') ? 'required' : 'nullable';
    }
}
