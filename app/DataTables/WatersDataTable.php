<?php

namespace App\DataTables;

use App\Water;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WatersDataTable extends DataTable
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
            ->addColumn('action', 'watersdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\WatersDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Water $model)
    {
        return $model->newQuery()->select('id','nama','ph','manfaat');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('waters-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    // ->orderBy(1)
                    // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // )
                    ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            // Column::make('id'),
            // Column::make('nama'),
            // Column::make('ph'),
            // Column::make('manfaat'),
            'id' => ['title' => 'ID'],
            'nama' => ['title' => 'Air'],
            'ph' => ['title' => 'pH'],
            'manfaat' => ['title' => 'Manfaat'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Waters_' . date('YmdHis');
    }
}
