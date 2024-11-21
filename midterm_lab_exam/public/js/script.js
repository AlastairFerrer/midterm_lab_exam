$(document).ready(function () {

    function getCSRFToken() {
        return $("meta[name='csrf-token']").attr('content');
    }

    function clearFormFields() {
        $('#id').val("");
        $('#title').val("");
        $('#director').val("");
        $('#release_year').val("");
        $('#rating').val("");
        $('#description').val("");
    }

    function updateContent(content) {
        $('#content').html(content);
    }

    function handleModalUpdate(response) {
        $('#modal').html(response);
        $('#modal').modal('show');
    }

    $("#form-search").on('submit', function(e) {
        e.preventDefault();
        
        var _token = getCSRFToken();
        var search = $("#keyword").val();
        
        $.ajax({
            url: '/movies/search',
            method: 'POST',
            data: { _token, search },
            success: function (success) {
                updateContent(success);
            },
            error: function (err) {
                alert(Object.values(err.responseJSON));
            }
        });
    });

    $('.action-more').on('click', function(e) {
        e.preventDefault();
        
        var id = $(this).data('id');
        var _token = getCSRFToken();
        
        $.ajax({
            url: '/movies/get-details',
            data: { id, _token },
            method: 'POST',
            success: handleModalUpdate
        });
    });

    $('.action-edit').on('click', function(e) {
        e.preventDefault();
        
        var id = $(this).data('id');
        var _token = getCSRFToken();
        
        $.ajax({
            url: '/movies/edit',
            data: { id, _token },
            method: 'POST',
            success: handleModalUpdate
        });
    });

    $('#form-update').on('submit', function(e) {
        e.preventDefault();

        var _token = getCSRFToken();
        var id = $('#id').val();
        var title = $('#title').val();
        var director = $('#director').val();
        var release_year = $('#release_year').val();
        var rating = $('#rating').val();
        var description = $('#description').val();

        $.ajax({
            url: '/movies/update',
            data: { _token, id, title, director, release_year, rating, description },
            method: 'POST',
            success: function(success) {
                alert(success.message);
            }
        });

        var search = $("#keyword").val();
        $.ajax({
            url: '/movies/refetch',
            data: { _token, search },
            method: 'POST',
            success: function(success) {   
                clearFormFields();
                updateContent(success);
                $('#modal').modal('close');
            }
        });
    });

    $('.action-delete').on('click', function(e) {
        e.preventDefault();

        var _token = getCSRFToken();
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete?')) {
            $.ajax({
                url: '/movies/delete',
                data: { _token, id },
                method: 'POST',
                success: function(success) {
                    alert(success.message);
                }
            });

            var search = $("#keyword").val();
            $.ajax({
                url: '/movies/refetch',
                data: { _token, search },
                method: 'POST',
                success: function(success) {
                    clearFormFields();
                    updateContent(success);
                }
            });
        }
    });

    $('#action-add').on('click', function(e) {
        e.preventDefault();
        
        var _token = getCSRFToken();
        $.ajax({
            url: '/movie/add',
            data: { _token },
            method: 'POST',
            success: handleModalUpdate
        });
    });

    $('#form-editor').on('submit', function(e) {
        e.preventDefault();

        var _token = getCSRFToken();
        var title = $("#title").val();
        var director = $("#director").val();
        var release_year = $("#release_year").val();
        var rating = $("#rating").val();
        var description = $("#description").val();
        
        $.ajax({
            url: '/movies/create',
            method: 'POST',
            data: { _token, title, director, release_year, rating, description },
            success: function(success) {
                updateContent(success);
            },
            error: function(err) {
                console.log(Object.values(err.responseJSON));
            }
        });

        var search = $("#keyword").val();
        $.ajax({
            url: '/movies/refetch',
            data: { _token, search },
            method: 'POST',
            success: function(success) {   
                clearFormFields();
                updateContent(success);
                $('#modal').modal('close');
            }
        });
    });

});
