@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Cart</div>
                    @if ($cart === null)
                        <a href="{{ URL::previous() }}">Your shopping cart is empty, happy shopping</a>
                    @else
                    <div class="panel-body">
                        {{ $cart->id }}
                        @foreach($cart->products as $product)
                            <li> {{ $product->name }} - {{ $product->type }} - {{ $product->pivot->amount }}</li>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
