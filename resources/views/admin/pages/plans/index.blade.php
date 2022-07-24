@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Filtro</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th class="text-center" width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>R$ {{ number_format($plan->price,2,',','.') }}</td>
                            <td style="width=10px">
                                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-folder"></i></a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-outline-success btn-sm"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
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
