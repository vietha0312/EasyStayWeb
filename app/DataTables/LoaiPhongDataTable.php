<?php

namespace App\DataTables;

use App\Models\Loai_phong;
use App\Models\Phong;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LoaiPhongDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'loai_phong.action')

            
            ->addColumn('so_luong', function($query){
                $so_luong = $this->so_luong->where('ten',$query->ten)->first();
                return $so_luong ? $so_luong->so_luong : 0;
            })
            
            ->addColumn('anh', function($query){
                // $image =  "<img src='" . asset($query->anh) . "' width='100px' alt='...'>";
                // return $image;
                
            })
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
                $editBtn = "<a href='" . route('admin.loai_phong.edit', $query->id) . "' class='btn btn-primary'>
                <i class='bi bi-pen'></i>
                </a>";
                $anhBtn = "<a href='" . route('admin.anh_phong.index',['loai_phong' =>  $query->id]) . "' class='btn btn-info ms-2'>
                <i class='bi bi-image'></i>
                </a>";

                $detailBtn = "<a href='" . route('admin.loai_phong.show', $query->id) . "' class='btn btn-secondary ms-2'>
                <i class='bi bi-card-list'></i>
                </a>";
                $deleteBtn = "<a href='" . route('admin.loai_phong.destroy', $query->id) . "' class='btn btn-danger delete-item ms-2'>
                <i class='bi bi-archive'></i>
                </a>";
                $phongBtn = "<a href='" . route('admin.phong.index',['loai_phong' =>  $query->id]) . "' class='btn btn-warning ms-2'>
                <i class='bi bi-houses-fill'></i>
                </a>";
                $cmBtn =  "<a href='" . route('admin.danh_gia.index',['loai_phong' => $query->id]) . "' class='btn btn-dark ms-2'>
                <i class='bi bi-chat-dots'></i>
                </a>";

                // $moreBtn = "
                // <div class='dropdown d-inline ms-1'>
                //     <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
                //     <i class='bi bi-gear'></i>
                //     </button>
                //     <ul class='dropdown-menu'>
                //         <li><a class='dropdown-item' href='" . route('admin.loai_phong.index', ['loai_phong' => $query->id]) . "'>
                //             <i class='bi bi-image'></i> Image Gallery
                //         </a></li>
                //         <li><a class='dropdown-item' href='" . route('admin.loai_phong.index', ['loai_phong' => $query->id]) . "'>
                //             <i class='bi bi-file'></i> Variants
                //         </a></li>
                //     </ul>
                // </div>  
                // ";

                return $editBtn . $detailBtn . $anhBtn . $phongBtn .$cmBtn. $deleteBtn ;
            })
            
            ->rawColumns(['ten',' anh', 'gia', 'gia_ban_dau','gioi_han_nguoi','so_luong','mo_ta_ngan','mo_ta_dai','trang_thai', 'action'])
            ->setRowId('id');
    }

    public function query1(Phong $model){
        return $model->newQuery();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Loai_phong $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('loaiphong-table')
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
            Column::make('ten'),
            // Column::make('anh'),
            Column::make('gia'),
            Column::make('gia_ban_dau'),
            // Column::make('gioi_han_nguoi'),
            Column::make('so_luong'),
            // Column::make('mo_ta_ngan'),
            // Column::make('mo_ta_dai'),
            Column::make('trang_thai'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(150)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'LoaiPhong_' . date('YmdHis');
    }
}
