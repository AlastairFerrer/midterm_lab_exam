<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Midterm Laboratory Exam</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
    <body id="app">
        <div class="container pt-4">
            <h4 class="text-center mb-4">Movie Search</h4>
            <div class="row justify-content-center">
                <div class="col-md-3 order-md-1"></div>

                <div class="col-md-3 text-end order-md-3 mb-3">
                    <button class="btn btn-warning" id="action-add">
                        Add Movie
                    </button>
                </div>

                <div class="col-md-6 order-md-2">
                    <form method="post" action="/movies/search" id="form-search">
                        @csrf
                        <div class="input-group">
                            <input class="form-control" type="text" name="keyword" id="keyword" placeholder="Enter movie title or director" required>
                            <button class="btn btn-success">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="pt-4" id="content">
                {{-- search result here --}}
            </div>

            <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
                {{-- modal here --}}
            </div>
        </div>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
