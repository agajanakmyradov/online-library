@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
@endpush

@section('content')
    <div class="container">
       @if (count($books) > 0)
            <div class=" d-flex flex-wrap ">
                @foreach ($books as $book)
                    <div class="books p-2 m-1 shadow">
                            <div class="text-center mb-1">
                                <img src="{{  asset('storage/' .$book->image) }}"  alt="d">
                            </div>
                            <div class="text-center ">
                                <a href="{{route('books.show', ['id' => $book->id])}}">{{$book->name}}</a>
                            </div>
                    </div>
                @endforeach
            </div>
       @else
            <div class="text-center fw-bold">
                @lang('messages.my_books_empty')
            </div>
       @endif
    </div>
@endsection
