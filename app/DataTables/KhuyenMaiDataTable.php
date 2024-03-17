<?php

namespace App\DataTables;

use App\Models\KhuyenMai;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KhuyenMaiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'khuyenmai.action')
            
            ->addColumn('loai_giam_gia', function ($query) {
                return $query->loai_giam_gia == 1 ? "Giảm giá %" : "Giảm giá tiền";
            })
            
            ->addColumn('gia_tri_giam', function ($query) {
                if ($query->loai_giam_gia == 1) {
                    return number_format($query->gia_tri_giam) . " %";
                } else {
                    return number_format($query->gia_tri_giam) . " VNĐ";
                }
            })

            ->addColumn('loai_phong_id', function($query){
                return $query->loai_phong->ten;
            })
            
            ->addColumn('trang_thai', function ($query) {
                $active = "<span class='badge text-bg-success'>Đang áp dụng</span>";
                $inActive = "<span class='badge text-bg-danger'>Kết thúc</span>";
                if ($query->trang_thai == 1) {
                    return $active;
                } else {
                    return $inActive;
                }
            })

            ->addColumn('action', function ($query) {

                $editBtn = "<a href='" . route('admin.khuyen_mai.edit', $query->id) . "' class='btn btn-primary'>
                <i class='bi bi-pen'></i>
                </a>";

                $deleteBtn = "<a href='" . route('admin.khuyen_mai.destroy', $query->id) . "' class='btn btn-danger delete-item ms-2'>
                <i class='bi bi-archive'></i>
                </a>";
                return $editBtn . $deleteBtn;
            })

            ->rawColumns(['loai_giam_gia', 'gia_tri_giam', 'phong_id','trang_thai', 'action'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KhuyenMai $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('khuyenmai-table')
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
            Column::make('ten_khuyen_mai'),
            Column::make('loai_phong_id'),
            Column::make('ma_giam_gia'),
            Column::make('loai_giam_gia'),
            Column::make('gia_tri_giam'),
            // Column::make('mo_ta'),
            Column::make('so_luong'),
            Column::make('ngay_bat_dau'),
            Column::make('ngay_ket_thuc'),
            Column::make('trang_thai'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'KhuyenMai_' . date('YmdHis');
    }
}
