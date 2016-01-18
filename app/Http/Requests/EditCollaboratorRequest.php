<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditCollaboratorRequest extends Request
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
            'full_name' => 'required',
            'post' => 'in:SEO,manager,tester,developer',
            'salary' => 'required|integer',
            'date' => 'date',
            'photo' => 'image',
        ];
    }
}
