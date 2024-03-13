<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'anh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			'mo_ta' => 'max:255|nullable|min:3',
			'trang_thai' => 'required'
		];
	}

	public function messages()
		{
			return [
				'anh.required' => 'Ảnh không được để trống',
				'anh.image' => 'Ảnh không đúng định dạng',
				'anh.mimes' => 'Ảnh không đúng định dạng',
				'anh.max' => 'Ảnh quá kích thước 2048kb',
				'mo_ta.max' => 'Mô tả không được vượt quá 255 kí tự',
				'mo_ta.min' => 'Mô tả không được nhỏ hơn 3 kí tự',
			];
		}
}
