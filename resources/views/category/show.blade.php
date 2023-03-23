@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="p-1">
                <h5>{{ $category['name_' . app()->getLocale()] }}</h5>
            </div>
            <button type="button" class="btn position-relative btn-light border" data-bs-toggle="modal" data-bs-target="#filterModel">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-right" viewBox="0 0 16 16">
                    <path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z"/>
                  </svg>
                Filter
                @if (isset($_GET) and count($_GET) > 0 )
                    @if ($_GET['language_id'] != 0 or $_GET['year_from'] != '' or $_GET['year_to'] != '')
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">alert</span>
                        </span>
                    @endif
                @endif
            </button>

            <!-- Modal -->
            <div class="modal fade" id="filterModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('categories.show', ['id' => $category->id])}}">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Filter</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="max-width: 300px">
                            <div class="mb-2">
                                <label for="lang">@lang('book.lang')</label>
                                <select class="form-control" name="language_id" >
                                    <option value="0">@lang('buttons.all')</option>
                                    @foreach ($languages as $language)
                                        <option value="{{$language->id}}" @if(isset($_GET['language_id']) && $_GET['language_id'] == $language->id) selected @endif>
                                            {{$language['name_' . app()->getLocale()]}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex">
                                <div class="mb-2 me-2">
                                    <label for="lang">@lang('book.year_from')</label>
                                    <input type="text" class="form-control" @if(isset($_GET['year_from'])) value="{{$_GET['year_from']}}" @endif name="year_from">
                                </div>
                                <div class="mb-2 me-2">
                                    <label for="lang">@lang('book.year_to')</label>
                                    <input type="text" class="form-control"@if(isset($_GET['year_to'])) value="{{$_GET['year_to']}}" @endif  name="year_to">
                                </div>
                            </div>
                            <a href="{{route('categories.show', ['id' => $category->id])}}">@lang('messages.cancel_filters')</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('buttons.cancel')</button>
                            <input type="submit" class="btn btn-primary" value="{{__('buttons.save')}}">
                        </div>

                    </form>
                </div>
                </div>
            </div>
        </div>
       @if (count($books) > 0)
            <div class=" d-flex flex-wrap justify-content-center mt-6 ">
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
            <div class="text-center fw-bold m-5">
                @lang('messages.my_books_empty')
            </div>
       @endif
    </div>
@endsection
