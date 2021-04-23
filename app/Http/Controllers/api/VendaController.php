<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Venda::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$request->validate([
        //    'valor' => 'required',
        //    'vendedor_id' => 'required'
        //]);
        $comissao = (int)($request->valor*8.5)/100;
        $venda = Venda::create($request->all() + ['comissao' => $comissao] );
        if($venda){
            $response = 
            DB::table('vendas')
            ->join('vendedors', 'vendedors.id', '=', 'vendas.vendedor_id')
            ->select('vendas.id', 'vendedors.nome', 'vendedors.email', 'vendas.comissao', 'vendas.valor', 'vendas.created_at')
            ->where('vendas.id', $venda->id)
            ->get();
            return $response;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Search and Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        //
        $vendas = DB::table('vendas')
            ->join('vendedors', 'vendedors.id', '=', 'vendas.vendedor_id')
            ->select('vendas.id', 'vendedors.nome', 'vendedors.email', 'vendas.comissao', 'vendas.valor', 'vendas.created_at')
            ->where('vendedors.id', $id)
            ->get();
        //return Venda::where('vendedor_id', $id)->get();
        return $vendas;
    }

    /*
    $comm = \DB::table('bakerysales')
    ->where('customer_id', auth()->id())
    ->whereMonth('sales_date', $request->input('mn'))
    ->whereYear('sales_date', $request->input('yr'))
    ->get();

    return view('showCommission', compact('comm'));

    $q->whereRaw(DB::raw(“DATE(created_at) = ‘”.date(‘Y-m-d’).”‘”));
    */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
