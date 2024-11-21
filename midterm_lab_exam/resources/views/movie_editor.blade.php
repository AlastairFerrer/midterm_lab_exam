
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Movie Editor</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($movie)
                <h5 class="mb-4">Edit Movie: {{ $movie->title }}</h5>
                <form method="post" action="/movies/update" id="form-update">
                    @csrf
                    <input type="hidden" name="id" id='id' value="{{ $movie->id }}">
                    <div class="form-group mb-3">
                        Title
                        <input class="form-control" type="text" name="title" id='title' value="{{ $movie->title }}" required>
                    </div>
                    <div class="form-group mb-3">
                        Director
                        <input class="form-control" type="text" name="director" id='director' value="{{ $movie->director }}" required>
                    </div>
                    <div class="form-group mb-3">
                        Release Year
                        <input class="form-control" type="number" name="release_year" id='release_year' minlength="4" maxlength="4" value="{{ $movie->release_year }}" required>
                    </div>
                    <div class="form-group mb-3">
                        Rating
                        <input class="form-control" type="number" name="rating" id='rating' min="0" max="10" step="0.1" value="{{ $movie->rating }}" required>
                    </div>
                    <div class="form-group mb-3">
                        Description
                        <textarea class="form-control" name="description" id='description' rows="5">{{ $movie->description }}</textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            @else
                <h5 class="mb-4">Add New Movie</h5>
                <form method="post" action="/movies/create" id="form-editor">
                    @csrf
                    <div class="form-group mb-3">
                        Title
                        <input class="form-control" type="text" name="title" id='title' required>
                    </div>
                    <div class="form-group mb-3">
                        Director
                        <input class="form-control" type="text" name="director" id='director' required>
                    </div>
                    <div class="form-group mb-3">
                        Release Year
                        <input class="form-control" type="number" name="release_year" id='release_year' minlength="4" maxlength="4" required>
                    </div>
                    <div class="form-group mb-3">
                        Rating
                        <input class="form-control" type="number" name="rating" id='rating' min="0" max="10" step="0.1" required>
                    </div>
                    <div class="form-group mb-3">
                        Description
                        <textarea class="form-control" name="description" id='description' rows="5"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>