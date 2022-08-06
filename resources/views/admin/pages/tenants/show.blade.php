@extends('adminlte::page')

@section('title', "Detalhes da Empresa {$tenant->name}")

@section('content_header')
    <h1> Detalhes da Empresa <b>{{$tenant->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->title }}" style="max-width: 85px;">
            <ul>
                <li>
                    <strong>Plano:</strong> {{$tenant->plan->name}}
                </li>
                <li>
                    <strong>Nome:</strong> {{$tenant->name}}
                </li>
                <li>
                    <strong>URL:</strong> {{$tenant->url}}
                </li>                
                <li>
                    <strong>E-mail:</strong> {{$tenant->email}}
                </li>                
                <li>
                    <strong>CNPJ:</strong> {{$tenant->cnpj}}
                </li>                
                <li>
                    <strong>Situação:</strong> {{$tenant->active == 'Y' ? 'Ativa' : 'Inativa' }}
                </li>
            </ul>
            <hr>
            <h3>Detalhes da Assinatura</h3>
            <ul>
                <li>
                    <strong>Data Assinatura:</strong> {{$tenant->subscription}}
                </li>
                <li>
                    <strong>Data Expiração:</strong> {{$tenant->expires_at}}
                </li>
                <li>
                    <strong>Identificador:</strong> {{$tenant->subscription_id}}
                </li>
                <li>
                    <strong>Ativo?:</strong> {{$tenant->subscription_active == 'Y' ? 'Sim' : 'Não' }}
                </li>
                <li>
                    <strong>Cancelou?:</strong> {{$tenant->subscription_suspended == 'Y' ? 'Sim' : 'Não' }}
                </li>
            </ul>
            {{-- @include('admin.includes.alerts')
            <form action="{{ route('tenants.destroy',$tenant->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">EXCLUIR EMPRESA {{strtoupper($tenant->name)}}</button>
            </form> --}}
        </div>
    </div>
@stop
