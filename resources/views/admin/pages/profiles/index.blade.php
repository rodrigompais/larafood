@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Perfil <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> ADD </a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td style="width=10px">                                
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-lock"></i></a>
                                <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-list-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif           
        </div>
    </div>
@stop
