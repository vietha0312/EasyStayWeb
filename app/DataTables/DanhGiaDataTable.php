<?php

namespace App\DataTables;

use App\Models\DanhGia;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DanhGiaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'danhgia.action')

            ->addColumn('user_id', function($query){
                return $query->user->ten_nguoi_dung;
            })

            ->addColumn('action', function ($query) {
                $deleteBtn = "<a href='" . route('admin.danh_gia.destroy', $query->id) . "' class='btn btn-danger delete-item'>
                <i class='bi bi-archive'></i>
                </a>";
                return $deleteBtn;
            })

            // ->rawColumns(['noi_dung', 'anh','user_id','loai_phong_id', 'action'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DanhGia $model): QueryBuilder
    {
        return $model->where('loai_phong_id', request()->loai_phong)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('danhgia-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('noi_dung'),
            Column::make('anh'),
            Column::make('user_id'),
            // Column::make('loai_phong_id'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DanhGia_' . date('YmdHis');
    }
}
