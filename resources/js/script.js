//todo:jquery
document.addEventListener('DOMContentLoaded', function () {

    var show = 'show';

    $('.inputClass').each(function (index) {
        let label = $(this).next('label');
        if ($(this).val() != '') {
            label.addClass(show);
        }
    });
    $('.inputClass').change(function () {
        let label = $(this).next('label');
        if ($(this).val() != '') {
            label.addClass(show);
        }

    });


    $('.inputClass').on('checkval', function () {
        let label = $(this).next('label');


        if (this.value !== '') {
            label.addClass(show);
        } else {
            label.removeClass(show);
        }


    }).on('keyup', function () {
        $(this).trigger('checkval');
    });


    /* добавление inputs */

    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3 text_input">';
        html += '<input type="text" name="judge[]" class="form-control m-input inputClass " placeholder="Judge" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger button_red">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });

    $('.js-chosen').chosen({
        width: '100%',
        no_results_text: 'Совпадений не найдено',
        placeholder_text_single: ''
    });


});


$('body').on('input', '.sport input.inputClass', function () {
    let plusPoint;
    let Zero = ".";
    let V;
    V = this.value;
    this.value = this.value.replace(/[^0-9\.]/g, '');


    if (V.length == 1) {

        console.log('lenght == 1 - ' + V);

    }

    if (V.length == 2) {

        console.log(V[0] + Zero + V[1]);
        if (V[1] == Zero) {

        } else {
            $(this).val(V[0] + Zero + V[1]);
        }
    }


    if (V.length > 3) {
        this.value = this.value.substr(0, 3);
    }
});


$('body').on('click', '.iwwf__left .iwwf_events .before', function () {

    $(this).parents('.iwwf__left').toggleClass('active');

//alert('s');
});

$('.block__headerMobile').html('<div class="top_box"><div class="top_box__menu">' + $('.top_menu').html() + '</div></div>');




