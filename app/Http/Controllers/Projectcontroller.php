<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\ProjectUser;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;

class Projectcontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $projects= Project::orderBy('id')->get();

        return view('projects.index',compact('projects'))
        ->with('i', ($request->input('page', 1) - 1) * 5);

        // $projects = Project::orderby('id')->paginate(5);
        // return view('projects.index',compact('projects'))
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
    }
        // wat hiet allemaal gebeurd geen idee?

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Project $project): View
    {
        $users = User::all('name');
        return view('projects.create', compact('project', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name' => 'required',
            'active' => 'required|boolean',
            'code' => 'required',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'max_hours'=>'required'
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')
                        ->with('success','Project created successfully.');
    }

        // Hier worden de producten opgeslagen met een functie


    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project): View
    {
        // $users = User::all('name');
        return view('projects.show',compact('project')); //users mist hier nu ook
    }
        // Dit stuurt je naar een show.blade view


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project): View
    {
        return view('projects.edit',compact('project'));
    }
        // Dit stuurt je naar een view


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
         request()->validate([
            'name' => 'required',
            'active' => 'required|boolean',
            'code' => 'required',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'max_hours'=>'required'
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')
                        ->with('success','Project updated successfully');
    }
        // Hier worden de Projecten geupdate met de nieuwe gegevens


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('projects.index')
                        ->with('success','Project deleted successfully');
    }
        // Delete functie om Projecten mee wegte gooien.
}
