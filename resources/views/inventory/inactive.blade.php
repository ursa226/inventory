@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Inactive Inventory Items</h1>
            <ul class="breadcrumb">
                <li><a href="/inventory">Inventory</a>/</li>
                <li> Inactive Items</li>
            </ul>
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
                    @foreach ($inactive_items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td>
                        <form action="{{ route('inventory.activate', $item->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Activate</button>
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
