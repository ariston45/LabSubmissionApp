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
			'inp_nama' => 'required',
			'inp_id' => 'required',
			'inp_nomor_kontak' => 'required',
			'inp_institusi' => 'required',
			'inp_kegiatan' => 'required',
			'date_start' => 'required',
			'time_start' => 'required',
			'date_end' => 'required',
			'time_end' => 'required',
			'inp_lab' => 'required',
			'bukti_pembayaran' => 'max:500',
		];
	}
	public function messages()
	{
		return [
			'inp_nama.required' => 'Silakan silahkan isikan nama anda.',
			'inp_id.required' => 'Silakan silahkan isikan nomor id anda.',
			'inp_nomor_kontak.required' => 'Silakan silahkan isikan nomor kontak anda.',
			'inp_institusi.required' => 'Silakan inputkan institusi anda.',
			'inp_kegiatan.required' => 'Silakan pilih jenis kegiatan terlebih dahulu.',
			'date_start.required' => 'Masukkan tanggal mulai kegiatan terlebih dahulu.',
			'time_start.required' => 'Masukkan jam terlebih dahulu.',
			'date_end.required' => 'Masukkan tanggal selesai kegiatan terlebih dahulu.',
			'time_end.required' => 'Masukkan jam terlebih dahulu.',
			'inp_lab.required' => 'Silakan pilih laboratorium terlebih dahulu.',
			'bukti_pembayaran.max' => 'Harap ukuran file tidak lebih dari 500 kb.',
		];
	}
}
