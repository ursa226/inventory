<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Imports\InventoryImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{
    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        session()->flash('success', 'Item added successfully!');

        $inventory = Inventory::create($data);

        return redirect()->route('inventory.index')->with('success', 'Item added successfully!');
    }

    public function index()
{
    $inventoryItems = Inventory::where('status', 'active')->get();
    return view('inventory.index', compact('inventoryItems'));
}


    public function edit($id)
    {
        $item = Inventory::findOrFail($id);
        return view('inventory.edit', compact('item'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $inventory->update($data);

        return redirect()->route('inventory.index')->with('success', 'Item updated successfully!');
    }

    public function import(Request $request)
{
    try {
        $file = $request->file('import_file');
        Log::info('File uploaded:', ['file' => $file]);

        Excel::import(new InventoryImport, $file);
        Log::info('Import started.');
        echo('Import started.');

        return redirect()->route('inventory.index')->with('success', 'Inventory imported successfully.');
    } catch (\Exception $e) {
        Log::error('Error importing inventory: ' . $e->getMessage());
        echo('Error importing inventory: ' . $e->getMessage());
        return redirect()->route('inventory.index')->with('error', 'Error importing inventory.');
    }
}
public function destroy($id)
{
    // $inventory = Inventory::findOrFail($id);
    // $inventory->delete();
    // return redirect()->route('inventory.index')->with('success', 'Item deleted successfully!');
    $item = Inventory::findOrFail($id);
    $item->status = 'inactive';
    $item->save();
    return redirect()->route('inventory.index')->with('success', 'Item marked as inactive successfully!');
}

public function inactive()
{
    $inactive_items = Inventory::where('status', 'inactive')->get();
    return view('inventory.inactive', compact('inactive_items'));
}

public function activate($id)
{
    $item = Inventory::findOrFail($id);
    $item->status = 'active';
    $item->save();
    return redirect()->route('inventory.index')->with('success', 'Item marked as active successfully!');
}

public function search(Request $request)
{
    $search = $request->input('search');

    $inventoryItems = Inventory::where('status', 'active')
        ->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })
        ->orderBy('created_at', 'desc')
        ->get();
    return view('inventory.index', ['inventoryItems' => $inventoryItems]);
}
// public function search(Request $request)
// {
//     $search = $request->input('search');

//     $inventoryItems = Inventory::where('name', 'LIKE', '%' . $search . '%')
//                                ->where('status', '=', 'active')
//                                ->paginate(10);

//     return view('inventory.index', compact('inventoryItems'));
// }




}
