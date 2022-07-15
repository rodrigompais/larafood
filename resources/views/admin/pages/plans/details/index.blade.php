@extends('adminlte::page')

@section('title', "Detalhes do {$plan->name}")

@section('content_header')
    <h1>Detalhes do {{$plan->name}} <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-info">EDITAR</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif           
        </div>
    </div>
@stop
