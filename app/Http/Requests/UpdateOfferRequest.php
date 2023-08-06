<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return $rules = [
            'name_ar' => 'required|max:100',
            'name_en' => 'required|max:100',
            'price' => 'required|numeric',
            'details_ar' => 'required',
            'details_en' => 'required',
        ];
    }

    public function messages()
    {
        return $messages = [
            'name_ar.required' => __('messages.offer name_ar required'),
            'name_en.required' => __('messages.offer name_en required'),
            'price.required' => trans('messages.offer price required'),
            'price.numeric' => trans('messages.offer price must be numeric'),
            'details_ar.required' => __('messages.offer details_ar required'),
            'details_en.required' => __('messages.offer details_en required'),
        ];
    }
}
