@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissões <a href="{{ route('permissions.create') }}" class="btn btn-dark"><i class="fa fa-plus"
                aria-hidden="true"></i> ADD </a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="post" class="form form-inline">
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
                        <th  class="text-center" width="125">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('permissions.profiles', $permission->id) }}"
                                    class="btn btn-outline-primary btn-sm"><i class="fas fa-folder"></i></a>
                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                    class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('permissions.show', $permission->id) }}"
                                    class="btn btn-outline-warning btn-sm"><i class="fas fa-eye"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
