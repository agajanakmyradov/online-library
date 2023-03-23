<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Filters\BookFilter;
use App\Models\Language;

class CategoryController extends Controller
{
    public function show(Request $request, BookFilter $filter, $id)
    {
        $category = Category::find($request->segment(4));
        $languages = Language::all();
        $books = Book::where('category_id', $request->segment(4))->filter($filter)->get();

        return view('category.show', compact('books', 'category', 'languages'));
    }
}
