@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários <a href="{{ route('users.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i>
            ADD</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control"
                    value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Filtro</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th class="text-center" width="125">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td style="width=10px">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm"
                                    data-toggle="tooltip" data-placement="top" title="Editar"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-warning btn-sm"
                                    data-toggle="tooltip" data-placement="top" title="Visualizar"><i
                                        class="fas fa-eye"></i></a>
                                <a href="{{ route('users.roles', $user->id) }}" class="btn btn-outline-success btn-sm"
                                    data-toggle="tooltip" data-placement="top" title="Cargos"><i
                                        class="fas fa-address-card"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif
        </div>
    </div>
    {{-- <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script> --}}
@stop
