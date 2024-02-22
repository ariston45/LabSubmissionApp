<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanPostRequest extends FormRequest
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
			'inp_kegiatan' => 'required',
			'inp_judul' => 'required',
			'date_start' => 'required',
			'time_start' => 'required',
			'date_end' => 'required',
			'time_end' => 'required',
			'inp_lab' => 'required',
			'bukti_pembayaran' => 'max:500'
		];
	}
	public function messages()
	{
		return [
			'inp_kegiatan.required' => 'Silakan pilih jenis kegiatan terlebih dahulu.',
			'inp_judul.required' => 'Masukkan judul kegiatan terlebih dahulu.',
			'date_start.required' => 'Masukkan tanggal mulai kegiatan terlebih dahulu.',
			'time_start.required' => 'Masukkan jam terlebih dahulu.',
			'date_end.required' => 'Masukkan tanggal selesai kegiatan terlebih dahulu.',
			'time_end.required' => 'Masukkan jam terlebih dahulu.',
			'inp_lab.required' => 'Silakan pilih laboratorium terlebih dahulu.',
			'bukti_pembayaran.max' => 'Harap ukuran file tidak lebih dari 500 kb.',
		];
	}
}
