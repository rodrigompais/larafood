@extends('adminlte::page')

@section('title', "Detalhes da Produto {$product->name}")

@section('content_header')
    <h1> Detalhes da Produto <b>{{$product->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 85px;">
                </li>
                <li>
                    <strong>Nome:</strong> {{$product->title}}
                </li>
                <li>
                    <strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{$product->description}}
                </li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">EXCLUIR {{$product->title}}</button>
            </form>
        </div>
    </div>
@stop
