<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class ChartController extends Controller
{
    public function showChart()
    {
        $population = Charts::select(
            DB::raw("year(created_at) as year"),
            DB::raw("SUM(ano) as ano"),
            DB::raw("SUM(valor) as valor")) 
        ->orderBy(DB::raw("YEAR(created_at)"))
        ->groupBy(DB::raw("YEAR(created_at)"))
        ->get();
        
        $res[] = ['Year', 'ano', 'valor'];
        foreach ($population as $key => $val) {
            $res[++$key] = [$val->Year, (int)$val->ano, (int)$val->valor];
        }
        

        return view('grafico')
        ->with('population', json_encode($res));

    }

    public function insert(Request $req){

        $dados = $req->all();

        Charts::create($req->all());

        return redirect()->route('inserir');

    }
}
