@extends('adminlte::page')

@section('title', "Cargos do Usuário {$user->name}")

@section('content_header')
    <h1>Cargos do Usuário <strong>{{ $user->name }}</strong>
        <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-dark">
            <i class="fa fa-plus" aria-hidden="true"></i> ADD NOVO CARGO</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('users.roles.detach', [$user->id, $role->id]) }}"
                                    class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @include('admin.includes.alerts')
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
