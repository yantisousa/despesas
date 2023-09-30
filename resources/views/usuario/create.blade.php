@extends('default.layout')
@section('content')
    <div class="container">
        <form action="{{route('usuario.store')}}" method="POST">
            @csrf
            <div class="row mt-5">
                <div class="col-4 text-center mx-auto">
                    <h3>Cadastro</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 mx-auto">
                    @if (session()->has('msg'))
                        <div class="alert alert-info" role="alert">
                            {{session('msg')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 mx-auto">
                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 mx-auto">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 mx-auto">
                    <label for="exampleInputEmail1" class="form-label">Senha</label>
                    <input name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
