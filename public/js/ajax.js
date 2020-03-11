$(document).ready(function () {
    $('.quiz__main-form').on('submit', function (event) {
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let type = form.attr('method');
        let data = form.serialize();
        $.ajax({
            url: url,
            method: type,
            data: data,
            success: function (data) {
                console.log(data);
                if (data === 'ok') {
                    $('.quiz').addClass('quiz--open-thank');
                    $('.thank-you').removeClass('thank-you--hidden');
                }
            }
        });
    })
});