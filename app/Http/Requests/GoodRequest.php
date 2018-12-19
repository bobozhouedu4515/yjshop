<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodRequest extends FormRequest
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
            'name'=>'required',
            'product_id'=>'required',
            'picture'=>'required',
            'pictures'=>'required',
            'description'=>'required',
            'content'=>'required',

            //
        ];
    }

    public function messages ()
    {
        return [
            'name.required'=>'名称不能为空',
            'product_id.required'=>'分类不能为空',
            'picture.required'=>'图册不能为空',
            'pictures.required'=>'图库不能为空',
            'description.required'=>'描述不能为空',
            'content.required'=>'详情不能为空',

            //
        ];

    }
}
