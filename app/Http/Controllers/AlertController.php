<?php

/** 
 * Fichier contenant les fonctions des alertes.
 */

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     * Retourne toute la table Alert.
     */
    public function index()
    {
        return Alert::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\Alert
     * Ajoute une alerte et retourn celle ajouté.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dateAlert' => 'required',
            'nameAlert' => 'required',
            'certificat_id' => 'required',
            'description' => 'required',
        ]);

        return Alert::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alert  $id
     * @return \Illuminate\Database\Eloquent\Collection
     * Retourn toutes les données d'une alerte en fonction de son id.
     */
    public function show($id)
    {
        return Alert::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alert  $id
     * @return \Illuminate\Http\Response
     * Met à jour les données d'une alerte et retourn les nouvelles données.
     */
    public function update(Request $request, $id)
    {
        $alert = Alert::find($id);
        $alert->update($request->all());
        return $alert;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alert  $id
     * @return \Illuminate\Http\Response
     * Supprime l'alerte.
     */
    public function destroy($id)
    {
        return Alert::destroy($id);
    }
}
