
@extends('layouts.apps')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('style.css')}}">
<!-- Include Bootstrap JavaScript from a CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"  crossorigin="anonymous"></script>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Inventory</h1>
            

            <ul class="breadcrumb">
                <li><a href="/inventory">Inventory</a> / </li>
                <li><a href="/inventory/create">Add Item</a> / </li>
                <li><a href="/inventory/inactive">Inactive Items</a> / </li>
            </ul>
            
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <a href="{{ route('inventory.create') }}" class="btn btn-primary">Add Item</a>
            </div>
            <form action="{{ route('inventory.search') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventoryItems as $item)
                    
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y h:i A') }}</td>


                        <td>
                            <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-primary btn-sm ">Edit</a>
                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"  >Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
