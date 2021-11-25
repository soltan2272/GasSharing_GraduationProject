$(document).ready(function () {

    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $("#alert").fadeTo(2000, 500).slideUp(300, function () {
        $("#alert").slideUp(500);
    });

   

});
function resetNewPostForms(){
    $('#form').trigger('reset');
    $('.option select').removeAttr('name');
    $('.option select').removeAttr('required');
}