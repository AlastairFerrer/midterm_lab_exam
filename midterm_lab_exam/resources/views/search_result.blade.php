
@if ($movies->isEmpty())
    <h5 class="text-center">No Movies Found</h5>
@else
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>Title</th>
                    <th>Director</th>
                    <th>Release Year</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->director }}</td>
                        <td class="text-center">{{ $movie->release_year }}</td>
                        <td class="text-center">{{ $movie->rating }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-secondary action-more" data-id='{{ $movie->id }}'>More</button>
                            <button class="btn btn-sm btn-primary action-edit" data-id="{{ $movie->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger action-delete" data-id="{{ $movie->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

