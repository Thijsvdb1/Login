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

    }
        // wat hiet allemaal gebeurd geen idee?

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Project $project): View
    {
        $users = User::all('name', 'id'); // Hier word de variable $ name en id aangeroepen
        return view('projects.create', compact('project', 'users')); // Hier word de variable $ name en id mee gestuurt door de compact naar de view
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
            'max_hours'=>'required',
        ]);

        $project = Project::create($request->all()); // Hier create hij alle requests
        $project->users()->attach($request->input('users')); // Hier attacht hij de Input van users aan de pivot table inde database
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
        return view('projects.show',compact('project'));
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
        $users = User::all('id','name'); // Hier word de variable $ name en id aangeroepen
        return view('projects.edit',compact('project', 'users')); // Hier word de variable $ name en id mee gestuurt door de compact naar de view
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
        // Dit zijn de oude users voordat je ze update dus hier zijn al wat dingen aangevinkt
        $oldusers = $project->users;

         request()->validate([
            'name' => 'required',
            'active' => 'boolean',
            'code' => 'required',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'max_hours'=>'required'
        ]);

        // $project = Project::update($request->all());
        // Dit is precies hetzelfde als hieronder alleen moesten we dat doen voor de active zodat hij die aangeeft of hij checked is en kan update
        $project->update([
            'name' => $request->name,
            'active' => $request->has('active'),
            'code' => $request->code,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'max_hours'=> $request->max_hours,
            'judgement'=> $request->judgement
        ]);

        // Hier zegt hij als de request iets heeft van users dan maakt hij van die request input $newusers.
        if($request->has('users')){
        $newusers = $request->input('users');
        }
        // zo niet houd hij ze leeg zodat ze niet checked zijn
        else{
        $newusers = [];
        }

            // Hier zegt hij voor elke oude user detatch de id, dit gebeurd voor de update.
        foreach( $oldusers as $olduser){
                $project->users()->detach($olduser->id);
        }
            // Hier zegt hij voor elke nieuwe user attach die aan de pivot table.
        foreach( $newusers as $newuser){
                $project->users()->attach($newuser);
        }



        return redirect()->route('projects.index')
                        ->with('success','Project updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete(); // Delete

        return redirect()->route('projects.index')
                        ->with('success','Project deleted successfully');
    }
        // Delete functie om Projecten mee wegte gooien.
}
