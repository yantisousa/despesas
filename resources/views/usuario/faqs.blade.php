@extends('default.layout')
@section('content')
    <div class="container">
        <h4 class="text-center mt-5">Seja bem-vindo, {{$usuario->name}}!</h4>
        <form action="{{route('usuario.faqs.response', $usuario->id)}}" method="POST">
            @method('put')
            @csrf
            <div class="row mt-5">
                <div class="col-md-4 mx-auto">
                    <label for="exampleInputEmail1" class="form-label">Qual sua renda mensal?</label>
                    <input name="renda_mensal" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 mx-auto">
                    <input type="submit" class="btn btn-primary" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="Entrar">
                </div>
            </div>
        </form>

    </div>
@endsection
