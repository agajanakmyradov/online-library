@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .slide {
            background-image: url('images/background/cc.png');
            background-size: 100%;
            background-repeat: no-repeat, no-repeat;

        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="slide">
            <div class="slide-background" >
                <h1>@lang('home.head')</h1>
                <div class="slide-wisdom fst-italic " style="max-width: 500px">
                    <div>
                        @lang('home.wisdom')
                        <div class="text-end">@lang('home.author')</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="text-center m-2 fw-bold fs-5">
            @lang('book.latest')
        </div>
        <div class=" d-flex flex-wrap justify-content-center">
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
    </div>

@endsection
