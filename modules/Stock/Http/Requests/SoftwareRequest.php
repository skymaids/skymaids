<?php

namespace Modules\Stock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SoftwareRequest
 * @package Modules\Stock\Http\Requests
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 31/01/2017
 * @version 1.0
 */
class SoftwareRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required|max:45',
            'version' => 'max:15'
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
