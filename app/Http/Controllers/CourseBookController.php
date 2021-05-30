<?php

namespace App\Http\Controllers;

use App\Models\Course_Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CourseBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save($curso_id, $libro_id, $docente_id = null)
    {
        $relacion = new Course_Book();
        $relacion->docente_id = $docente_id;
        $relacion->curso_id = $curso_id;
        $relacion->libro_id = $libro_id;
        $relacion->save();
        return redirect()->route('book.index', $curso_id);
    }

    public function saveUpdate($curso_id, $libro_id, $docente_id = null)
    {

        $relacion = Course_Book::where('curso_id', $curso_id)->where('libro_id', $libro_id)->first();
        $relacion->docente_id = $docente_id;
        $relacion->curso_id = $curso_id;
        $relacion->libro_id = $libro_id;
        $relacion->save();
        return redirect()->route('book.index', $curso_id);
    }

    public function guardar(Request $request, $libro_id)
    {
        $request->validate(
            [
                "curso" => ['required'],
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );
        $relacion = Course_Book::where('curso_id', $request->curso)->where('libro_id', $libro_id)->first();
        if (empty($relacion)) {
            $relacion = new Course_Book();
        }
        $relacion->docente_id = $request->docente;
        $relacion->curso_id = $request->curso;
        $relacion->libro_id = $libro_id;
        $relacion->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course_Book  $course_Book
     * @return \Illuminate\Http\Response
     */
    public function show(Course_Book $course_Book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course_Book  $course_Book
     * @return \Illuminate\Http\Response
     */
    public function edit(Course_Book $course_Book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course_Book  $course_Book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course_Book $course_Book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course_Book  $course_Book
     * @return \Illuminate\Http\Response
     */
    public function destroy($curso_id, $libro_id)
    {
        $relacion = Course_Book::where('curso_id', $curso_id)->where('libro_id', $libro_id)->first();
        $relacion->delete();
        return redirect()->back();
    }
}
