@extends('adminlte::page')

@section('title', "Criar novo detalhe do {$plan->name}")

@section('content_header')
    <h1>Criar novo detalhe do {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.store', $plan->url) }}" method="post">

                @include('admin.pages.plans.details._partials.form')
                
            </form>
        </div>
    </div>
@stop
