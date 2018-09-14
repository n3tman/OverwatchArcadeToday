<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Gamemode extends FormRequest
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
        $maxGamemodeId = \App\Gamemode::all()->count();

        return [
            'tile_1' => 'required|integer|min:1|max:' . $maxGamemodeId,
            'tile_2' => 'required|integer|min:1|max:' . $maxGamemodeId,
            'tile_3' => 'required|integer|min:1|max:' . $maxGamemodeId,
            'tile_4' => 'required|integer|min:1|max:' . $maxGamemodeId,
            'tile_5' => 'required|integer|min:1|max:' . $maxGamemodeId,
        ];
    }
}
