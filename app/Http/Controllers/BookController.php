<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Utils\ImgStoreManager;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with(['author', 'category'])->get();
        return view("books/index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();

        return view("books/create", compact("authors", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $book = new Book($request->validated());
        $image = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imgName = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();

            $imgPath = public_path('img/' . $imgName);

            $manager = new ImageManager(new Driver());
            $imgRes = $manager->read($request->file("image"));
            $imgRes->resize(400, 520);
            $imgRes->save($imgPath);

            $image = "img/" . $imgName;
        } else {
            $image = "img/no-cover.webp";
        }

        $book->image = $image;
        $book->save();

        return redirect()->route("home")
            ->with("success", "Libro aggiunto con successo!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("books/show", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();

        return view("books/edit", compact("authors", "categories", "book"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();
        $image = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imgName = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();

            $imgPath = public_path('img/' . $imgName);

            $manager = new ImageManager(new Driver());
            $imgRes = $manager->read($request->file("image"));
            $imgRes->resize(400, 520);
            $imgRes->save($imgPath);

            $image = "img/" . $imgName;
            ImgStoreManager::deleteImg($book->image);
        } else {
            $image = $book->image;
        }

        $data["image"] = $image;
        $book->update($data);

        return redirect()->route("home")
            ->with("success", "Libro aggiornato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $imgPath = $book->image;
        ImgStoreManager::deleteImg(public_path($imgPath));
        $book->delete();

        return redirect()->route("home")
            ->with("success", "Libro eliminato con successo!");
    }
}
