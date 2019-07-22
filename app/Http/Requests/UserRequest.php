<?php

namespace App\Http\Requests;

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
            'id' => 'required',
            'name' => 'required',
            'comment' => 'required',
            'gamelist' => 'required',
            'game_id' => 'required',
            'icon_image' => 'required',
            'background_image' => 'required',
            'twitter_url' => 'required',
            'board_name' => 'required',
            'board_comment' => 'required',
        ];
    }
}
