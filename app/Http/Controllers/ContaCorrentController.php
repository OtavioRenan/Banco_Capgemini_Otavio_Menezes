<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositorio\ContaCorrente;

class ContaCorrentController extends Controller
{
    protected function buscarConta($conta)
    {        
        if(count(ContaCorrente::where('conta', $conta)->get()))
        {
            return ContaCorrente::where('conta', $conta)->get();
        }
        return response()->json(['errors' => ['conta' => ['Esta conta não existe.']]], 422);
    }

    protected function depositar(Request $request, $id)
    {        
        $request->validate([
            'valor' => ['required', 'numeric'],
        ]);

        $dados = ContaCorrente::find($id);
        if($dados)
        {
            $dados->saldo += $request->input('valor');
            $dados->save();
            
            return $dados;
        }
    }

    protected function sacar(Request $request, $id)
    {        
        $request->validate([
            'valor' => ['required', 'numeric'],
        ]);

        $dados = ContaCorrente::find($id);
        if($dados)
        {
            if($dados->saldo >= $request->input('valor'))
            {
                $dados->saldo = $dados->saldo - $request->input('valor');
                $dados->save();
                return $dados;
            }
            return response()->json(['errors' => ['valor' => ['Saldo insufuciente']]], 422);
        }
    }

}
