$(document).ready(function () {
    $('#email').on('keypress blur', function () {
        var email = $('#email').val();
        var _token = $("input[name=_token]").val();
        $.ajax({
            url:'addUserSubmitEmailCheck',
            method:'POST',
            data:{
                email:email, _token:_token
            },
            dataType:'json',
            success:function(result){
                if(result == 1){
                    $('#email_check').html("<p class='text-danger p-1'>"+email+" has already been taken</p>");
                    $('#button').attr('disabled',true);
                }else{
                    $('#email_check').html("<p></p>");
                    $('#button').attr('disabled',false);
                }
            }
        });
    });
});