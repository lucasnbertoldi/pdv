<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Venda;
use App\Cliente;
use App\Produto;
use App\VendaProduto;
use Exception;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{

    /**
     * Exibe a lista de Vendas cadastradas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = DB::table('vendas as v')
            ->leftJoin('clientes as c', 'c.id', '=', 'v.cliente_id')
            ->select('v.id', 'c.nome as nomeCliente', (DB::raw("(SELECT sum(pv.valorUnitario * pv.quantidade) FROM venda_produtos as pv WHERE pv.venda_id = v.id) AS valor")))
            ->get();
        return view('venda.index', compact('vendas'));
    }

    /**
     * Exibe a tela de criação de uma venda
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('venda.create', compact('produtos', 'clientes'));
    }


    /**
     * Armazena uma Nova Venda
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $quantidadeProdutos =  intval($request->input('quantidadeProdutos'));
            if ($quantidadeProdutos == 0) {
                throw new Exception('Não é possível cadastrar uma venda sem produtos.');
            }
            $venda = Venda::create($request->all());
            for ($i = 0; $i < $quantidadeProdutos; $i++) {
                $idProduto = $request->input('idListaProduto' . $i);
                $quantidade = $request->input('quantidadeListaProduto' . $i);
                $valorUnitario = $request->input('valorListaProduto' . $i);
                VendaProduto::create([
                    'venda_id' => $venda->id,
                    'produto_id' => $idProduto,
                    'quantidade' => $quantidade,
                    'valorUnitario' => $valorUnitario
                ]);
            }
            return redirect()->route('venda.index');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }

    /**
     * Mostra as informações da venda
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        $venda =  DB::table('vendas as v')
            ->leftJoin('clientes as c', 'c.id', '=', 'v.cliente_id')
            ->where("v.id", "=", $venda->id)
            ->select('v.id', "v.observacoes", 'c.nome as nomeCliente', (DB::raw("(SELECT sum(pv.valorUnitario * pv.quantidade) FROM venda_produtos as pv WHERE pv.venda_id = v.id) AS valor")))
            ->get()->first();

        $produtos = DB::table('venda_produtos as pv')
            ->leftJoin('produtos as pro', 'pv.produto_id', '=', 'pro.id')
            ->where("pv.venda_id", "=", $venda->id)
            ->select('pv.produto_id as id', "pro.nome as nome", 'pv.quantidade as quantidade', 'pv.valorUnitario as valorUnitario', (DB::raw("(pv.quantidade * pv.valorUnitario) AS valorTotal")))
            ->get();
        return view('venda.show', compact('venda', 'produtos'));
    }


    /**
     * Método de remover venda
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        $venda->delete();
        return redirect()->route('venda.index');
    }
}
