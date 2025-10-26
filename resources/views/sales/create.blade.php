@extends('layouts.app')

@section('content')
<h2>Add Sale</h2>
<form method="POST" action="{{ route('sales.store') }}" class="card p-4 shadow-sm">
    @csrf
    <div class="mb-3">
        <label class="form-label">Product</label>
        <select name="product_id" class="form-select">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} (${{ $product->price }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
