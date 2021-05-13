<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Models\Course_Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('books.createBook', compact('curso_id', 'cursos'));
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
        $newBook = new Book();
        $newBook->titulo = $request->titulo;
        $newBook->descripcion = $request->descripcion;
        $newBook->save();

        if ($curso_id != null) {
            return redirect()->route('curso.libro.save', [$curso_id, $newBook]);
        } elseif ($request->curso == null) {
            return redirect()->route('book.index', $curso_id);
        } else {
            return redirect()->route('curso.libro.save', [$request->curso, $newBook]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
