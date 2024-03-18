<?php

namespace App\DataTables;

use App\Models\Bai_viet;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BaiVietDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'baiviet.action')

            ->addColumn('anh', function($query){
                return  "<img src='" . Storage::url($query->anh) . "' width='100px' alt='ảnh bài viết'>";
                
            })

            
            ->addColumn('trang_thai', function ($query) {
                $active = "<span class='badge text-bg-success'>Xuất bản</span>";
                $inActive = "<span class='badge text-bg-danger'>Nháp</span>";
                if ($query->trang_thai == 1) {
                    return $active;
                } else {
                    return $inActive;
                }
            })

            ->addColumn('action', function ($query) {

                $editBtn = "<a href='" . route('admin.bai_viet.edit', $query->id) . "' class='btn btn-primary'>
                <i class='bi bi-pen'></i>
                </a>";

                $deleteBtn = "<a href='" . route('admin.bai_viet.destroy', $query->id) . "' class='btn btn-danger delete-item ms-2'>
                <i class='bi bi-archive'></i>
                </a>";
                return $editBtn . $deleteBtn;
            })

            ->rawColumns(['anh', 'trang_thai', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Bai_viet $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('baiviet-table')
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
            Column::make('tieu_de'),
            Column::make('anh'),
            Column::make('noi_dung'),
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
        return 'BaiViet_' . date('YmdHis');
    }
}
