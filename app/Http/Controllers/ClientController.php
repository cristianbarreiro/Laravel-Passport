<?php
// Ejemplo de controlador personalizado
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\ClientRepository;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'redirect' => 'required|url',
        ]);

        $clientRepo = new ClientRepository();
        $client = $clientRepo->createPasswordGrantClient(
            $request->user()->id,
            $request->name,
            $request->redirect
        );

        return response()->json($client);
    }
}
