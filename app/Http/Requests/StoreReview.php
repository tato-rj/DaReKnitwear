<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReview extends FormRequest
{
    protected $errorBag = 'store_review';

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
     * @return array
     */
    public function rules()
    {
        return [
            'reviewable_type' => 'required',
            'reviewable_id' => 'required',
            'name' => 'required|min:2',
            'email' => 'required|email',
            'title' => 'required|min:4',
            'comment' => 'required|min:4',
            'rating' => 'required'
        ];
    }
}
