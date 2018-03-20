$(document).ready(function () {

    $('#comment-form').on('submit', function(event) {

        event.preventDefault();

        var formData = $(this).serialize();

        console.log(formData);

        $.ajax({
            url: '/comments/store',
            method: 'POST',
            data: formData,
            success: function (response) {
                console.log(response.status);
                $('#comment-form')[0].reset();
            }
        });
    });

    // $('.comment-form').on('submit', function (e) {
    //     e.preventDefault();
    //     var form = $(this);
    //     var data = form.serialize();
    //
    //     $.ajax({
    //         url: form.attr('action'),
    //         method: 'GET',
    //         data: data,
    //         success: function (response) {
    //             var new_blog = $(response).find('.comments').html();
    //             $('.comments').html(new_blog);
    //
    //         }
    //     })
    // })



    $('#search-news').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize();

        $.ajax({
            url: form.attr('action'),
            method: 'GET',
            data: data,
            success: function (response) {
               var new_blog = $(response).find('.column-three-qtr').html();
               $('.column-three-qtr').html(new_blog);

            }
        })
    })




});