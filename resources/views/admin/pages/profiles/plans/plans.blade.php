@extends('adminlte::page')

@section('title', "Planos da perfil {$profile->name}")

@section('content_header')
    <h1>Planos da perfil <strong>{{ $profile->name }}</strong>        
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @include('admin.includes.alerts')
            </table>                        
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop
