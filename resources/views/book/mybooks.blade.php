@extends('layouts.app')

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="container">
        @guest
            <div class="text-center">
               <div class="fw-bold mb-2">@lang('messages.on_my_books')</div>
               <a href="{{route('login')}}" class="btn btn-secondary">@lang('buttons.login')</a>
            </div>
        @else
            <div>
                <a href="{{route('books.create')}}" class="btn btn-secondary mb-2">@lang('buttons.add')</a>
            </div>
            @if (count(Auth::user()->books) > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="books" class=" table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>@lang('book_create.name')</th>
                                            <th>@lang('book_create.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->books as $book)
                                            <tr>
                                                <td>{{$book->name}}</td>
                                                <td>
                                                    <button type="button" class="btn deleteBookBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-book_name="{{$book->name}}" value="{{route('books.destroy', ['id' => $book->id])}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center p-3 ">
                    <h4>@lang('messages.my_books_empty')</h4>
                </div>
            @endif

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title fs-5" id="exampleModalLabel">Remove book</h4>
                      <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>
                      </button>
                    </div>
                    <div class="modal-body">
                     @lang('messages.remove_alarm')  "<span id="bookName"></span> "?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('buttons.cancel')</button>
                      <a  class="btn btn-danger" id="confirmDelete"> @lang('buttons.remove')</a>
                    </div>
                  </div>
                </div>
              </div>
        @endguest

    </div>
@endsection

@push('scripts')
   <!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>



    <script>
        $(function () {
            $('#books').DataTable({
                "paging": false,
                "lengthChange": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": false,
                "lengthMenu": [50, 100, 150],
             });
         })

         $(document).ready(function() {
            $('.deleteBookBtn').click(function(e) {
                e.preventDefault();
                var url = $(this).val();
                var book_name = $(this).data('book_name');
                var locale = $(this).data('locale');
                $('#confirmDelete').attr('href', url);
                $('#bookName').text(book_name)
                $('#deleteModal').modal('show');
            })
         })

    </script>
@endpush
