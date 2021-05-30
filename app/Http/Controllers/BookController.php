<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Models\Course_Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($curso_id = null)
    {
        if ($curso_id == null) {
            $libros = Book::all();
            return view('books.indexBook', compact('libros', 'curso_id'));
        }
        $curso = Course::find($curso_id);
        $libros = $curso->libros;
        return view('books.indexBook', compact('libros', 'curso_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($curso_id = null)
    {
        $cursos = Course::select('id', 'nombre')->get();
        $docentes = User::role('Docente')->get();
        return view('books.createBook', compact('curso_id', 'cursos'), compact('docentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $curso_id = null)
    {
        $request->validate(
            [
                "titulo" => ['required'],
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );

        if ($request->docente != null) {
            $request->validate(
                [
                    "curso" => ['required'],
                ],
                [
                    'required' => 'El :attribute es requerido si asigna un docente.'
                ]
            );
        }

        $newBook = new Book();
        $newBook->titulo = $request->titulo;
        $newBook->descripcion = $request->descripcion;
        $newBook->save();

        if ($curso_id != null) {
            return redirect()->route('curso.libro.save', [$curso_id, $newBook, $request->docente]);
        } elseif ($request->curso == null) {
            return redirect()->route('book.index', $curso_id);
        } else {
            return redirect()->route('curso.libro.save', [$request->curso, $newBook, $request->docente]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($libro_id, $curso_id = null)
    {
        $libro = Book::find($libro_id);
        $docentes = User::role('Docente')->get();
        $cursos = $libro->cursos;
        Session::flash('url', request()->headers->get('referer'));
        return view('books.mostrarBook', compact('cursos', 'curso_id'), compact('libro', 'docentes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($libro_id, $curso_id = null)
    {
        $libro = Book::find($libro_id);
        $docentes = User::role('Docente')->get();
        Session::flash('url', request()->headers->get('referer'));
        $encargado = null;
        if ($curso_id != null) {
            $id = $libro->cursos->where('id', $curso_id)->first()->pivot->docente_id;
            if ($id != null) {
                $encargado =  User::find($id);
            }
        }
        return view('books.editBook', compact('libro', 'encargado'), compact('docentes', 'curso_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $libro_id, $curso_id = null)
    {
        $request->validate(
            [
                "titulo" => ['required'],
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );

        $editBook = Book::find($libro_id);
        $editBook->titulo = $request->titulo;
        $editBook->descripcion = $request->descripcion;
        $editBook->save();

        if ($curso_id != null) {
            $id = $editBook->cursos->where('id', $curso_id)->first()->pivot->docente_id;
            if ($id == $request->docente) {
                return Redirect::to(Session::get('url'));
            } elseif ($request->docente != null) {
                return redirect()->route('curso.libro.update', [$curso_id, $editBook, $request->docente]);
            }
        }
        return Redirect::to(Session::get('url'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id)
    {
        $libro = Book::find($book_id);
        $libro->delete();
        return redirect()->back();
    }
}
