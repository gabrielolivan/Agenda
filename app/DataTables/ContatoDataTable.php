<?php

namespace App\DataTables;

use App\Models\Contato;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContatoDataTable extends Datatable
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
            ->addColumn('acoes', 'contato.datatables.acoes')
            ->rawColumns(['acoes']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Contato $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contato $model)
    {
        return $model->newQuery()->withCount('enderecos', 'telefones');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('contato-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->setTableAttributes([
                        'class' => 'table table-striped table-hover w-100',
                    ])
                    ->parameters([
                        'lengthMenu' => [[10, 50, -1], [10, 50, "Todos"]],
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
            // Método 1
            // Column::make('nome')
            //     ->exportable(false)
            //     ->printable(false),
            // Column::make('email'),
            // Column::make('enderecos_count')
            //     ->searchable(false)
            //     ->title('Qtd Endereços')
            //     ->addClass('text-center'),
            // Column::make('telefones_count')
            //     ->searchable(false)
            //     ->title('Qtd telefones')
            //     ->addClass('text-center'),
            // Column::make('acoes')
            //     ->searchable(false)
            //     ->orderable(false)
            //     ->title('Ações')
            //     ->addClass('text-end'),

            // Método 2
            // 'id',
            // 'nome',
            // 'email',
            // 'enderecos_count',
            // 'telefones_count',
            // 'acoes',

            
            // Método 3
            ['data' => 'nome', 'title' => 'Nome'],
            ['data' => 'email', 'title' => 'Email'],
            ['data' => 'enderecos_count', 'title' => 'Qtd endereços', 'searchable' => false, 'class' => 'text-center'],
            ['data' => 'telefones_count', 'title' => 'Qtd telefones', 'searchable' => false, 'class' => 'text-center'],
            ['data' => 'acoes', 'title' => 'Ações', 'searchable' => false, 'addClass' => 'text-center', 'orderable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Contato_' . date('YmdHis');
    }
}
