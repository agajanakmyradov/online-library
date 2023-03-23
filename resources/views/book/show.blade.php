@extends('layouts.app')

@push('styles')
    <style>
        .books {
            width: 130px;
        }

        .books img {
            width: 120px
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="book d-flex px-2 justify-content-center  flex-wrap mb-5">
            <div class="mb-2">
                <img src="{{asset('storage/' . $book->image)}}" alt="">
            </div>
            <div class="ms-2" style="max-width: 800px">
                <h5>{{$book->name}}</h5>
                <p >
                    {{$book->description}}
                </p>
                <div class="d-flex flex-wrap justify-content-between" style="max-width: 400px">
                    <div class="ms-2">
                        <div>
                            <span class="fw-bold">@lang('book.author'): </span>
                            {{$book->author}}
                        </div>
                        <div>
                            <span class="fw-bold">@lang('book.lang'): </span>
                            {{$book->language['name_' . app()->getLocale()]}}
                        </div>
                    </div>
                    <div class="ms-2">
                        <div>
                            <span class="fw-bold">@lang('book.format'): </span>
                            {{$book->format}}
                        </div>
                        <div>
                            <span class="fw-bold">@lang('book.size'): </span>
                            {{$book->size}}
                        </div>
                    </div>
                </div>
                <a href="{{ asset('storage/' . $book->path) }}" class="btn btn-secondary m-3" download>@lang('buttons.download')</a>
            </div>
        </div>

        @if (count($recommendedBooks) > 0)
            <div>
                <div class="fw-bold mt-4 mb-1">@lang('messages.recommended')</div>
                <div class="d-flex flex-wrap ">
                    @foreach ($recommendedBooks as $book)
                        <div class="books p-1 m-1 shadow" >
                                <div class="text-center mb-1">
                                    <img src="{{  asset('storage/' .$book->image) }}"  alt="d">
                                </div>
                                <div class="text-center">
                                    <a href="{{route('books.show', ['id' => $book->id])}}">{{$book->name}}</a>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
       @endif
    </div>
 @endsection
