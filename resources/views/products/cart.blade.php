@extends('layouts.app')

@section('content')
    <h1>Shopping Cart</h1>

    @if($cartItems->isEmpty())
        <p>Your shopping cart is empty. Please go to the shop to add products.</p>
        <a href="{{ route('product.selection') }}" class="btn btn-primary">Go to Shop</a>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->product->name }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>{{ $cartItem->product->price }}</td>
                        <td>{{ $cartItem->quantity * $cartItem->product->price }}</td>
                        <td>
                            <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            <form action="{{ route('cart.delete', $cartItem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <h3>Total: ${{ $total }}</h3>
        </div>

        <a href="{{ route('payment') }}" class="btn btn-primary">Proceed to Payment</a>
    @endif
@endsection
