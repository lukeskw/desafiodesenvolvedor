<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    private $objUsuario;

    public function __construct()
    {
        $this->objUsuario = new User();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuario=$this->objUsuario->orderBy('id','DESC')->paginate(7);//all
        return view("index", compact( 'usuario'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $search = $request->get('search');
        $usuario= User::where('nome','like','%'.$search.'%')->get();
        return view("index",  compact('usuario'))->withuser($usuario);
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $cadastro= $this->objUsuario->create([
           'nome'=>$request->nome,
           'sexo'=>$request->sexo,
           'nascimento'=>$request->nascimento
        ]);
        if($cadastro){
            return redirect("usuarios");
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
        $usuario=$this->objUsuario->find($id);
        return view("show", compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=$this->objUsuario->find($id);
        return view('create', compact('usuario'));
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
        //dd($request, $id);
            $this->objUsuario->where(['id'=>$id])->update([
            'nome'=>$request->nome,
            'sexo'=>$request->sexo,
            'nascimento'=>$request->nascimento
        ]);
            return redirect("usuarios");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect("usuarios");
    }
}
