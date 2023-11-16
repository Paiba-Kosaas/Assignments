$(document).ready(function(){
    $('.btn_process').click(function(e){
        e.preventDefault();

        var row = $(this).parents('tr');

        var id = row.data('id');

        var form = $('#form-update');

        var url = form.attr('action').replace(':TASK_ID', id);

        var data = form.serialize();

        $('#button-'+ id).addClass('disable');

        $.post(url, data, function(result){
            
        })
    })
})