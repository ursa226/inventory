<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InventoryImport;


use Maatwebsite\Excel\Concerns\ToModel;

class InventoryImport implements ToModel
{
    public function model(array $row)
    {
        return new Inventory([
            'name' => $row[0],
            'description' => $row[1],
            'quantity' => $row[2],
            'price' => $row[3],
        ]);
    }
}
