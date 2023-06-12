<!-- product-selection.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Product Selection</h1>
<a href="{{ route('cart') }}" class="btn btn-primary">Check Shopping Cart</a>
    <div class="products">
        @foreach($products as $product)
            <div class="product">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: ${{ $product->price }}</p>
                <form action="{{ route('cart.add', ['productId' => $product->id]) }}" method="POST">
                    @csrf
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
