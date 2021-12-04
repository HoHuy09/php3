<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SavePassengerRequest extends FormRequest
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
            'name' => ['required',
            Rule::unique('passengers')->ignore($this->id)],
            'travel_time' => 'required',
            'image' => 'mimes:jpg,bmp,png'
        ];
        if ($this->id == null) {
            $requestRule['image'] = "required|" . $requestRule['image'];
        }
        return $requestRule;
    }


    public function messages()
    {
        return [
            'name.required' => "Hãy nhập tên",
            'name.unique' => "Tên đã tồn tại",
            "travel_time.required" => "Hãy nhập ngày",
            "image.required" => "Hãy up file ảnh",
            "image.mimes" => "Hãy Nhập đúng định dạng ảnh",
        ];
    }
}
