<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();                          
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClienteRequest $request)
    {
        $data = $request->all();
        
        if ($request->hasFile('foto')) { 
            $image = $request->file('foto');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['foto'] = $imageName;
        }
        
        Cliente::create($data);

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        
        $data = $request->all();

        
        if ($request->hasFile('foto')) {

            if ($cliente->foto) {
            unlink(public_path('images').'/'.$cliente->foto);
            }

            $image = $request->file('foto');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['foto'] = $imageName;
        }

        
        $cliente->update($data);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
