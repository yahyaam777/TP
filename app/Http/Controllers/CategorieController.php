<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories=Categorie::all();
            return response()->json($categories);
        } catch (\Throwable $th) {
           
            return response()->json("les categories non dispo");
        }
    }

        public function store(Request $request)
    {
        try{
    $categorie = new Categorie([
        'nom-categorie' => $request->input('nom-categorie'),
        'image-categorie' => $request->input('image-categorie')
        ]);
        $categorie->save();
        return response()->json('Catégorie créée !');}  
        catch(\Exception $e){
            return response()->json("probleme d'ajout");
        }
    }
        public function show($id)
        {
            $categorie = Categorie::findor($id);
            return response()->json($categorie);
        }
        public function update(Request $request, $id)
        { try{
            $categorie = Categorie::find($id);
            $categorie->update($request->all());
            return response()->json('Catégorie MAJ !');
        }catch(Exception $e){
            return response()->json('update failed !');
        }
        }

        public function destroy($id)
        { try{
            $categorie = Categorie::find($id);
            $categorie->delete();
            return response()->json('Catégorie supprimée !');
        }catch(Exception $e){
            return response()->json('Catégorie non supprimée !');
        }

        }
    }
