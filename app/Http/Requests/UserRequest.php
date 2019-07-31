<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'comment' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => '氏名',
            'comment' => 'コメント',
        ];
    }
    public function messages() {
        return [
            'name.required' => '*:attributeは必須項目です。',
            'comment.required' => '*:attributeは必須項目です。',
        ];
    }
    public function userAttributes()
    {
        return $this->only([
            'name',
            'comment'
        ]);
    }
}
