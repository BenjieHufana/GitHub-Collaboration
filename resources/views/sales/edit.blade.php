@extends('layouts.app')

@section('content')
<h2>Edit Sale</h2>
<form method="POST" action="{{ route('sales.update', $sale->id) }}" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Product</label>
        <select name="product_id" class="form-select">
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }} (${{ $product->price }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" value="{{ $sale->quantity }}" required>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
