<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaiDangRequest extends FormRequest
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
            'ShopAddress'=>'required',
            'ShopPhone'=>'required|min:10|numeric',
            'RecAddress'=>'required',
            'RecPhone'=>'required|min:10|numeric',
            'Note'=>'required',
            'NameGoods'=>'required',
            'Number'=>'required|numeric',
            'Deposit'=>'required|numeric',
            'ShipMoney'=>'required|numeric',
        ];
    }
}
