<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //recuperar os registros do banco de dados
        $users = User::get();

        //dd($users);

        //carregar na view
        return view('users.index', ['users' => $users]);
    }

    public function import(Request $request)
    {
        //dd($request);

        $request->validate(
        [
            'file' => 'required|mimes:csv,txt|max:2048',
        ],
        [
            'file.required' => 'O campo arquivo é obrigatório.',
            'file.mimes' => "Arquivo inválido, necessário enviar arquivo CSV.",
            'file.max' => 'Tamanho do arquivo excede :max Mb.'
        ]);

        //criar o array com as colunas no banco de dados
        $headers = ['name', 'email', 'password'];

        dd(array_map('str_getcsv', file($request->file('file'))));

        //receber o arquivo, ler os dados e converter string em array

        $dataFile = file($request->file('file'));

        dd($dataFile);
        
    }
}
