<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
        $requestRule =  [
        'plate_number' => ['required',
        Rule::unique('cars')->ignore($this->id)],
        'owner' => 'required',
        'travel_fee' => 'required',
        'image' => 'mimes:jpg,bmp,png'];
        if($this->id == null){
            $requestRule['image'] = "required|" . $requestRule['image'];
        }
        return $requestRule;
    }

    public function messages()
    {
        return [
            'plate_number.required' => "Hãy nhập biển số",
            'plate_number.unique' => 'Biển số đã tồn tại',
            "owner.required" => "Hãy nhập chủ nhân",
            "travel_fee.required" => "Hãy nhập giá",
            "image.required" => "Hãy up file ảnh",
            "image.mimes" => "Hãy nhập đúng định dạng ảnh",
            
        ];
    }
}
