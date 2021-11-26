$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('form[name="login"]').submit(function(event){
        //Evitar a actualização da pagina
        event.preventDefault();

        const form = $(this);
        const action = form.attr('action');
        const email = form.find('input[name="email"]').val();
        const password = form.find('input[name="password_check"]').val();

        //
        $.post(action, {email: email, password: password}, function(response){
            // console.log(response);
            if(response.message){
                alert('Mensagem de erro' + response.message);
            }
        },'json')
    })
});
