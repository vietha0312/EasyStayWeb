<?php

namespace App\DataTables;

use App\Models\DichVu;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DichVuDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'dichvu.action')

            ->addColumn('trang_thai', function ($query) {
                if ($query->trang_thai == 1) {
                    return "Hoạt động";
                } else {
                    return "Ngừng hoạt động";
                }
            })

            ->addColumn('gia', function($query){
                return "" . number_format($query->gia) . " VNĐ";
            })

            ->addColumn('action', function ($query) {

                $editBtn = "<a href='" . route('admin.dich_vu.edit', $query->id) . "' class='btn btn-primary'>
                <i class='bi bi-pen'></i>
                </a>";

                $deleteBtn = "<a href='" . route('admin.dich_vu.destroy', $query->id) . "' class='btn btn-danger delete-item ms-2'>
                <i class='bi bi-archive'></i>
                </a>";
                return $editBtn . $deleteBtn;
            })

            ->rawColumns(['anh','gia','action'])

            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DichVu $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('dichvu-table')
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
            Column::make('ten_dich_vu'),
            Column::make('gia'),
            Column::make('so_luong'),
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
        return 'DichVu_' . date('YmdHis');
    }
}
