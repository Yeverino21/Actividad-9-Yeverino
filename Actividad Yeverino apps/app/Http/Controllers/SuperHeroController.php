<?php

namespace App\Http\Controllers;
use App\Models\Gender;
use App\Models\Universe;
use App\Models\SuperHero;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::select('id', 'name')->get();
        return view('superheroes.create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SuperHero::create([
            'gender_id' => $request->gender_id,
            'real_name' => $request->real_name,
            'universe_id' => $request->universe_id,
            'name' => $request->name,
            'picture' => ""
            

        ]);

        return to_route('superheroes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $superhero = SuperHero::find($id);
        return view('superheroes.show', compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $superhero = Superhero::findorfail($id);
        $genders = Gender::select('id', 'name')->get();
        $universes = Universe::select('id','name')->get();
        return view('superheroes.edit', compact('superhero', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $superhero = Superhero::find($id);
        $superhero->update([
            'gender_id' => $request->gender_id,
            'real_name' => $request ->real_name,
            'universe_id' => 1,
            'name' => $request->name,
            'picture' => $request->picture,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return to_route ('superheroes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $superhero = Superhero::find($id);
        $superhero->delete();
        return to_route ('superheroes.index');//
    }
}
