<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabPostRequest extends FormRequest
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
			'inp_laboratorium' => 'required',
			'inp_kalab' => 'required',
			'inp_teknisi' => 'required',
			'inp_status' => 'required',
		];
	}
	public function messages()
	{
		return [
			'inp_laboratorium.required' => 'Silakan masukkan nama laboratorium terlebih dahulu.',
			'inp_kalab.required' => 'Silakan pilih kepala laboratorium terlebih dahulu.',
			'inp_teknisi.required' => 'Silakan pilih teknisi laboratorium terlebih dahulu.',
			'inp_status.required' => 'Silakan pilih status lab.',
		];
	}
}
