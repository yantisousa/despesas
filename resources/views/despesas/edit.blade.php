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
        <form action="{{ route('despesas.update', $despesa->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-3 mx-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nome:</span>
                        <input value="{{ $despesa->nome }}" type="text" class="form-control" name="nome"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-3 mx-auto">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Valor:</span>
                        <input value="{{ $despesa->valor }}" type="number" class="form-control" name="valor"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-3 mx-auto">
                    <div class="input-group mb-3">
                        <select name="categoria_id" id="" class="form-control">
                            @foreach ($categorias as $categoria)
                                @if ($categoria->id == $despesa->categoria_id)
                                    <option selected value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                @endif
                                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mx-auto">
                    <div class="input-group mb-3">
                        <div class="form-check form-switch">
                            @if ($despesa->pago == 0)
                                <input name="pago" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            @else
                                <input name="pago" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                    checked>
                            @endif
                            <label class="form-check-label" for="flexSwitchCheckChecked">Pagar</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3 ">
                    <div class="input-group mb-3">
                        <input type="submit" class="form-control btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
