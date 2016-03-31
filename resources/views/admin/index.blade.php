@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Product</div>

                    <div class="panel-body">
                        @foreach($products as $product)
                            <li>{{$product->name}} --- {{$product->type}}</li>
                        @endforeach
                    </div>
                        <form class="form-horizontal" method="POST" action="/admin">
                            {!! csrf_field() !!}
                            <label for="product-name" class="col-sm-4 control-label">Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="product-name" class="form-control">
                            </div>

                            <label for="product-type" class="col-sm-4 control-label">Type</label>
                            <div class="col-sm-6">
                                <input type="text" name="type" id="product-type" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-6">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>

                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection
