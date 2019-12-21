(function ($) {
    'use strict';

    // prevent copy
    $('html, body').keydown(function (e) {
        var key = e.keyCode;
        // console.log(key, $.inArray(key, [83, 85]));
        if ((e.ctrlKey && e.shiftKey && key === 73) || (e.ctrlKey && $.inArray(key, [83, 85, 65, 80]) !== -1) || key === 123) {
            e.preventDefault();
        }
    });
    // $('html, body').on("contextmenu", function () {
    // 	return false;
    // });

    //number only input
    $(".number-only").keydown(function (e) {
        // Allow: backspace, devare, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: user, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // var it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $("#agreement").change(function () {
        if (this.checked) {
            $(this).closest('form').find('[type=submit]').removeAttr('disabled');
        } else {
            $(this).closest('form').find('[type=submit]').attr('disabled', 'disabled');
        }
    });

    $(".exam-enable").change(function () {
        var id = $(this).attr('id');

        if (this.checked) {
            $(this).closest('tr').children('td').addClass('t-green');
            $(this).closest('tr').find('.form-control').removeAttr('disabled');
        } else {
            $(this).closest('tr').children('td').removeClass('t-green');
            $(this).closest('tr').find('.form-control').attr('disabled', 'disabled');
        }
    });

    $('.package-enable').on('change', function () {
        var target = $(this).parents('tr');
        var bdt = Number($(target).find('.package-bdt').text());
        var usd = Number($(target).find('.package-usd').text());
        var total_bdt = Number($('.package-total-bdt > span').text());
        var total_usd = Number($('.package-total-usd > span').text());
        if (this.checked) {
            $(this).closest('tr').children('td').addClass('t-green');
            total_bdt += bdt;
            total_usd += usd;
        } else {
            $(this).closest('tr').children('td').removeClass('t-green');
            total_bdt -= bdt;
            total_usd -= usd;
        }
        $('.package-total-bdt > span').text(total_bdt.toFixed(2));
        $('.package-total-usd > span').text(total_usd.toFixed(2));
        $('.package-cost-bdt > span').text(total_bdt.toFixed(2));
        $('.package-cost-usd > span').text(total_usd.toFixed(2));
    });

    $("#coupon-code").on('focusout', function () {
        var T = $(this);
        var value = T.val();
        var url = T.data('url');
        T.siblings('i').remove();

        if (value) {

            T.attr('disabled', 'disabled');

            $.ajax({
                url: url,
                type: 'POST',
                data: {code: value},
                dataType: "JSON",
                success: function (response) {
                    var bdt = Number($('.total-bdt span').text());
                    var usd = Number($('.total-usd span').text());
                    var discount = Number(response.discount);

                    var dis_bdt = (bdt * discount) / 100;
                    var dis_usd = (usd * discount) / 100;
                    var cost_bdt = bdt - dis_bdt;
                    var cost_usd = usd - dis_usd;

                    $('.dis-bdt > span').text(dis_bdt.toFixed(2));
                    $('.dis-usd > span').text(dis_usd.toFixed(2));
                    $('.cost-bdt > span').text(cost_bdt.toFixed(2));
                    $('.cost-usd > span').text(cost_usd.toFixed(2));
                },
                error: function (err) {
                    T.after(err.responseText);
                }
            }).always(function (res) {
                T.removeAttr('disabled');
            });
        }
    });

    $("#package-coupon-code").on('focusout', function () {
        var T = $(this);
        var value = T.val();
        var url = T.data('url');
        T.siblings('i').remove();
        if (value) {

            T.attr('disabled', 'disabled');

            $.ajax({
                url: url,
                type: 'POST',
                data: {code: value},
                dataType: "JSON",
                success: function (response) {
                    var bdt = Number($('.package-total-bdt span').text());
                    var usd = Number($('.package-total-usd span').text());
                    var discount = Number(response.discount);

                    var dis_bdt = (bdt * discount) / 100;
                    var dis_usd = (usd * discount) / 100;
                    var cost_bdt = bdt - dis_bdt;
                    var cost_usd = usd - dis_usd;

                    $('.package-dis-bdt > span').text(dis_bdt.toFixed(2));
                    $('.package-dis-usd > span').text(dis_usd.toFixed(2));
                    $('.package-cost-bdt > span').text(cost_bdt.toFixed(2));
                    $('.package-cost-usd > span').text(cost_usd.toFixed(2));
                },
                error: function (err) {
                    T.after(err.responseText);
                }
            }).always(function (res) {
                T.removeAttr('disabled');
            });
        }
    });

    // Currency Change
    $("#currency").on('change', function () {
        var that = this;
        var currency = $(that).val();
        var purchase_id = $(that).data('id');
        $(that).attr('disabled', 'disabled');

        $.ajax({
            url: BASE_URL + "/AjaxController/get_purchase_details",
            type: 'get',
            data: {currency: currency, purchase_id: purchase_id},
            dataType: 'json',
            success: function (res) {
                $('.payable').find('.input-group-addon').text(res.symbol);
                $('.payable').find('.amount').val(res.cost);
            }
        }).always(function (res) {
            $(that).removeAttr('disabled');
        });


    });


    // Timer plugin for exam
    $.fn.jTimer = function (options) {
        var op = $.extend({time: 10}, options);
        var min = new Date().getMinutes();
        var countDownTime = new Date().setMinutes(min + op.time);
        var target = this;

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownTime - now;

            var hours = new Date(distance).getHours();
            var minutes = new Date(distance).getMinutes();
            var seconds = new Date(distance).getSeconds();

            if (hours > 6) {

                hours = hours - 6;

                minutes = minutes + (hours * 60);
            } else {
                minutes = ("0" + minutes).slice(-2);
            }

            // add leading 0
            seconds = ("0" + seconds).slice(-2);

            // Display the result in the element with id="demo"
            var time = minutes.toString() + ":" + seconds.toString();
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                time = "00:00";
            }
            if (minutes < 2 && seconds <= 59) {
                target.css('color', 'red');
            }
            // console.log(time);
            target.text(time);
            target.siblings('input[name=timer]').val(time);

            if (minutes == 0 && seconds == 0) {
                swal({
                    title: 'Time Up!',
                    text: 'Your Answer will be submitted autometically',
                    type: 'info',
                    timer: 5000,
                    onOpen: function () {
                        swal.showLoading()
                    },
                }).then(function (result) {
                    target.closest('form').find('[type=submit][name=next]').click();
                });
            }
        }, 1000);
    };


})(jQuery);

AjaxChange = function (that, url, target) {
    var val = $(that).val();
    $(that).attr('disabled', 'disabled');

    $.ajax({
        url: url,
        type: 'get',
        data: {id: val},
        success: function (response) {
            $(that).closest('tr').find(target).html(response);
        },
        error: function (err) {
            // console.log(err.responseText);
        }
    }).always(function (res) {
        $(that).removeAttr('disabled');
    });
};

CalculateExamCost = function (that) {
    var val = $(that).val();
    var parent = $(that).closest('tr');
    var bdt = Number($(parent).find('.bdt > span').text());
    var usd = Number($(parent).find('.usd > span').text());
    var rt_bdt = bdt * val;
    var rt_usd = usd * val;
    $(parent).find('.rt-bdt > span').text(rt_bdt.toFixed(2));
    $(parent).find('.rt-usd > span').text(rt_usd.toFixed(2));

    // count all exam
    var exam_count = 0;
    $('.exam-select').each(function () {
        exam_count += Number($(this).val());
    });
    $('.total-exam').text(exam_count);

    // calculate total
    var total_bdt = 0;
    var total_usd = 0;

    $('.rt-bdt').each(function () {
        total_bdt += Number($(this).children('span').text());
    });
    $('.rt-usd').each(function () {
        total_usd += Number($(this).children('span').text());
    });
    $('.total-bdt > span, .cost-bdt > span').text(total_bdt.toFixed(2));
    $('.total-usd > span, .cost-usd > span').text(total_usd.toFixed(2));
};
