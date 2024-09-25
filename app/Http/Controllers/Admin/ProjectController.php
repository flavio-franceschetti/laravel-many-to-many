<?php

namespace App\Http\Controllers\Admin;

use App\functions\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        $projectCount= Project::count('id');

        return view('admin.projects.index', compact('projects','projectCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // prendo tutti i dati che ricevo dal form
       $data = $request->all();
       //creo un nuovo progetto
       $newProject = new Project();
       // genero lo slug con il titolo che è stato mandato nel form
       $data['slug'] = Helper::generateSlug($data['name'], Project::class);
       // fillo il nuovo progetto con tutti i dati ricevuti e laravel assegnerà automaticamente i valori provenienti dall'array $data agli attributi del modello che sono presenti in $fillable
        $newProject->fill($data);
        // salvo il nuovo progetto
        $newProject->save();
        // reindirizzo alla pagina index dove c'è l'elenco di tutti i progetti
        return redirect()->route('admin.projects.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $data = $request->all();

        if($data['name'] === $project->name){
            $data['slug'] = $project->slug;
        } else{
            $data['slug'] = Helper::generateSlug($data['name'], Project::class);
        }

        $project->update($data);
        return redirect()->route('admin.projects.show', $project->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
