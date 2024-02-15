@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Add Item</h1>
            <ul class="breadcrumb">
                <li><a href="/inventory">Inventory</a> / </li>
                <li>Create Item</li>
                
            </ul>
            <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" required>
                </div>
                <div class="form-group">
                    <label for="price">Price (₱)</label>
                    <input type="text" name="price" class="form-control" id="price" placeholder="Enter price" required>
                </div>
                <!-- <div class="form-group">
                    <label for="import_file">Import from Excel</label>
                    <input type="file" name="import_file" id="import_file" accept=".xlsx, .xls, .csv">
                    <p class="text-muted"><small>Supported file types: xlsx, xls, csv</small></p>
                </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
