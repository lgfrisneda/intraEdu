<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportStoreRequest;
use App\Http\Requests\SupportUpdateRequest;
use App\Lesson;
use App\Support;
use App\TypeSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lesson $unidad)
    {
        $soportes = Support::where('lesson_id', $unidad->id)->with('lesson')->orderBy('type_support_id', 'ASC')->orderBy('order', 'ASC')->get();

        return view('admin.soportes.index', compact('soportes', 'unidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lesson $unidad)
    {
        $tipoSoportes = TypeSupport::all();

        return view('admin.soportes.create', compact('tipoSoportes', 'unidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportStoreRequest $request)
    {
        $soporte = Support::create($request->all());

        if($request->file('file')){
            $path = Storage::disk('public')->put('cursos', $request->file('file'));

            $soporte->fill(['file' => $path])->save();
        }

        return redirect('/soportes/'.$soporte->lesson_id)->with('mensaje', 'Soporte guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soporte = Support::find($id);
        $tipoSoportes = TypeSupport::all();

        return view('admin.soportes.edit', compact('tipoSoportes', 'soporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(SupportUpdateRequest $request, $id)
    {
        $soporte = Support::find($id);

        //$soporte->fill($request->all())->save();

        if($request->file('file')){
            
            Storage::delete('public/'.$soporte->file);

            $path = Storage::disk('public')->put('cursos', $request->file('file'));

            $soporte->fill(['file' => $path])->save();

        }

        return redirect('/soportes/'.$soporte->lesson_id)->with('mensaje', 'Soporte modificado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soporte = Support::find($id);
        Storage::delete('public/'.$soporte->file);

        $soporte->delete();

        return redirect('/soportes/'.$soporte->lesson_id)->with('mensaje', 'Soporte borrado con exito.');
    }
}
