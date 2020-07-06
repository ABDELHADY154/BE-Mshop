<?php

namespace App\Http\Livewire;

use App\Client;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;
use Yajra\DataTables\Html\Columns\Checkbox;

class ClientTable extends TableComponent
{
    public $table_class = 'table-hover table-striped';
    public $thead_class = 'thead-dark';
    public $checkbox_side = 'left';
    public $checkbox = false;
    // public $checkbox_attribute = 'id';
    public $sort_attribute = 'id';
    public $sort_direction = 'asc';
    public $per_page = 6;


    public function query()
    {
        return Client::query();
    }

    public function columns()
    {
        return [
            Column::make('#', 'id')->searchable()->sortable(),
            Column::make('Name')->searchable()->sortable(),
            Column::make('E-mail', 'email')->searchable()->sortable(),
            Column::make('Phone number')->searchable()->sortable(),

            Column::make('Created At')->searchable()->sortable(),
            Column::make('Actions')->view('admin.client.table-actions'),

        ];
    }
}
