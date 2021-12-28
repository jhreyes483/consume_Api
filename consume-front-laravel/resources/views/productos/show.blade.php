@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Detalle de producto</h3>
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-striped" >
                                        <tbody class="table-light">
                                        <tr>
                                            <th class="bg-primary text-white">Categoria</th>
                                            <td>{{ $producto['nom'] }}</td>
                                        </tr>

                                        <tr>
                                            <th class="bg-primary text-white">Descripción</th>
                                            <td>{{ $producto['descript'] }}</td>
                                        </tr>

                                        <tr>
                                            <th class="bg-primary text-white">Fecha de Creacion</th>
                                            <td>{{ $producto['created_at'] }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-primary text-white">Fecha de Actualizacion</th>
                                            <td>{{ $producto['updated_at'] }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

