@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    @foreach($products as $product)
                        <li>{{$product->name}}</li>
                        <form class="form-horizontal" method="POST" action="cart/{{$product->id}}">
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-default">Add to cart</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
