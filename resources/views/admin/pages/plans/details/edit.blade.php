@extends('adminlte::page')

@section('title', "Editar novo detalhe do {$plan->name}")

@section('content_header')
    <h1>Editar detalhe do {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.update', [$plan->url, $detail->id] ) }}" method="POST">
                @csrf                
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')                
            </form>
        </div>
    </div>
@stop
