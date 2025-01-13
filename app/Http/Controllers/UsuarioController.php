<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Exception;

class UsuarioController extends Controller
{
    public function getUsuarios()
    {
        $user = DB::table('usuarios')
            ->select(['id', 'nome', 'senha', 'email'])
            ->get();

        return response()->json($user);
    }

    public function criar(Request $request)
    {
        $user =  DB::table('usuarios')
            ->insert([
                'nome' => $request->nome,
                'senha' => Hash::make($request->senha),
                'email' =>  $request->email
            ]);
        
        return response()->json($user);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function atualizar(Request $request, $id)
    {
        $user = DB::table('usuarios')
        ->where('id',$id)
        ->update(['nome' => $request->nome, 'email' => $request->email]);

        return response()->json($user);
    
       
    }

    public function deletar($id)
    {
        $user = DB::table('usuarios')
        ->where('id', $id)
        ->delete();

        return response()->json($user);
    }


    /*protected function validateLoginFields($request)
    {
        $this->validateField($request, 'email');
        $this->validateField($request, 'senha');
    }

    protected function validateField($request, $field)
    {
        if(is_null($request->$field) || empty($request->$field)) {
            throw new BadRequestException("Campo $field não enviado!");
        }
        // request->all do laravel retorna array
        // $array = $request->all();
        // if(!isset($array, $field) || is_null($array[$field]) || empty($array[$field])) {
        //     throw new BadRequestException("Campo $field não enviado!");
        // }
    }8*/
}
