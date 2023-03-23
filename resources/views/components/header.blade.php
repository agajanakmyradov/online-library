

<div class="container" >
    <nav class="navbar bg-dark navbar-expand-lg  bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid" >
          <a class="navbar-brand link-light" href="{{route('home')}}">{{config('app.name')}}</a>
          <button  class="navbar-toggler border-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link link-light" aria-current="page" href="{{route('home')}}">@lang('menu.home')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link link-light" href="{{route('books.mybooks')}}">@lang('menu.my_books')</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link link-light dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  @lang('menu.categories')
                </a>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{route('categories.show', ['id' => $category->id])}}">{{$category['name_' . app()->getLocale()]}}</a></li>
                    @endforeach
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>



        <div class="d-flex align-items-center justify-content-between my-1">
            <div >
                @foreach (config('app.available_locales') as $locale)
                    <a
                        class="text-decoration-none p-0 "
                        href="{{changeLocaleInRoute(Route::current(), $locale)}}"
                        @if(app()->getLocale() == $locale) style="border-bottom: 3px  solid red" @endif
                    >
                        <img src="{{asset('images/' . $locale . '.png')}}" style="width: 21px">

                    </a>
                @endforeach
            </div>

            <div class="d-flex">
                @guest
                    <a class="btn " href="{{ route('login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>

                    </a>
                @else
                    <form  action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button class="btn ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                        </button>
                    </form>
                @endguest

                <button type="button" class="btn px-0" data-bs-toggle="modal" data-bs-target="#searchModel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </div>


            <!-- Search Modal -->
        <div class="modal fade" id="searchModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('books.search')}}" >
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('messages.search_book')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" style="max-width: 300px" placeholder="search" name="search">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">@lang('buttons.cancel')</button>
                    <input type="submit" class="btn btn-primary" value="{{__('buttons.search')}}">
                    </div>
                </form>
            </div>
            </div>
        </div>


</div>

