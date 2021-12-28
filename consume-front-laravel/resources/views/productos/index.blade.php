@extends('layouts.app')

@section('content')
    <script src="https://portafoliojav.herokuapp.com/public/js/jquery-3.5.1.min.js"></script>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('msg'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                             {{session('msg')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                        <div class="card col-md-10 mx-auto card-body" id="divb" style="display: none" >
                            <div class="card-title">Busqueda</div>
                            <form  class="row" method="get">
                                <div class="col-md-6">
                                    <label>Categoria</label>
                                    <select class="form-control" name="c" onchange="submit(this)">
                                        <option value="">Seleccione</option>
                                        @foreach($categorias as $i => $d )
                                            <option {{(isset($_POST['c']) && $_POST['c'] == $i ? ' selected ':'' )}} value="{{$i}}">{{$d}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Estado</label>
                                    <select class="form-control" name="e" onchange="submit(this)">
                                        <option value="">Seleccione</option>
                                        @foreach(['disponible'=>'Disponible', 'agotado'=>'Agotado'] as $i => $d )
                                            <option {{(isset($_POST['e']) && $_POST['e'] == $i ? ' selected ':'' )}} value="{{$i}}">{{$d}}</option>
                                        @endforeach

                                    </select>

                                </div>

                            </form>
                        </div>

                        <a class="btn my-2 btn-warning" href="{{ route('productos.create') }}">Nuevo</a>
                        <a class="btn my-2 btn-info" href="javascript:;" id="btnb">Buscar</a>
                    <div class="card">
                        <div class="card-body">
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef" class="text-white-all">
                                <th style="display: none;">ID</th>
                                <th >Producto</th>
                                <th>Valor</th>
                                <th>stok</th>
                                <th >Estado</th>
                                <th>Categoria</th>
                                <th >Creado en:</th>
                                <th >Actualizado en:</th>
                                <th  >Acciones</th>



                              </thead>
                              <tbody>
                            @foreach ($productos as $p)
                            <tr>
                                <td style="display: none;">{{ $p['id_prod'] }}</td>
                                <td>{{ $p['nom'] }}</td>
                                <td>{{ $p['val'] }}</td>
                                <td>{{ $p['stok'] }}</td>
                                <td>{{ $p['estado'] }}</td>
                                <td>{{ $p['nom_categoria'] }}</td>
                                <td>{{ $p['created_at'] }}</td>
                                <td>{{ $p['updated_at'] }}</td>

                                <td  >
                                    <form action="{{ route('productos.destroy',$p['id_prod']) }}" method="POST">
                                        <a class="btn btn-success" href="{{ route('productos.edit',$p['id_prod'] ) }}">Editar</a>
                                        <a class="btn btn-info" href="{{ route('productos.show',$p['id_prod']) }}">Detalle</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        $(document).ready(function(){
        $("#btnb").click(function (){
            $("#divb").toggle(1000);
        })
        });

    </script>
@endsection
