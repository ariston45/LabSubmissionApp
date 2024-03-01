<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabSchPostRequest extends FormRequest
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
			'inp_day' => 'required',
			'inp_time_start' => 'required',
			'inp_time_end' => 'required|after:inp_time_start',
			'inp_subject' => 'required',
			'inp_group' => 'required',
			'inp_res_person' => 'required',
		];
	}
	public function messages()
	{
		return [
			'inp_day.required' => 'Silakan masukkan hari terlebih dahulu.',
			'inp_time_start.required' => 'Silakan masukkan jam/waktu mulai terlebih dahulu.',
			'inp_time_start.date_format' => 'Format jam/waktu harus H:mm',
			'inp_time_end.required' => 'Silakan masukkan jam/waktu selesai terlebih dahulu.',
			'inp_time_end.after' => 'Inputan jam/waktu selesai tidak sesuai.',
			'inp_subject.required' => 'Silakan masukkan subjek atau mata kuliah.',
			'inp_group.required' => 'Silakan masukkan kelas atau kelompok belajar',
			'inp_res_person.required' => 'Silakan masukkan dosen atau penanggung jawab.',
		];
	}
}
