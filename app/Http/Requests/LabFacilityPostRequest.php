<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabFacilityPostRequest extends FormRequest
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
			'inp_fasilitas' => 'required',
		];
	}
	public function messages()
	{
		return [
			'inp_fasilitas.required' => 'Silakan masukkan nama alat atau fasilitas terlebih dahulu.',
		];
	}
}
