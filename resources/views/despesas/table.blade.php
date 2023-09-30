<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="container full">
    <style>

        .navbar {
            background-color: #3498db !important;
            color: #E8D5B7;
        }

        .btn-primary {
            background-color: #5eba7d;
            color: #FFFFFF;
            border: none;

        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: #333333;
        }
    </style>
    @foreach ($categorias as $categoria)
        @if (isset($categoria->despesas))
            <div class="container mt-5" style="border: 2px solid rgb(212, 209, 209); border-radius: 10px">
                <div class="row mt-5">
                    @if (count($categoria->despesas) > 0)
                        <h3 style="color:rgb(0, 0, 0)"><b>{{ $categoria->categoria }}</b></h3>
                    @endif
                    <div>


                        <div class="row">
                            @foreach ($categoria->despesas as $despesa)
                                <div class="col-sm-6 mb-5 mx-auto">
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
        <h3 style="color:rgb(0, 0, 0)"><b>Quanto você tem da renda mensal:</b> R$
            {{ auth()->user()->renda_mensal - $valorTotal }}
            de R$ {{ auth()->user()->renda_mensal }}</h3>

    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
