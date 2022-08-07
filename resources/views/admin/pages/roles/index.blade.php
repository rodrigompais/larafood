@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <h1>Cargos <a href="{{ route('roles.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> ADD </a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('roles.search') }}" method="post" class="form form-inline">
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
                        <th>Nome</th>
                        <th width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-info btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-warning btn-sm"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('roles.permissions', $role->id) }}"
                                    class="btn btn-outline-primary btn-sm"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
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
