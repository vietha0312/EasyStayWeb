<?php

namespace App\DataTables;

use App\Models\Phong;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PhongDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'phong.action')   

            // ->addColumn('loai_phong', function($query){
            //     return $query->loai_phong->ten;
            // })
        
            ->addColumn('trang_thai', function ($query) {
                if ($query->trang_thai == 1) {
                    $button = "<div class='form-check form-switch'>
                    <input class='form-check-input change-status' data-id='" . $query->id . "'  type='checkbox' role='switch' id='flexSwitchCheckDefault' name='trang_thai' checked>
                  </div>";
                } else {
                    $button = "<div class='form-check form-switch'>
                    <input class='form-check-input change-status' data-id='" . $query->id . "'  type='checkbox' role='switch' id='flexSwitchCheckDefault' name='trang_thai'>
                  </div>";
                }
                return $button;
            })

            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.phong.edit', $query->id) . "' class='btn btn-primary'>
                <i class='bi bi-pen'></i>
                </a>";
                $deleteBtn = "<a href='" . route('admin.phong.destroy', $query->id) . "' class='btn btn-danger ms-2 delete-item '>
                <i class='bi bi-archive'></i>
                </a>";
                return $editBtn . $deleteBtn ;
            })

            ->rawColumns(['ten_phong','loai_phong_id','mo_ta','trang_thai', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Phong $model): QueryBuilder
    {
        return $model->where('loai_phong_id', request()->loai_phong)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('phong-table')
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
            Column::make('ten_phong'),
            // Column::make('loai_phong_id'),
            Column::make('mo_ta'),
            Column::make('trang_thai'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Phong_' . date('YmdHis');
    }
}
