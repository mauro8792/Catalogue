@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/madera7.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de productos</h2>
            <a href="{{ url('/admin/products/create') }}" class="btn btn-warning btn-round t-black">Nuevo producto</a>         
            <div class="team">       
                <div class="row">
                   
                    @if(count($products)>0)
                    <table class="table table-striped">
                        <thead>
                            <tr class="b-yellow">
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center" colspan="4">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td class="text-right align-middle" valign="middle">{{ $product->id }}</td>
                                <td class="text-left">{{ $product->name }}</td>
                                <td class="text-left">{{ $product->description }}</td>
                                <td class="text-left">{{ $product->category_name }}</td>
                                <td class="text-right">$ {{ $product->price }}</td>
                                <td class="text-right">                                    
                                    <a href="{{ url('/products/'.$product->id) }}" rel="tooltip" title="Ver producto" target="_blank"><i class="fa fa-info font24 t-blue"></i></a>&nbsp;&nbsp;                                
                                    <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto"><i class="fa fa-edit font24 t-yellow"></i></a>&nbsp;&nbsp;                                                       
                                    <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imágenes del producto"><i class="fa fa-image font24 t-black"></i></a>&nbsp;&nbsp;
                                    <a href="{{ url('/admin/products/'.$product->id.'/del') }}" rel="tooltip" title="Eliminar"><i class="fa fa-times font24 t-red"></i></a>&nbsp;
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $products->links() }}
                    @else
                        <h4>No hay productos cargados</h4>
                    @endif                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
