<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Turma;
use Illuminate\Http\Request;
use App\Models\Escola;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EscolaController extends Controller
{
    public function listar()
    {
        $escola = Escola::paginate(3);

        return view('escola.listar')->with('escolas', $escola);
    }

    public function cadastrar()
    {
        $municipios = Municipio::where("estado_id", '=', 42)->orderBy('nome')->get();

        return view('escola.form')->with('municipios', $municipios);
    }

    public function salvar(Request $request, $id)
    {
        Validator::make($request->all(), Escola::rules(), Escola::message())->validate();
        if ($id == 0) {
            Escola::create($request->all());

        } else {
            Escola::updateOrCreate(
                ['id' => $request->id],
                $request->all()
            );

        }
        $request->session()->flash('success', "Registro Salvo com Sucesso!");

        return redirect()->action('EscolaController@listar');
    }

    public function editar($id)
    {
        $escola = Escola::find($id);

        $municipios = Municipio::where("estado_id", '=', 42)->orderBy('nome')->get();

        return view('escola.form')->with(['escola' => $escola, 'municipios' => $municipios]);
    }

    public function deletar($id)
    {
        $escola = Escola::find($id);

        if (empty($escola)) {
            return '<h2>Houve um problema ao consultar o ID informado</h2>';
        }
        $escola->delete();

        return redirect()->action('EscolaController@listar')->with('error', "Registro Removido com Sucesso!");
    }

    public function pesquisar(Request $request)
    {
        if (!empty($request->nome)) {
            $objResult = Escola::where('nome', 'like', "%" . $request->nome . "%")->orderBy('nome')->paginate(10);
        }else{
            $objResult = Escola::orderBy('nome')->paginate(10);
        }

        return view('escola.listar')->with('escolas', $objResult);
    }
}
