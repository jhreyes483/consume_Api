@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Producto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="card">
                        <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            @elseif(session('msg'))
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                     {{session('msg')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                    <form action="{{ route('productos.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-group">
                                   <label >Producto</label>
                                   <input type="text" name="nom" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Valor</label>
                                            <input type="number" name="val" class="form-control">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Stok</label>
                                            <input type="number" name="stok" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Categoria</label>
                                            <select name="categoria" class="form-control">
                                                @foreach($categorias as $i => $d )
                                                    <option value="{{$i}}">{{$d}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Estado</label>
                                            <select name="estado" class="form-control">
                                                @foreach(['disponible'=>'Disponible', 'agotado'=>'Agotado'] as $i => $d )
                                                    <option value="{{$i}}">{{$d}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-floating">
                                    <label for="contenido">Descripción</label>
                                    <textarea class="form-control" name="descript" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">



                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
