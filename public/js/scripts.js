function showEdit(element){
    var parent = element.parents('.vocabulary-row');
    var id = element.data('id');
    $.ajax({
        type: 'post',
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: APP_URL + '/ajax/showEdit',
        data: {id:id},
        success: function(data){
            $(parent).html(data);
        }
    })
}