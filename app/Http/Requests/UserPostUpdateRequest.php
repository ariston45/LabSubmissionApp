<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostUpdateRequest extends FormRequest
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
			'inp_name' => 'required',
			'inp_no_id' => 'required',
			'inp_email' => 'required',
			// 'inp_no_contact' => 'required',
			'inp_level' => 'required',
			// 'inp_password' => 'required|min:8',
			'inp_password_confirm' => 'same:inp_password'
		];
	}
	public function messages()
	{
		return [
			'inp_no_id.required' => 'Nomor id harus diisi.',
			'inp_level.required' => 'Status harap dipilih dahulu.',
			'inp_name.required' => 'Nama harap diisi.',
			'inp_email.required' => 'Alamat email harap diisi.',
			// 'inp_password.required' => 'Password harap diisi. ',
			// 'inp_password.min' => 'Password tidak boleh kurang dari 8 karakter.',
			// 'inp_password_confirm.required' => 'Konfirmasi password harap diisi. ',
			'inp_password_confirm.same' => 'Konfirmasi password tidak sama.',
		];
	}
}
