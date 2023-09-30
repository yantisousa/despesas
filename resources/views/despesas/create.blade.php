@extends('default.layout')
@section('content')
    <style>
        .container {
            background-color: rgb(247, 247, 247);
        }
    </style>
    <div class="container mt-5">
        <div class="row text-center">
            <h4>Cadastro de Despesas</h4>
        </div>
        <form action="{{route('despesas.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nome:</span>
                        <input type="text" class="form-control" name="nome" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Valor:</span>
                        <input type="number" class="form-control" name="valor" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="input-group mb-3">
                        <select name="categoria_id" id="" class="form-control">
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 ">
                    <div class="input-group mb-3">
                        <input type="submit" class="form-control btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
