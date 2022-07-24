@extends('adminlte::page')

@section('title', "Perfis do plano {$plan->name}")

@section('content_header')
    <h1>Perfis do plano <strong>{{ $plan->name }}</strong>
        <a href="{{ route('plans.permissions.available', $plan->id) }}" class="btn btn-dark">
            <i class="fa fa-plus" aria-hidden="true"></i> ADD NOVA PERFIL</a>
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('plans.profiles.detach', [$profile->id, $profile->id]) }}"
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
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
