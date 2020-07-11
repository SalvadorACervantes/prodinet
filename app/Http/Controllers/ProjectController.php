<?php

namespace App\Http\Controllers;

//use DB; para realizar conexion sin modelo
use App\Project;//modelo
use Illuminate\Http\Request;
use App\Http\Requests\SaveProjectRequest;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
        //para dar quienens pueden acceder ('auth')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$portfolio = DB::table('projects')->get(); obtener datos de la tabla
        //$portfolio = Project::latest()->paginate();//obtener los datos
        //return view('portafolio', compact('portfolio'));
        return view('projects.index',[
            'projects' => Project::latest()->paginate()
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create',[
            'project'=> new Project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
       /* $field = request()->validate([
            'title'=> 'required',
            'url'=>'required',
            'description' => 'required',
        ]);*/
        //
        /*Project::create([
            'title'=> request('title'),
            'url'=> request('url'),
            'description'=> request('des')
        ]);*/
       // Project::create($field);
        //Project::create(request()->all());

        Project::create($request->validated());
        return redirect()->route('projects.index')->with('status','Proyecto fue creado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
       // return Project::find($id);
        

        return view('projects.show',[
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return view('projects.edit',[
            'project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, SaveProjectRequest $request)
    {
        //
         /*$project->update([
            'title'=> request('title'),
            'url'=> request('url'),
            'description'=> request('description'),
         ]);*/

         $project->update($request->validated());

          return redirect()->route('projects.show',$project)->with('status','Proyecto fue actualizado con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('projects.index')->with('status','Proyecto fue eliminado con exito');
    }
}
