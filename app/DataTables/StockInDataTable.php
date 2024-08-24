<?php

namespace App\DataTables;

use App\Models\StockIn;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class StockInDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $query->with(['item', 'supplier', 'user']);
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'stock_ins.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StockIn $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StockIn $model)
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
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'excel', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
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
            ['data' => 'item.name', 'name' => 'item.name', 'title' => 'Item'],
            ['data' => 'supplier.name', 'name' => 'supplier.name', 'title' => 'Supplier'],
            ['data' => 'user.name', 'name' => 'user.name', 'title' => 'Created By'],
            'total',
            'date_in'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stock_ins_datatable_' . time();
    }
}
