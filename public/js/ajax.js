$('body').on('click', '.sort', function(){

    var sort_type = $(this).hasClass('asc') ? 'desc' : 'asc';
    var column = $(this).attr('data-column');
    var token = $('input[name="_token"]').val();

    $('.sort').removeClass('asc desc');
    $(this).addClass(sort_type);

    $.ajax({
        type: 'post',
        url: '/collaborator/sort',
        data: 'column=' + column + '&type=' + sort_type + '&_token=' + token,
        dataType: 'html',
        success: function (data) {
            $('tbody').html(data);
        }
    });
});

