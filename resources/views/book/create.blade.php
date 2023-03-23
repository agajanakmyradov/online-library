@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/bookCreateStyles.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center px-4">
            <div class="form-block p-3 shadow rounded" >
                <h3 class="text-center">Kitap goş</h3>
                <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex flex-wrap">
                        <div class="inputs me-2" >
                            <div class="mb-3">
                                <label for="image">@lang('book.file') (pdf, docx, epub)</label>
                                <input type="file"
                                    name="book"
                                    class="form-control"
                                />
                                <div>@error('book') {{$message}} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label for="image">@lang('book.image')</label>
                                <input type="file" name="image" class="form-control">
                                <div>@error('image') {{$message}} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label for="name">@lang('book.name')</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    @if (old('name'))
                                        value="{{old('name')}}"
                                    @endif
                                />
                                <div>@error('name') {{$message}} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label for="author">@lang('book.author')</label>
                                <input
                                    type="text"
                                    name="author"
                                    class="form-control"
                                    @if (old('author'))
                                        value="{{old('author')}}"
                                    @endif
                                />
                                <div>@error('author') {{$message}} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label for="lang">@lang('book.lang')</label>
                                <select name="language_id" class="form-control">
                                    @foreach ($langs as $lang)
                                        <option value="{{$lang->id}}" @if(old('language_id') == $lang->id) selected @endif>{{$lang['name_' . app()->getLocale()]}}</option>
                                    @endforeach
                                </select>
                                <div>@error('language_id') {{$message}} @enderror</div>
                            </div>
                        </div>

                        <div class="flex-fill">
                            <div class="mb-3">
                                <label for="year">@lang('book.year')</label>
                                <input
                                    type="text"
                                    name="year"
                                    class="form-control year"
                                    @if (old('year'))
                                        value="{{old('year')}}"
                                    @endif
                                />
                                <div>@error('year') {{$message}} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label for="year">@lang('book.category')</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{ $category['name_' . app()->getLocale()] }}</option>
                                    @endforeach
                                </select>
                                <div>@error('category_id') {{$message}} @enderror</div>
                            </div>
                            <div class="mb-2">
                                <label for="description">@lang('book.description')</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="7">@if(old('description')) {{old('description')}} @endif</textarea>
                                <div>@error('description') {{$message}} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center justify-content-center">
                        <input type="submit" class="btn btn-success" value="{{__('buttons.save')}}">
                        <a href="{{route('books.mybooks')}}" class="btn btn-danger">@lang('buttons.cancel')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
