$(document).ready(function(){
    $('.btn-process').click(function(e){
        e.preventDefault();

        var row = $(this).parents('tr');

        var id = row.data('id');

        var form = $('#form-update');

        var url = form.attr('action').replace(':TASK_ID', id);

        var data = form.serialize();

        $('#button-'+ id).addClass('disabled');

        $.post(url, data, function(result){

            changeStatus(id, result.processed);

        }).fail(function(){
            $('#button-' + id).removeClass('disabled');
            alert('The task was not finished.')
        });
    });
});

function changeStatus(id, status){

    switch (status) {
        case 1:
            $('#glyphicon-' + id).removeClass('glyphicon-time text-danger').addClass('glyphicon-ok text-success');
            $('#glyphicon-' + id).prop('title', 'Finish');
            showAlert('success');
            break;
        case 0:
            showAlert('warning');
            break;            
    }

    return true;
}

function showAlert(type){

    switch (type) {
        case 'warning':
            $('#message-warning').removeClass('hidden');
            $('#message').addClass('hidden');
            $('#user-message-warning').html('The task was already finished.');
            break;
    
        case 'success':
            $('#message-warning').addClass('hidden');
            $('#message').removeClass('hidden');
            $('#user-message').html('The task has been finish.');
            break;
    }
    
    return true;


}