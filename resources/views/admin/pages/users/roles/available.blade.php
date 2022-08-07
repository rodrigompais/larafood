@extends('adminlte::page')

@section('title', "Cargos do usuário {$user->name}")

@section('content_header')
    <h1>Cargos do usuário <strong>{{ $user->name }}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.roles.available', $user->id) }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control"
                    value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Filtro </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed table-sm">
                <thead>
                    <tr>
                        <th width="125px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('users.roles.attach', $user->id )}}" method="post">
                        @csrf    
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                </td>
                                <td>{{ $role->name }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-outline-success btn-sm">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>
@stop
