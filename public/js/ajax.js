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

$('body').on('focus', '.search', function(){
    $('.search').val('');
});

$('body').on('keyup', '.search', function(){

    var column = $(this).attr('name');
    var token = $('input[name="_token"]').val();
    var value = $(this).val();

    $.ajax({
        type: 'post',
        url: '/collaborator/search',
        data: 'column=' + column + '&value=' + value + '&_token=' + token,
        dataType: 'html',
        success: function (data) {
            $('tbody').html(data);
        }
    });
});

$('body').on('click', '.delete', function(){

    var token = $('input[name="_token"]').val();
    var id = $(this).attr('data-id');

    $.ajax({
        type: 'post',
        url: '/collaborator/' + id,
        data: '_method=delete' + '&_token=' + token,
        dataType: 'json',
        success: function (data) {
            console.log(data);
        }
    });
});