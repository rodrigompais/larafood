@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
    <h1>Empresa <a href="{{ route('tenants.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i>
            ADD</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" method="post" class="form form-inline">
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
                        <th width="100">Logo</th>
                        <th>Nome</th>
                        <th>Plano</th>
                        <th class="text-center" width="100">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width: 85px;">
                            </td>
                            <td>{{ $tenant->name }}</td>
                            <td>{{ $tenant->plan->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('tenants.edit', $tenant->id) }}"
                                    class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('tenants.show', $tenant->id) }}"
                                    class="btn btn-outline-warning btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $tenants->appends($filters)->links() !!}
            @else
                {!! $tenants->links() !!}
            @endif
        </div>
    </div>
    {{-- <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script> --}}
@stop
