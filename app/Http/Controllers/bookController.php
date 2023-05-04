<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('welcome',['books'=>$books]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book;

        $book->Name = $request->Name;
        $book->Description = $request->Description;
        
       
        if($request->hasFile('Image') && $request->file('Image')->isValid()){
            $requestImage = $request->Image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')) . ".".$extension;
            $requestImage->move(public_path('img/books'),$imageName);
            $book->Image = $imageName;
        }
        
        $book->save();
        return redirect()->route('book.index')->with('msg','Livro adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('show',['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);

        return view('edit',['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        //NORMALMENTE USO O MÉTODO 'Book::findOrFail($request->id)->update($request->all());' MAS TIVE UM PROBLEMA COM AS IMAGENS
        $book = Book::findOrFail($id);

        $book->Name = $request->Name;
        $book->Description = $request->Description;
        
        if($request->hasFile('Image') && $request->file('Image')->isValid()){
            $requestImage = $request->Image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')) . ".".$extension;
            $requestImage->move(public_path('img/books'),$imageName);
            $book->Image = $imageName;
        }

        $book->save();

        return redirect()->route('book.index')->with('msg','Livro Editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->route('book.index')->with('msg','Livro Excluido com sucesso!');

    }
}
