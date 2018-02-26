<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            //
            'name' => 'required|unique:projects',
            'thumbnail' => 'image|dimensions:min-width=261,min-height=98'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '项目名称是必填的',
            'name.unique' => '项目名称已经被占用',
            'thumbnail.image' => '请上传图片格式的文件',
            'thumbnail.dimensions' => '上传的图片尺寸过小,请修改后上传'
        ];
    }
}
