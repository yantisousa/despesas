<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Despesas;
use App\Models\Meses;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    public function index()
    {
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');


        $data = ['categorias', 'valorTotal', 'despesas', 'meses'];
        $meses = Meses::all();

        $mesAtual = date('m');
        $categorias = Categoria::withSum('despesas', 'valor')->with(['despesas' => function($query) use ($mesAtual){
            $query->whereMonth('created_at', $mesAtual)->where('user_id', auth()->user()->id);
        }])->get();

        $despesas = Despesas::with('categoria')->where('user_id', auth()->user()->id)->get();
        $valorTotal = 0;

        foreach($categorias as $categoria) {
            foreach($categoria->despesas as $despesa) {
                $categoria->soma_valores_categoria = $despesa->valor + $categoria->soma_valores_categoria;
            }
        }

        foreach($despesas as $despesa) {
            $valorTotal = $valorTotal + $despesa->valor;
        }
        return view('despesas.index', compact($data));
    }

    public function create()
    {
        $data = ['categorias'];
        $categorias = Categoria::orderBy('categoria', 'desc')->get();
        return view('despesas.create', compact($data));
    }

    public function store(Request $request)
    {
        Despesas::create([
            'categoria_id' => $request->categoria_id,
            'user_id' => auth()->user()->id,
            'nome' => $request->nome,
            'desc' => "ok",
            'valor' => $request->valor,
            'pago' => 0
        ]);
        return to_route('home.user');
    }
    public function edit(Despesas $despesa)
    {
        $data = ['despesa', 'categorias'];
        $categorias = Categoria::orderBy('categoria', 'desc')->get();
        return view('despesas.edit', compact($data));
    }

    public function update(Request $request, Despesas $despesa)
    {
        if($request->pago == "on") {
            $request["pago"] = 1;
        } else {
            $request["pago"] = 0;
        }
        $despesa->update($request->all());
        return to_route('home.user');
    }

    public function destroy(Despesas $despesa)
    {
        $despesa->delete();
    }

    public function filtros(Request $request)
    {
        $data = ['categorias', 'valorTotal', 'despesas', 'meses'];
        $meses = Meses::all();

        $mesAtual = $request->mes;
        $categorias = Categoria::withSum('despesas', 'valor')->with(['despesas' => function($query) use ($mesAtual){
            $query->whereMonth('created_at', $mesAtual)->where('user_id', auth()->user()->id);
        }])->get();

        $despesas = Despesas::with('categoria')->where('user_id', auth()->user()->id)->get();
        $valorTotal = 0;

        foreach($categorias as $categoria) {
            foreach($categoria->despesas as $despesa) {
                $categoria->soma_valores_categoria = $despesa->valor + $categoria->soma_valores_categoria;
            }
        }

        foreach($despesas as $despesa) {
            $valorTotal = $valorTotal + $despesa->valor;
        }

        return view('despesas.table', compact($data));
    }
}
