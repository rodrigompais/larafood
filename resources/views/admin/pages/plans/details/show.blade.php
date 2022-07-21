@extends('adminlte::page')

@section('title', "Visualizar detalhe do {$plan->name}")

@section('content_header')
    <h1>Visualizar detalhe do {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong>{{ $detail->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url,$detail->id] )}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar o detalhe {{ $detail->name }}, do Plano {{$plan->name}}</button>
            </form>
        </div>
    </div>
@stop
