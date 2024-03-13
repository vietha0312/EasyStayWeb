<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class UsersExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();

    }
    /**
     * Returns headers for report
     * @return array
     */
    public function headings(): array {
        return [
            'ID',
            'Họ tên',
            'Email',
            'Số điện thoại',
            'Địa chỉ',
            "Created",
            "Updated",
            "Deleted",

        ];
    }

    public function map($user): array {
        return [
            $user->id,
            $user->ten_nguoi_dung,
            $user->email,
            $user->so_dien_thoai,
            $user->dia_chi,
            $user->created_at,
            $user->updated_at,
            $user->deleted_at,
        ];
    }
}
