<?php

namespace Modules\Stock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProductRequest
 * @package Modules\Stock\Http\Requests
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 31/01/2017
 * @version 1.0
 */
class ProductRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $id = $this->id;
		return [
            'name' => "required|max:255|unique:stock_products,name,$id",
            'stock_category_id' => 'required|integer',
            'unit_id' => 'required|integer',
            'qtd' => 'integer',
            'max' => 'integer',
            'min' => 'integer',
            'purchase' => 'integer'
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
}
