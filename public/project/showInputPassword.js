$(document).ready(function() {
    //Para el password actual
    $("#show_hide_current_new_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_current_new_password input').attr("type") == "text") {
            $('#show_hide_current_new_password input').attr('type', 'password');
            $('#show_hide_current_new_password i').addClass("fa-eye-slash");
            $('#show_hide_current_new_password i').removeClass("fa-eye");
        } else if ($('#show_hide_current_new_password input').attr("type") == "password") {
            $('#show_hide_current_new_password input').attr('type', 'text');
            $('#show_hide_current_new_password i').removeClass("fa-eye-slash");
            $('#show_hide_current_new_password i').addClass("fa-eye");
        }
    });
    //Para el nuevo pass
    $("#show_hide_new_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_new_password input').attr("type") == "text") {
            $('#show_hide_new_password input').attr('type', 'password');
            $('#show_hide_new_password i').addClass("fa-eye-slash");
            $('#show_hide_new_password i').removeClass("fa-eye");
        } else if ($('#show_hide_new_password input').attr("type") == "password") {
            $('#show_hide_new_password input').attr('type', 'text');
            $('#show_hide_new_password i').removeClass("fa-eye-slash");
            $('#show_hide_new_password i').addClass("fa-eye");
        }
    });

    //Para el password confirmar el nuevo pasword
    $("#show_hide_confirm_new_password a").on('click', function(event) {
        event.preventDefault();
        if ($('#show_hide_confirm_new_password input').attr("type") == "text") {
            $('#show_hide_confirm_new_password input').attr('type', 'password');
            $('#show_hide_confirm_new_password i').addClass("fa-eye-slash");
            $('#show_hide_confirm_new_password i').removeClass("fa-eye");
        } else if ($('#show_hide_confirm_new_password input').attr("type") == "password") {
            $('#show_hide_confirm_new_password input').attr('type', 'text');
            $('#show_hide_confirm_new_password i').removeClass("fa-eye-slash");
            $('#show_hide_confirm_new_password i').addClass("fa-eye");
        }
    });
});
