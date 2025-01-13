<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

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
        try {
            $this->validateLoginFields($request);
            $this->validateEmail($request);

            $user =  DB::table('usuarios')
                ->insert([
                    'nome' => $request->nome,
                    'senha' => Hash::make($request->senha),
                    'email' =>  $request->email
                ]);

            return response()->json($user);
        } catch (BadRequestException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }


    public function atualizar(Request $request, $id)
    {

        try {
            $this->validateLoginFields($request);

            $user = DB::table('usuarios')
                ->where('id', $id)
                ->update(['nome' => $request->nome, 'email' => $request->email, 'senha' => $request->senha]);

            return response()->json(['message' => "Usuário atualizada com sucesso!"]);
        } catch (BadRequestException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function deletar($id)
    {
        $user = DB::table('usuarios')
            ->where('id', $id)
            ->delete();

        return response()->json($user);
    }


    protected function validateLoginFields($request)
    {
        $this->validateField($request, 'nome');
        $this->validateField($request, 'email');
        $this->validatePasswordField($request,'senha');
        
    }

    protected function validateField($request, $field)
    {
        if (is_null($request->$field) || empty($request->$field)) {
            throw new BadRequestException("Campo $field não pode ser vazio!");
        }
    }
    
    protected function validatePasswordField($request, $field)
    {
        if (strlen($request->$field) < 6) {
            throw new BadRequestException("Campo $field deve ter pelo menos 6 caracteres!");
        }
    }

    protected function getUsuarioByEmail($email){     
         $user = DB::table('usuarios')
         ->where('email','=', $email)
         ->select('nome')
        ->get()->first();

        return $user;
    }

    protected function validateEmail($request){
        if(!empty($this->getUsuarioByEmail($request->email)))
         throw new BadRequestException("Email já cadastrado!");
    }

}
