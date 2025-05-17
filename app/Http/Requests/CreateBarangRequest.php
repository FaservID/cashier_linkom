<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBarangRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_barang' => 'required',
            'tipe'  => 'required',
            'harga'  => 'required',
            'in_stock'  => 'required',
            'keterangan'  => 'required',
            'kategori_id'  => 'required',
            'foto'  => 'required|mimes:jpg,png',
        ];
    }
}
