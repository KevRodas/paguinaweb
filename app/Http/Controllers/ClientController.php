<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Egulias\EmailValidator\Result\Reason\CommentsInIDRight;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Session;
use Symfony\Contracts\Service\Attribute\Required;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(5);

        return view('client.index')
        ->with('client',$clients);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('client.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
        ]);

        $client = Client::create($request->only('name','apellido','deuda','puesto','comments'));
        session::flash('mensaje','Registro Creado Con exito');
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.form') ->with('clients', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
       
        $client->name = $request['name'];
        $client->apellido = $request['apellido'];
        $client->deuda = $request['deuda'];
        $client->puesto = $request['puesto'];
        $client->comments = $request['comments'];
        $client->save();
        session::flash('mensaje','Registro Editado Con exito');

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session::flash('mensaje','Registro Eliminado Con xito');

        return redirect()->route('client.index');
    }
}
