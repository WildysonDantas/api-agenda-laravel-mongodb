<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\Support\Facades\Validator;

class ContatoController extends Controller
{
   

    //Criar Contto
    function create(Request $req){

        $regras = [     
                        'nome'=> 'required|min:3',
                        'endereco'=> 'required|min:10',
                        'telefone'=> 'required|min:11|max:11'
                    ];
        $mensagens = [  
                        'required'=> 'O campo :attribute é obrgatorio',
                        'min' => 'O campo :attribute  precisa ter no minimo :min caracteres',
                    ];
        
       // $this->validate($req, $regras, $mensagens);

        $validator = Validator::make($req->all(), $regras, $mensagens);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro ao registrar contato',
                'errors' => $validator->errors(),
            ], 400);
        } 

        $contato = new Agenda();
        $contato->fill($req->all());
        $contato->save();

        return response()->json([
            'success' => true,
            'message' => 'Contato registrado com sucesso'
        ], 201);
    }

     //Listar Contto
    function list(){

        $contatos = Agenda::get();
        if(empty($contatos)){
            return response()->json([
                'success' => false,
                'message' => 'Nenhum contato encontrado'
            ], 204);
        }

        return response()->json([
            'success' => true,
            'data' => $contatos,
            'message' => 'Contatos encontrados com sucesso'
        ], 200);
    }

     //update Contato
     function update(Request $req){

        $regras = [  
            '_id' => 'required',  
            'nome'=> 'required|min:3',
            'endereco'=> 'required|min:10',
            'telefone'=> 'required|min:11|max:11'
        ];

        $mensagens = [  
                    'required'=> 'O campo :attribute é obrgatorio',
                    'min' => 'O campo :attribute  precisa ter no minimo :min caracteres',
                ];


        $validator = Validator::make($req->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro ao atualizar o contato',
                'errors' => $validator->errors(),
            ], 400);
        } 
        

        $contato = Agenda::where('_id', $req->_id)->first();
        if(empty($contato)){
            return response()->json([
                'success' => false,
                'message' => 'Nenhum usuario foi encontrado para esse id',
            ], 400);
        }

        $contato->update($req->all());
     

        return response()->json([
            'success' => true,
            'data' => $contato,
            'message' => 'Contato atualizado com sucesso'
        ], 200);
    }

     //remover Contato
     function delete(Request $req){

        $regras = [ '_id' => 'required'];

        $mensagens = ['required'=> 'O campo :attribute é obrgatorio', ];


        $validator = Validator::make($req->all(), $regras, $mensagens);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro ao remover o contato',
                'errors' => $validator->errors(),
            ], 400);
        } 
        

        $contato = Agenda::where('_id', $req->_id)->first();
        if(empty($contato)){
            return response()->json([
                'success' => false,
                'message' => 'Nenhum usuario foi encontrado para esse id',
            ], 400);
        }

        $contato->delete();
     

        return response()->json([
            'success' => true,
            'data' => $contato,
            'message' => 'Contato removido com sucesso'
        ], 200);
    }
}
