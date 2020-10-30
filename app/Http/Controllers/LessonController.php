<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Course;
use App\Http\Requests\LessonStoreRequest;
use App\Http\Requests\LessonUpdateRequest;
use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $curso)
    {
        return view('admin.unidades.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonStoreRequest $request)
    {
        $request['slug'] = Str::slug($request['name']);

        $unidad = Lesson::create($request->all());

        return redirect('/unidades/'.$unidad->id)->with('mensaje', 'Unidad guardada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidad = Lesson::findOrFail($id);
        $video = Support::where('lesson_id', $unidad->id)
                            ->where('type_support_id', 1)
                            ->first();

        $archivos = Support::where('lesson_id', $unidad->id)
                            ->where('type_support_id', 2)
                            ->get();

        $imagenes = Support::where('lesson_id', $unidad->id)
                            ->where('type_support_id', 3)
                            ->get();

        return view('admin.unidades.show', compact('unidad', 'video', 'archivos', 'imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad = Lesson::find($id);

        return view('admin.unidades.edit', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(LessonUpdateRequest $request, $id)
    {
        $unidad = Lesson::find($id);

        $unidad->fill($request->all())->save();

        return redirect('/unidades/'.$unidad->id)->with('mensaje', 'Unidad modificada con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unidad = Lesson::find($id);
        $unidad->delete();

        return redirect('/cursos/'.$unidad->course_id)->with('mensaje', 'Unidad borrada con exito.');
    }
}
