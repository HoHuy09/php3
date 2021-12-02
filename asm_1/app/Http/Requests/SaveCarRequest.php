<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveCarRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'plate_number' => 'required',
            'owner' => 'required',
            'travel_fee' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'plate_number.required' => "Hãy nhập biển số",
            "owner.required" => "Hãy nhập chủ nhân",
            "travel_fee.required" => "Hãy nhập giá",
            "image.required" => "Hãy up file ảnh",
        ];
    }
}
