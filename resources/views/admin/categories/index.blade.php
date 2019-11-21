@extends('layouts.app')

@section('title', 'Listado de categorías')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/madera3.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de categorías</h2>
            <a href="{{ url('/admin/categories/create') }}" class="btn btn-warning btn-round t-black">Nueva categoría</a>
            <div class="team">
                <div class="row">

                    @if(count($categories)>0)
                    <table class="table">
                        <thead>
                            <tr class="b-yellow">
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th>Imagen</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <img src="{{ $category->featured_image_url }}" height="50">
                                </td>
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="#" rel="tooltip" title="Ver categoría"><i class="fa fa-info font24 t-blue"></i></a>&nbsp;&nbsp;
                                        <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoría"><i class="fa fa-edit font24 t-yellow"></i></a>&nbsp;&nbsp;
                                        {{-- <a href="{{ url('/admin/categories/'.$category->id.'/del') }}" rel="tooltip" title="Eliminar"><i class="fa fa-times font24 t-red"></i></a>&nbsp;&nbsp; --}}
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                    @else
                        <h4>No hay categorias cargadas</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
