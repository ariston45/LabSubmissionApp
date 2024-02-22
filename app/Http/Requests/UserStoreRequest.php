<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
			'no_id' => 'required',
			'level' => 'required',
			'name' => 'required',
			'email' => 'required',
			'password' => 'required|min:8',
			'password_confirm' => 'required|same:password',
		];
	}
	/* Tags:... */
	public function messages()
	{
		return [
			'no_id.required' => 'Nomor id harus diisi.',
			'level.required' => 'Status harap dipilih dahulu.',
			'name.required' => 'Nama harap diisi.',
			'email.required' => 'Alamat email harap diisi.',
			'password.required' => 'Password harap diisi. ',
			'password.min' => 'Password tidak boleh kurang dari 8 karakter.',
			'password_confirm.required' => 'Konfirmasi password harap diisi. ',
			'password_confirm.same' => 'Konfirmasi password tidak sama.',
		];
	}
}
