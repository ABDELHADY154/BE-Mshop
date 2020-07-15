<?php

namespace App\Http\Livewire;

use App\Inventory;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class InventoryTable extends TableComponent
{
    public $table_class = 'table-hover table-striped';
    public $thead_class = 'thead-dark';
    public $header_view = 'admin.inventory.table-header';
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
        return Inventory::query()->with('product', 'user');
    }

    public function columns()
    {
        return [
            Column::make('#', 'id')->searchable()->sortable(),
            Column::make('Quantity(item)', 'quantity')->searchable(),
            Column::make('Price($)', 'price')->searchable(),
            Column::make('Product Name', 'product.name')->searchable(),
            Column::make('Vendor Name', 'user.name')->searchable(),
            Column::make('Created at', 'created_at')->searchable(),
            Column::make('Actions')->view('admin.inventory.table-actions'),

        ];
    }
}
