<?php

namespace Lembarek\Admin\Requests;

class CreateTagRequest extends Request
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
        'title' => 'string',
        'subtitle' => 'string',
        "page_image" => "string",
        "mega_description" => "string",
        "layout" => "string",
        "direction" => "string",
    ];
    }

}