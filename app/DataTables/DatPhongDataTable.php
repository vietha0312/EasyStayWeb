<?php

namespace App\DataTables;

use App\Models\DatPhong;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DatPhongDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'datphong.action')

            ->addColumn('ten_khach_hang', function($query){
                return $query->user->ten_nguoi_dung;
            })
            ->addColumn('loai_phong_id', function($query){
                return $query->loai_phong->ten;
            })
            ->addColumn('email', function($query){
                return $query->user->email;
            })
            ->addColumn('so_dien_thoai', function($query){
                return $query->user->so_dien_thoai;
            })
            ->addColumn('dich_vu_id', function($query){
                return $query->dich_vu->ten_dich_vu;
            })
            ->addColumn('action', function ($query) {

                $editBtn = "<a href='" . route('admin.dat_phong.edit', $query->id) . "' class='btn btn-primary'>
                <i class='bi bi-pen'></i>
                </a>";

                $deleteBtn = "<a href='" . route('admin.dat_phong.destroy', $query->id) . "' class='btn btn-danger delete-item ms-2'>
                <i class='bi bi-archive'></i>
                </a>";
                return $editBtn . $deleteBtn;
            })

            ->rawColumns(['ten_khach_hang','loai_phong_id','email','so_dien_thoai','dich_vu_id','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DatPhong $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('datphong-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        // Button::make('excel'),
                        // Button::make('csv'),
                        // Button::make('pdf'),
                        // Button::make('print'),
                        // Button::make('reset'),
                        // Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            // Column::make('user_id'),
            Column::make('loai_phong_id'),
            Column::make('ten_khach_hang'),
            Column::make('email'),
            Column::make('so_dien_thoai'),
            Column::make('thoi_gian_den'),
            Column::make('thoi_gian_di'),
            Column::make('so_dien_thoai'),
            Column::make('so_luong_nguoi'),
            Column::make('so_luong_phong'),
            Column::make('dich_vu_id'),
            Column::make('tong_tien'),
            Column::make('payment'),
            Column::make('ghi_chu'),
            Column::make('trang_thai'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(128)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DatPhong_' . date('YmdHis');
    }
}
