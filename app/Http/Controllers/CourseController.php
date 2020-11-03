<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Lesson;
use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Course::orderBy('order', 'ASC')->get();

        return view('admin.cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Level::all();

        return view('admin.cursos.create', compact('niveles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
        $request['slug'] = Str::slug($request['name']);
        $curso = Course::create($request->all());

        return redirect('/cursos/'.$curso->id)->with('mensaje', 'Curso guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Course::find($id);
        $unidades = Lesson::where('course_id', $id)->orderBy('order', 'ASC')->get();

        return view('admin.cursos.show', compact('curso', 'unidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Course::findOrFail($id);
        $niveles = Level::all();

        return view('admin.cursos.edit', compact('curso', 'niveles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, $id)
    {
        $curso = Course::find($id);

        $curso->fill($request->all())->save();

        return redirect('/cursos/'.$curso->id)->with('mensaje', 'Curso modificado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Course::find($id);
        $curso->delete();

        return Redirect('/cursos')->with('mensaje', 'Curso borrado con exito.');
    }
}
