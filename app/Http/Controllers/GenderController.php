<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $genders = Gender::all();
        return view('genders.index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
         return view('genders.create');
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
        Gender::create([
            'name' => $request->name
        ]);

        return redirect()->route('genders.index')->with('success', 'Genre ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): Application|Factory|View
    {
        return view('genders.show', ['gender' => Gender::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View
    {
       $gender = Gender::findOrFail($id);
       return view('genders.edit', compact('gender'));
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
        $updateGender = $request->validate([
            'name' => 'required'
        ]);
        Gender::whereId($id)->update($updateGender);
        return redirect()->route('genders.index')->with('success', 'Le genre mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id): Redirector|RedirectResponse|Application
    {
        $gender = Gender::findOrFail($id);
        $gender->delete();
        return redirect('/genders')->with('success', 'Genre supprimé');
    }
}
