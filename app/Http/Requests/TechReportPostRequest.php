<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechReportPostRequest extends FormRequest
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
			'inp_status' => 'required',
			'laporan_kegiatan' => 'required|max:2000',
		];
	}
	public function messages()
	{
		return [
			'inp_status.required' => 'Silakan pilih status terlebih dahulu.',
			'laporan_kegiatan.required' => 'Harap ukuran file tidak lebih dari 2000 kb.',
			'laporan_kegiatan.max' => 'Harap ukuran file tidak lebih dari 2000 kb.',
		];
	}
}
