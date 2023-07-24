<?php

namespace App\Http\Controllers;

use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::all();

        if ($request->category) {
            $books = Book::with('category', 'user')->whereHas('category', function ($query) use ($request){
                $query->where('name', $request->category);
            })->get();
        }else{
            $books = Book::with('category', 'user')->get();
        }

        return view('book.index', compact('books', 'category'));
    }

    public function create()
    {
        $category = Category::all();
        return view('book.create', compact('category'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'category' => 'required',
            'description' => 'required|string|min:10',
            'amount' => 'required|integer',
            'book' => 'required|file|mimes:pdf',
            'cover' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $covername = time().'.'.$request->cover->extension();

        // upload file gambar ke folder book
        Storage::putFileAs('public/book/cover', $request->file('cover'), $covername);

        //  ubah nama file buku
        $bookname = time().'.'.$request->book->extension();

        // upload file buku ke folder book
        Storage::putFileAs('public/book/file', $request->file('book'), $bookname);

        //masukkan data ke database
        $books = Book::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'amount' => $request->amount,
            'book' => $bookname,
            'cover' => $covername,
            'created_by' => $request->user,
        ]);

        return redirect()->route('book.index');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $category = Category::all();
        return view('book.edit', compact('category', 'book'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'category' => 'required',
            'description' => 'required|string|min:10',
            'amount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile('cover') && $request->hasFile('book')) {
            // ambil nama file gambar lama dari database
            $cover_lama = Book::find($id)->cover;
            $book_lama = Book::find($id)->book;

            //hapus file gambar lama
            Storage::delete('public/book/cover/'.$cover_lama);
            Storage::delete('public/book/file/'.$book_lama);

            // ubah nama file gambar dengan angka random
            $covername = time().'.'.$request->cover->extension();
            $bookname = time().'.'.$request->book->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/book/cover', $request->file('cover'), $covername);
            Storage::putFileAs('public/book/file', $request->file('book'), $bookname);

            Book::where('id', $id)->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'description' => $request->description,
                'amount' => $request->amount,
                'book' => $bookname,
                'cover' => $covername,
            ]);

        }elseif($request->hasFile('cover')){
            // ambil nama file gambar lama dari database
            $cover_lama = Book::find($id)->cover;

            //hapus file gambar lama
            Storage::delete('public/book/cover/'.$cover_lama);

            // ubah nama file gambar dengan angka random
            $covername = time().'.'.$request->cover->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/book/cover', $request->file('cover'), $covername);

            Book::where('id', $id)->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'description' => $request->description,
                'amount' => $request->amount,
                'cover' => $covername,
            ]);

        }elseif($request->hasFile('book')){
            // ambil nama file gambar lama dari database
            $book_lama = Book::find($id)->book;

            //hapus file gambar lama
            Storage::delete('public/book/file/'.$book_lama);

            // ubah nama file gambar dengan angka random
            $bookname = time().'.'.$request->book->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/book/file', $request->file('book'), $bookname);

            Book::where('id', $id)->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'description' => $request->description,
                'amount' => $request->amount,
                'book' => $bookname,
            ]);

        }else{
            Book::where('id', $id)->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'description' => $request->description,
                'amount' => $request->amount,
            ]);
        };
        return redirect()->route('book.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        Storage::delete('public/book/cover/'.$book->cover);
        Storage::delete('public/book/file/'.$book->book);

        Book::where('id', $id)->delete();
        return redirect()->route('book.index');
    }

    public function download($id)
    {
        $file = Book::find($id)->book;
        $path = public_path('storage/book/file/'.$file);
        return response()->download($path);
    }

    public function show($id)
    {
        $book = Book::where('id', $id)->with('category')->first();

        $related = Book::where('created_by', $book->user->id)->inRandomOrder()->limit(4)->get();

        if ($book) {
            return view('book.show', compact('book', 'related'));
        } else {
            abort(404);
        }

    }

    public function export()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }
}
