$( document ).ready(function() {

    /*Help modal*/

    $("#help-button").on('click', function () {

        $('.out-bg').fadeIn();
        $('.help-modal').fadeIn();


    });


    $(".out-bg").on('click', function () {

        $('.out-bg').fadeOut();
        $('.help-modal').fadeOut();


    });

    /*Animation for menu*/

    $("#logo button").on('click', function () {

        $('.content-locked').fadeIn();
        $('.left-menu').animate({left: 0},500);

    });

    $(".content-locked").on('click', function () {

        $('.content-locked').fadeOut();
        $('.left-menu').animate({left: -200},500);


    });

    $(".left-menu ul li").on('click', function () {
        $('.content-locked').fadeOut();
        $('.left-menu').animate({left: -200},500);
    });

    /*Active item menu*/

    $(".menu ul li").on('click', function () {
        var activeTab = $(this).attr('data-tabs');
        $(".menu ul li").removeClass('active');
        $('[data-tabs=' + activeTab + ']').addClass('active');
        $(this).addClass('active');
        $('.tabs').removeClass('active');
        $('.tabs#' + activeTab).addClass('active');

    });

    /*Modal yes/no*/

    $("button.no").on('click', function () {

        console.log("I don't to want help");
        $('.out-bg').fadeOut();
        $('.help-modal').fadeOut();

    });

    $("a.yes").on('click', function (e) {
        e.preventDefault();
        window.open(this.href, '', 'scrollbars=1')
        $('.out-bg').fadeOut();
        $('.help-modal').fadeOut();

    });

    /*Validating email*/

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(email);
    }

    /*Validation form*/

    $("[name=send]").on('click', function () {
        var contacts =
        {
            email: $("[name=email]").val(),
            message: $("[name=message]").val()
        }




        if (($('[name=email]').val() != '') && ($('[name=message]').val() != '') && (contacts.message.length >= 10) && (validateEmail(contacts.email))) {

            alert(contacts);



        }
        else {
            return false;
        }

    });

});