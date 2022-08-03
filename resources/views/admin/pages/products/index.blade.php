@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos <a href="{{ route('products.create') }}" class="btn btn-dark"><i class="fa fa-plus" aria-hidden="true"></i>
            ADD</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" method="post" class="form form-inline">
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
                        <th>Imagem</th>
                        <th>Titulo</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th class="text-center" width="150">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 85px;">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td>{{ $product->description }}</td>
                            <td style="width=10px">
                                <a href="{{ route('products.categories', $product->id) }}"
                                    class="btn btn-outline-success btn-sm"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="btn btn-outline-warning btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif
        </div>
    </div>
    {{-- <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script> --}}
@stop
