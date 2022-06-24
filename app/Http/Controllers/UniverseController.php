<?php

namespace App\Http\Controllers;

use App\Models\Universe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UniverseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $universes = Universe::all();
        return view('universes.index', compact('universes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
         return view('universes.create');
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
            'name'=>'required'
        ]);
        Universe::create([
            'name' => $request->name
        ]);

        return redirect()->route('universes.index')->with('success', 'Universe ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): Application|Factory|View
    {
        return view('universes.show', ['universe' => Universe::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View
    {
       $universe = Universe::findOrFail($id);
       return view('universes.edit', compact('universe'));
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
        $updateUniverse = $request->validate([
            'name' => 'required'
        ]);
        Universe::whereId($id)->update($updateUniverse);
        return redirect()->route('universes.index')->with('success', 'Le universe mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id): Redirector|RedirectResponse|Application
    {
        $universe = Universe::findOrFail($id);
        $universe->delete();
        return redirect('/universes')->with('success', 'Universe supprimé');
    }
}
