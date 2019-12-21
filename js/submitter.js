if(!localStorage.getItem("answered_questions")){
	//localStorage.setItem("answered_questions",null);
	
}
//localStorage.removeItem("answered_questions"); 
 

// const LOADER = '<i class="uni-compass-4 fa fa-spin"></i>';
const LOADER = '<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 32 18" width="32" height="18" fill="white">\n' +
    '  <path transform="translate(2)" d="M0 12 V20 H4 V12z"> \n' +
    '    <animate attributeName="d" values="M0 12 V20 H4 V12z; M0 4 V28 H4 V4z; M0 12 V20 H4 V12z; M0 12 V20 H4 V12z" dur="1.2s" repeatCount="indefinite" begin="0" keytimes="0;.2;.5;1" keySplines="0.2 0.2 0.4 0.8;0.2 0.6 0.4 0.8;0.2 0.8 0.4 0.8" calcMode="spline"  />\n' +
    '  </path>\n' +
    '  <path transform="translate(8)" d="M0 12 V20 H4 V12z">\n' +
    '    <animate attributeName="d" values="M0 12 V20 H4 V12z; M0 4 V28 H4 V4z; M0 12 V20 H4 V12z; M0 12 V20 H4 V12z" dur="1.2s" repeatCount="indefinite" begin="0.2" keytimes="0;.2;.5;1" keySplines="0.2 0.2 0.4 0.8;0.2 0.6 0.4 0.8;0.2 0.8 0.4 0.8" calcMode="spline"  />\n' +
    '  </path>\n' +
    '  <path transform="translate(14)" d="M0 12 V20 H4 V12z">\n' +
    '    <animate attributeName="d" values="M0 12 V20 H4 V12z; M0 4 V28 H4 V4z; M0 12 V20 H4 V12z; M0 12 V20 H4 V12z" dur="1.2s" repeatCount="indefinite" begin="0.4" keytimes="0;.2;.5;1" keySplines="0.2 0.2 0.4 0.8;0.2 0.6 0.4 0.8;0.2 0.8 0.4 0.8" calcMode="spline" />\n' +
    '  </path>\n' +
    '  <path transform="translate(20)" d="M0 12 V20 H4 V12z">\n' +
    '    <animate attributeName="d" values="M0 12 V20 H4 V12z; M0 4 V28 H4 V4z; M0 12 V20 H4 V12z; M0 12 V20 H4 V12z" dur="1.2s" repeatCount="indefinite" begin="0.6" keytimes="0;.2;.5;1" keySplines="0.2 0.2 0.4 0.8;0.2 0.6 0.4 0.8;0.2 0.8 0.4 0.8" calcMode="spline" />\n' +
    '  </path>\n' +
    '  <path transform="translate(26)" d="M0 12 V20 H4 V12z">\n' +
    '    <animate attributeName="d" values="M0 12 V20 H4 V12z; M0 4 V28 H4 V4z; M0 12 V20 H4 V12z; M0 12 V20 H4 V12z" dur="1.2s" repeatCount="indefinite" begin="0.8" keytimes="0;.2;.5;1" keySplines="0.2 0.2 0.4 0.8;0.2 0.6 0.4 0.8;0.2 0.8 0.4 0.8" calcMode="spline" />\n' +
    '  </path>\n' +
    '</svg>';
/**
 * Created by BIG M on 11/21/2016.
 */
// All kinds of form submitter
submit_form = function (t, e) {

    var that = $(t);
    var form = that.closest('form');
    var action = form.attr('action');
    var method = form.attr('method');
    var btn_text = $(t).html();
    // var progress = $('.progress');
    // var bar = $(".progress > .progress-bar");

    // $.validator.setDefaults({
    //     debug: true,
    //     success: 'valid',
    // });
    //
    // $(form).validate();
    // var valid = form.valid();
    //
    // if (valid) {
    $(form).one('submit', function (e) {
        e.preventDefault();


        var form_data = new FormData(this);

        $.ajax({
            url: action,
            beforeSend: function () {
                $(t).attr('disabled', 'disabled').html(LOADER);
                $(form).find('.err-msg').remove();
                // progress.show();
                // bar.css("width", "0%");
            },
            type: method,
            data: form_data,
            processData: false,
            contentType: false,
            mimeType: "multipart/form-data",
            xhr: function () {
                //upload Progress
                var xhr = new window.XMLHttpRequest();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function (event) {
                        //console.log(event);
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //update progressbar
                        // bar.css("width", +percent + "%");
                        //$(progress_bar_id + " .status").text(percent +"%");
                    }, true);
                }
                return xhr;
            },
            dataType: 'json',
        })
            .done(function (response) {
                console.log(response);

                var target = (response.target != undefined && response.target != false) ? response.target : false;
                if (response.success) {
                    if (response.msg) jNotify('success', response.msg, true, target);
                } else {
                    if (response.msg) jNotify('error', response.msg, false, target);
                }
                if (response.reset != undefined && response.reset != false) {
                    $(form)[0].reset();
                }
                if (response.redirect != undefined && response.redirect != false) {
                    redirect(response.redirect);
                }
            })
            .fail(function (response) {
                if (response.responseJSON != undefined) {
                    var errors = response.responseJSON.errors;
                    $.each(errors, function (index, msg) {
                        $(form).find('[name=' + index + ']').parent().append('<i class="err-msg">' + msg + '</i>');
                    });
                } else {
                    alert(response.responseText);
                }

            })
            .always(function (response) {
                $(t).removeAttr('disabled').html(btn_text);
                // progress.fadeOut(300);
            });
    });
    // }

};

// OPEN LINK WITH HTML CODE
open_link = function (t, e) {
    e.preventDefault();
    $(t).attr('disabled', 'disabled');

    var href = $(t).attr('href');
    var target = $(t).parents('.row.list');
    var btn_text = $(t).html();

    $(t).attr('disabled', 'disabled').html(LOADER);

    $.ajax({
        url: href,
        type: 'POST',
        dataType: 'json',
    })
        .done(function (response) {
            if (response.success) {
                $('.showed').remove();
                $(target).before(response.content);
                $("html, body").animate({scrollTop: 0}, "fast");
                if (response.msg) {
                    jNotify('error', response.msg);
                }
            }
        })
        .fail(function (response) {
            alert(response.responseText);
        })
        .always(function (response) {
            $(t).removeAttr('disabled').html(btn_text);
            $('select').select2();
            $("[type='checkbox']").bootstrapSwitch();
            // $('.mask').inputmask();
            // $('.date-picker').datepicker({
            //     format: 'yyyy-mm-dd'
            // });
        });
}

/**
 * Costom Notification
 * @param type
 * @param msg
 */
jNotify = function (type, msg, autoclose, target) {
    var heading, class_name, icon = 'uni-information';
    if ($('.alert').length) {
        $('.alert').remove();
    }
    if (type == 'success') {
        heading = 'Success!';
        class_name = 'success';
        icon = 'uni-ok';
    }
    else if (type == 'error') {
        heading = 'Failed!';
        class_name = 'danger';
        icon = 'uni-information';
    }

    var msg = '<div class="alert alert-' + class_name + ' fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="uni-close-window"></i></button><i class="' + icon + '"></i> ' + msg + '</div>';

    if (target == undefined || target == false) {
        target = 'form';
    }
    let headerPos = $(target).offset().top;
    $('html, body').scrollTop(headerPos - 100);

    $(target).prepend(msg);

    $('.alert').animate({
        'opacity': '1',
    }, 200);

    if (autoclose == undefined || autoclose == true) {
        setTimeout(function () {
            $('.alert').animate({
                'opacity': '0',
            }, {
                easing: 'swing',
                duration: 500,
                complete: function () {
                    $('.alert').remove();
                }
            });
        }, 5000);
    }

};

// jNotify('error', 'something went wrong!');

// Close panel code
close_panel = function (t, e) {
    e.preventDefault();

    $(t).parents(".panel").parent().slideUp(300, function () {
        $(this).remove();
    });
};

// Add more row
add_more = function (t) {
    var target = $(t).parents('.add_row'),
        content = $(target).prop('outerHTML');
    $(t).addClass('hidden').siblings('.btn').removeClass('hidden');
    $(target).after(content);
    $(target).next('.add_row').find('.hid_val').remove();
};
// remove added row
remove_item = function (t) {
    var target = $(t).parents('.add_row');

    var amt_cr = Number($(target).find('.c_amount_cr').val());
    var amt_dr = Number($(target).find('.c_amount_dr').val());

    // console.log(amt_dr + '/' + amt_cr);

    if (amt_dr) {
        var sum = Number($('#sum_dr').val()) - amt_dr;
        $('#sum_dr').val(sum);
    } else if (amt_cr) {
        var sum = Number($('#sum_cr').val()) - amt_cr;
        $('#sum_cr').val(sum);
    }

    var sum_dr = Number($('#sum_dr').val());
    var sum_cr = Number($('#sum_cr').val());
    var amount_dr = Number($('#amount_dr').val());
    var diff = amount_dr - (sum_cr - sum_dr);

    $('#difference').val(diff);

    $(target).hide('fast', function () {
        $(this).remove();
    });
};

//
show_month_year = function (t) {
    var val = $(t).val();

    if (val == 'M') {
        $('.monthly').removeClass('hidden');
        $('.yearly').addClass('hidden');
    } else if (val == 'Y') {
        $('.monthly').addClass('hidden');
        $('.yearly').removeClass('hidden');
    }
}

redirect = function ($url) {
    window.location.href = $url;
};



load_question = function (t, e) {
	
	$(form).find('.question-answer').html(response.content);
	
};




next_question = function (t, e) {
    var that = $(t);
    var form = that.closest('form');
    var action = form.attr('action');
    var method = form.attr('method');
    var btn_text = $(t).html();
    var action_name = $(t).attr('name');
	
 
 
 
 /*
if(localStorage.getItem("answered_questions")){
	 
 var answered_questions = [];
}

else{
	
	    
	answered_questions = JSON.parse(localStorage.getItem("answered_questions"));
}
 
 
 
 
answered_questions.push($('.question-answer').find('input[name="id"]').val());


localStorage.setItem("answered_questions",JSON.stringify(answered_questions));
 
console.log(localStorage.getItem("answered_questions"));

 
*/
 

 
if(1)
    $(form).one('submit', function (e) {
        e.preventDefault();

        var form_data = new FormData(this);
        form_data.append('action_name', action_name);
		
		

		
		

        $.ajax({
            url: action,
            beforeSend: function () {
                $(t).attr('disabled', 'disabled').html(LOADER);
                $(form).find('.err-msg').remove();
            },
            type: method,
            data: form_data,
            processData: false,
            contentType: false,
            mimeType: "multipart/form-data",
            dataType: 'json',
        })
            .done(function (response) {
				
				 
				  
				
                if (response.redirect) {
                    redirect(response.redirect);
                }
                if (response.success) {
                    if (response.content) {
                        $(form).find('.question-answer').html(response.content);
                    }
                } else {
					
					
                    if (response.msg) jNotify('error', response.msg, false, form);
					
					else {
						alert('Problem');
						
					}
					
                }
				
				
				
            })
            .fail(function (response) {
                console.log(response.responseText);
            })
            .always(function (response) {
                $(t).removeAttr('disabled').html(btn_text);
                if (response.remaining == 1) {
                    $(t).siblings('button[name=skip]').hide();
                    $(t).html('Submit');
                }
            });
    });
};
