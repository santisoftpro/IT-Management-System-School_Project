$('.frm_index').submit(function (e) {
    e.preventDefault();

    var a = $(this).serialize() + '&key=branch_login';


    $.ajax({
        type: "POST",
        data: a,
        url: '../class/login/login',
        beforeSend: function () {
            $(this).find('button').attr('disabled', true);
        }
    })
        .done(function (data) {
            console.log(data);
            if (data == 1) {
                toastr.success('Successfully login', 'Redirecting');
                setTimeout(function () {
                    window.location = 'home';
                }, 300);

            } else {
                toastr.error('Username and password Or branches are incorrect');
                $(this).find('button').attr('disabled', true);
                $('.frm_index').find('input').val('');
            }
        });

});