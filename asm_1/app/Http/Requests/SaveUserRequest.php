<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            Rule::unique('users')->ignore($this->id)],
            'email' => ['required','email',
            Rule::unique('users')->ignore($this->id)],
            'password' => 'required',
        'image' => 'mimes:jpg,bmp,png'];
        if($this->id == null){
            $requestRule['image'] = "required|" . $requestRule['image'];
        }
        return $requestRule;
    }
    

    public function messages()
    {
        return [
            'name.required' => "Hãy nhập tên",
            'name.unique' => "Tên đã tồn tại",
            'email.required' => "Hãy nhập email",
            'email.unique' => "Email đã tồn tại",
            "email.email" => "Email không đúng định dạng",
            "password.required" => "Hãy nhập password",
            "image.required" => "Hãy up file ảnh",
            "image.mimes" => "Hãy nhập đúng định dạng ảnh",
        ];
    }
}
