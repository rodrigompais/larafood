@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias <a href="{{ route('categories.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i>
            ADD</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" method="post" class="form form-inline">
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
                        <th>Descrição</th>
                        <th class="text-center" width="90">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->description }}</td>
                            <td style="width=10px">
                                <a href="{{ route('categories.edit', $user->id) }}"
                                    class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('categories.show', $user->id) }}"
                                    class="btn btn-outline-warning btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
    {{-- <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script> --}}
@stop
