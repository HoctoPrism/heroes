<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Hero;
use App\Models\Race;
use App\Models\Skill;
use App\Models\Universe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $heroes = Hero::all();
        return view('heroes.index', compact('heroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        $skills = Skill::all();
        $races = Race::all();
        $genders = Gender::all();
        $universes = Universe::all();
        return view('heroes.create', compact('skills', 'races', 'universes', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image' => 'image|nullable|max: 1999'
        ]);

        if ($request->hasFile('image')) {
            // Get Filename
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just Extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Filename To store
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_' .time().'.'.$extension;
            // Upload
            $request->file('image')->storeAs('public/image', $fileNameToStore);
        }
        else {
            // Else add a dummy image
            $fileNameToStore = '';
        }


        $heroe = Hero::create([
            'name' => $request->name,
            'description' => $request->description,
            'gender' => $request->gender,
            'race' => $request->race,
            'skill' => $request->skill,
            'image' => $fileNameToStore
        ]);
        $heroe->universe()->attach($request->universes);

        return redirect()->route('heroes.index')->with('success', 'Heroe ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): Application|Factory|View
    {
        return view('heroes.show', ['heroe' => Hero::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View
    {
        $skills = Skill::all();
        $races = Race::all();
        $genders = Gender::all();
        $universes = Universe::all();
        $heroe = Hero::findOrFail($id);

       return view('heroes.edit', compact('skills', 'races', 'genders', 'universes', 'heroe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $updateHeroe = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'skill' => 'required',
            'image' => 'image|nullable|max: 1999'
        ]);

        if ($request->hasFile('image')) {
            if (Hero::findOrFail($id)->image){
                unlink("storage/image/".Hero::findOrFail($id)->image);
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_' .time().'.'.$extension;
            $request->file('image')->storeAs('public/image', $fileNameToStore);
            $updateHeroe['image'] = $fileNameToStore;
        }

        Hero::findOrFail($id)->universe()->sync($request->universes);
        Hero::whereId($id)->update($updateHeroe);

        return redirect()->route('heroes.index')->with('success', 'Le heroe mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id): Redirector|RedirectResponse|Application
    {
        $heroe = Hero::findOrFail($id);
        if (Hero::findOrFail($id)->image){
            unlink("storage/image/".Hero::findOrFail($id)->image);
        }
        $heroe->universe()->detach();
        $heroe->delete();
        return redirect('/heroes')->with('success', 'Heroe supprimé');
    }
}
