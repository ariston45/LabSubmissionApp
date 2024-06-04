<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabTestPostRequest extends FormRequest
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
			"inp_name" => "required",
			// "inp_description" => "required",
			"inp_utility" => "required",
			"inp_cost" => "required",
			// "upload_url_img" => "dimensions:ratio=5/3"
		];
	}
	function messages() {
		return [
			"inp_name.required" => "Silakan masukkan nama uji lab.",
			// "inp_description.required" => "Silakan masukkan diskripsi tes laboratorium.",
			"inp_utility.required" => "Silakan tambahkan alat yang digunakan.",
			"inp_cost.required" => "Silakan inputkan biaya.",
			// "upload_url_img.dimensions" => "Ukuran rasio gambar paling sesuai 5*3, silakan sesuaikan gambar."
		];
	}
}
