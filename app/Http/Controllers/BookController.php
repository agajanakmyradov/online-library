<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Language;
use App\Actions\Books\ConvertFileSizeAction;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'mybooks', 'show', 'search']);
    }

    public function index()
    {
        return view('book.index');
    }

    public function mybooks()
    {
        return view('book.mybooks');
    }

    public function create()
    {
        $categories = Category::select('id', 'name_' . app()->getLocale())
                                ->whereNotNull('name_' . app()->getLocale())
                                ->get();
        $langs = Language::select('id', 'name_' . app()->getLocale())
                    ->whereNotNull('name_' . app()->getLocale())
                    ->get();

        return view('book.create', compact('categories', 'langs'));
    }

    public function store(BookStoreRequest $request, ConvertFileSizeAction $convert)
    {
        $data = $request->validated();
        $book_name = $data['name'] . time() . '.' . $request->file('book')->getClientOriginalExtension();
        $data['path'] =  $request->file('book')->storeAs('books', $book_name ,'public');

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $image_path = storage_path('app/public/images/books/' . $imageName);
        $img = \Intervention\Image\Facades\Image::make($request->file('image'))->fit(200, 300)->save($image_path);

        $data['image'] = 'images/books/' . $imageName;
        $data['user_id'] = Auth::user()->id;
        $data['format'] = $request->file('book')->getClientOriginalExtension();
        $data['size'] = $convert->handle($request->file('book'));

        Book::create($data);

        return redirect()->route('books.mybooks');

    }

    public function destroy(Request $request, $id)
    {
        $book = Book::find($request->segment(4));
        Storage::delete('/public/' . $book->path);
        Storage::delete('/public/' . $book->image);
        $book->delete();

        return redirect()->route('books.mybooks');
    }

    public function show( Request $request ,$id)
    {
        $book = Book::find($request->segment(4));
        $recommendedBooks = Book::where('category_id', $book->category_id)
                                ->where('language_id', $book->language_id)
                                ->where('id', '!=', $book->id)
                                ->take(12)
                                ->get();

        return view('book.show', compact('book', 'recommendedBooks'));
    }

    public function search(Request $request)
    {
        $request->validate(['search' => 'required']);
        $books  = Book::where('name', 'like', '%' . $request->input('search') . '%')
                        ->orWhere('author', 'like', '%' . $request->input('search') . '%')
                        ->get();
        return view('book.search_result', compact('books'));
    }
}
