@extends('adminlte::page')

@section('title', "Permissões do perfil {$role->name}")

@section('content_header')
    <h1>Permissões do Cargo <strong>{{ $role->name }}</strong>
        <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn btn-dark">
            <i class="fa fa-plus" aria-hidden="true"></i> ADD NOVA CARGO</a>
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('roles.permissions.detach', [$role->id, $permission->id]) }}"
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
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
