<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Movie Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Title:
            <h5 class="mb-3">{{ $movie->title }}</h5>

            Director:
            <h5 class="mb-3">{{ $movie->director }}</h5>

            Release Year:
            <h5 class="mb-3">{{ $movie->release_year }}</h5>

            Rating:
            <h5 class="mb-3">{{ $movie->rating }}</h5>

            Description:
            <p class="mb-0">{{ $movie->description }}</p>
        </div>
    </div>
</div>
