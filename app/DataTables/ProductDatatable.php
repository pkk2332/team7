<?php

namespace App\DataTables;

use App\Product;
use App\Admin;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class ProductDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
         
            ->addColumn("Edit",function($query){
            return '<a class="btn btn-success btn-sm" href="' . route("admin.edit", $query->id) .'"><i class="fa fa-edit"></i>Edit</a>';
        })
           ->addColumn("Delete",function($query){
             $response = '<form action="' . route("admin.destroy", $query->id) .'"
             method="post">' . 
             csrf_field() . 
             '<input type="hidden" name="_method" value="delete">
             <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i>Delete</button>';
             return $response;
         })
           ->rawColumns(['Edit','Delete']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        $id=\Auth::user()->admin_id;
        if(Admin::find($id)->role=="superadmin"){
            return $model->newQuery()->select('id', 'name','description', 'price','quantity', 'created_at');
        }
        else{
            $products=DB::table('products')->where('admin_id',\Auth::user()->admin_id);
            return $products->select('id', 'name','description', 'price','quantity','created_at');

        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                     ->parameters([
                        'dom' => 'lfBtip',
                         'responsive' => true,
                         "scrollX"=> true,
                       'buttons' => [
                                'create',
                                'reload',
                                [
                                    'extend' => 'colvis',
                                    'text' => 'Hide/Show',
                                ],
                                [
                                    'extend' => 'collection',
                                    'text' => '<i class="fa fa-download"></i> Export',
                                    'buttons' => [
                                        'csv',
                                        'excel',
                                        'pdf',
                                    ],
                                ],
                                [
                                    'extend' => 'print',
                                    'title' => "Title",
                                    'exportOptions' => ['columns' => ':visible']
                                ]
                            ]
                    ]);
                     }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
    return [
        [
            "className"      => 'details-control',
            "orderable"      => false,
            "searchable"     => false,
            "data"           => null,
            "defaultContent" => '<i class="icon-plus font-blue" style="cursor: pointer; font-size: 16px;"></i>',
            "title"          => '',
            "width"          => '20px',
             'exportable' => false,
             'exclude'=>true

        ],
        'id',
        'name',
        'description',
        'price',
        'quantity',
        'created_at',
        'Edit'=>[ 'exportable' => false,
        'printable'      => false,],
        'Delete'=>[ 'exportable' => false,
         'printable'      => false,]
    ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
}
