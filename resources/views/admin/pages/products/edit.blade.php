@extends('adminlte::page')

@section('title', "Editar a {$product->name}")

@section('content_header')
    <h1> Editar a {{$product->name}}  </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@stop
