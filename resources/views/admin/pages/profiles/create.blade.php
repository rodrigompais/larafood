@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1> Cadastrar Novos Perfis </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="POST">
                
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@stop
