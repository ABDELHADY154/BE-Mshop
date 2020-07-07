<?php

namespace App\Http\Livewire;

use App\Client;
use Composer\DependencyResolver\Request;
use Facade\Ignition\QueryRecorder\Query;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;
use Livewire\WithPagination;
use Yajra\DataTables\Html\Columns\Checkbox;

class ClientTable extends TableComponent
{
    use WithPagination;
    public $table_class = 'table-hover table-striped';
    public $thead_class = 'thead-dark';
    public $header_view = 'admin.client.table-header';

    public $checkbox_side = 'left';
    public $checkbox = false;
    // public $checkbox_attribute = 'id';
    public $sort_attribute = 'id';
    public $sort_direction = 'asc';

    public function mount()
    {
        $this->setTableProperties();

        if (isset($_GET['limit'])) {
            if ($_GET['limit'] == 10) {
                $num = 10;
                $this->per_page = $num;
            } elseif ($_GET['limit'] == 25) {
                $num = 25;
                $this->per_page = $num;
            } elseif ($_GET['limit'] == 5) {
                $num = 5;
                $this->per_page = $num;
            }
        } else {
            $num = 5;
            $this->per_page = $num;
        }

        return $this->per_page;
    }

    public $per_page;


    public function query()
    {
        return Client::query();
    }

    public function columns()
    {
        return [
            Column::make('#', 'id')->searchable()->sortable(),
            Column::make('Name')->searchable(),
            Column::make('E-mail', 'email')->searchable(),
            Column::make('Phone number')->searchable(),

            Column::make('Actions')->view('admin.client.table-actions'),

        ];
    }
}
