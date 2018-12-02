 <?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;
use App\Checkout;

class CheckoutDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query);
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Checkout $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Checkout $model)
    {
        return $model->newQuery()->select('user_id','name','tax','subtotal','amount');
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
        'user_id',
        'name',
        'tax',
        'subtotal',
        'amount',
    ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Checkout_' . date('YmdHis');
    }
}
