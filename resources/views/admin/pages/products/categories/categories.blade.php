@extends('adminlte::page')

@section('title', "Categoria do Produto {$product->title}")

@section('content_header')
    <h1>Categoria do Produto <strong>{{ $product->title }}</strong>
        <a href="{{ route('products.categories.available', $product->id) }}" class="btn btn-dark">
            <i class="fa fa-plus" aria-hidden="true"></i> ADD NOVA CATEGORIA</a>
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td style="width=10px">
                                <a href="{{ route('products.categories.detach', [$product->id, $category->id]) }}"
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
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@stop
