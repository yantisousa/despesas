@extends('default.layout')
@section('content')
    <style>
        .container {}
    </style>
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <div class="col-md-4 mx-auto mt-5">
        <div class="card" style="width: 100%;">

            <div class="card-body">
                <h5 class="card-title">{{ auth()->user()->name }}</h5>
                <p class="card-text">Renda mensal: R$ {{ auth()->user()->renda_mensal }}</p>
                <p class="card-text">
                    <select class="form-control" id="mes">
                        @foreach ($meses as $mes)
                            @if (date('m') == $mes->id)
                                <option selected value="{{$mes->id}}">{{ $mes->mes }}</option>
                            @endif
                                <option value="{{$mes->id}}">{{ $mes->mes }}</option>
                        @endforeach

                    </select>
                </p>
            </div>
        </div>
    </div>
    <div class="container full">
        @foreach ($categorias as $categoria)
            @if (isset($categoria->despesas))
                    <div class="row mt-5">
                        @if (count($categoria->despesas) > 0)
                            <h3 style="color:rgb(0, 0, 0)"><b>{{ $categoria->categoria }}</b></h3>
                        @endif
                        <div>


                            <div class="container mt-5" style="border: 2px solid rgb(212, 209, 209); border-radius: 10px">
                            <div class="row">
                                @foreach ($categoria->despesas as $despesa)

                                    <div class="col-sm-6 mt-5 mb-5 mx-auto">
                                        <div class="card" style="width: 100%;">
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-6">
                                                        <h5 class="card-title">{{ $despesa->nome }}</h5>
                                                    </div>

                                                </div>

                                                <p class="card-text">Valor: <b>R$ {{ $despesa->valor }}</b></p>
                                                <div class="row">
                                                    @if ($despesa->pago == 0)
                                                        <div class="col-1 text-end"style=" color: #dc3545">
                                                            <i class="bi bi-circle-fill text-end"></i>
                                                        </div>
                                                        <div class="col-4 text-start ml-3"style="display: inline">
                                                            <h5 class="card-title">Não pago</h5>
                                                        </div>
                                                    @else
                                                        <div class="col-1 text-start"style="display: inline; color: green">
                                                            <i class="bi bi-circle-fill text-end"></i>
                                                        </div>
                                                        <div class="col-4 text "style="display: inline">
                                                            <h5 class="card-title">Pago</h5>
                                                        </div>
                                                    @endif
                                                </div>
                                                <a href="{{ route('despesas.edit', $despesa->id) }}"
                                                    class="btn btn-primary">Editar</a>
                                                <a onclick="excluir({{ $despesa->id }})" class="btn btn-danger">Excluir</a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if (count($categoria->despesas) > 0)
                                <div class="row mt-5">
                                    <div class="col">
                                        <h5><b>Valor: R$ {{ $categoria->soma_valores_categoria }}</b></h5>

                                    </div>
                                </div>
                            @endif
                        </div>

                        <tr>
                            {{-- @if (empty($categoria->despesas_sum_valor))
                                    <td><b>
                                            <h5>Valor por categória: R$ 0,00</h5>
                                        </b></td>
                                @else
                                    <td><b>
                                            <h5>Valor por categória: R$ {{ $categoria->despesas_sum_valor }}</h5>
                                        </b></td>
                                @endif --}}
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="row mt-5">
            <h3 style="color:rgb(0, 0, 0)">Gastos Totais: <b>R$ {{ $valorTotal }}</b></h3>
            <h3 style="color:rgb(0, 0, 0)"><b>Quanto você tem:</b> R$
                {{ auth()->user()->renda_mensal - $valorTotal }}
                de R$ {{ auth()->user()->renda_mensal }}</h3>

        </div>


    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/despesas/delete.js') }}"></script>
    <script src="{{ asset('assets/js/despesas/changeMes.js') }}"></script>
@endsection
