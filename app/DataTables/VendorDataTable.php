<?php

namespace App\DataTables;

use App\Models\Vendor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($data){
                return '<a href="'.route('admin.vendor.edit', $data->id).'" class="btn btn-success btn-xs" title="Edit vendor"><i class="fa fa-edit"></i></a>
                <a href="'.route('admin.vendor.show', $data->id).'" class="btn btn-primary btn-xs" title="View vendor Detail"><i class="fa fa-eye"></i></a>
                <button id="vendor_delete" type="button" class="btn btn-xs btn-danger round" vendor-id="'.$data->id.'" title="delete vendor"><i class="fa fa-trash"></i></button> ';
            })
            ->editColumn('vendor_avatar',function($data) {
                if($data->vendor_avatar) {
                    return '<img height="60" width="60" src="'.$data->vendor_avatar.'">';
                } else {
                    return '<img height="60" width="60" src="'.asset("admin/images/no-image.png").'">';
                }
            })
            ->editColumn('is_active',function($data) {
                if($data->is_active == 1) {          
                    return '<span onclick="changeStatus('.$data->id.',0)" class="badge badge-success">Active</span>';
                } else {                    
                    return '<span onclick="changeStatus('.$data->id.',1)" class="badge badge-danger">In-Active</span>';
                }
                // if($data->is_active == 1) {          
                //     return '<label class="switch">
                //                 <input onclick="changeStatus('.$data->id.',0)" type="checkbox" checked>
                //                 <span class="slider round"></span>
                //             </label>';
                // } else {                    
                //     return '<label class="switch">
                //                 <input onclick="changeStatus('.$data->id.',1)" type="checkbox">
                //                 <span class="slider round"></span>
                //             </label>';
                // }
            })
            ->rawColumns(['action', 'vendor_avatar','is_active']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Vendor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vendor $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('vendor-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy( 0,'desc')// here is the column number
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('vendor_avatar')->orderable(false),
            Column::make('business_name'),
            Column::make('business_email'),
            Column::make('phone_number'),
            Column::make('is_active'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Vendor_' . date('YmdHis');
    }
}
