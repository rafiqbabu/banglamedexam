(function ($) {
    'use strict';

    $('.mcq_ques_count').on('change', function () {
        var t = this;
        var total = 0;
        var topic_ids = [];
        var qtys = [];
        var mcq_total_allowed = Number($("[name=mcq_total]").val());

        $('.mcq_ques_count').each(function () {
            var val = Number($(this).val());

            if (val > 0) {
                total += val;
                var topic_id = $(this).data('id');
                topic_ids.push(topic_id);
                qtys.push(val);
            }

            if (total > mcq_total_allowed) {
                alert("You're trying to add MCQ Questions more than allowed.");
                $(t).val(0);
                total -= val;
            }
        });
        $('.total_mcq_count').text(total);
        createQuestionsToSelect(topic_ids, 2, qtys);
    });

    $('.sba_ques_count').on('change', function () {
        var t = this;
        var total = 0;
        var qtys = [];
        var topic_ids = [];
        var sba_total_allowed = Number($("[name=sba_total]").val());

        $('.sba_ques_count').each(function () {
            var val = Number($(this).val());

            if (val > 0) {
                total += val;
                var topic_id = $(this).data('id');
                topic_ids.push(topic_id);
                qtys.push(val);
            }

            if (total > sba_total_allowed) {
                alert("You're trying to add SBA Questions more than allowed.");
                $(t).val(0);
                total -= val;
            }
        });
        $('.total_sba_count').text(total);
        createQuestionsToSelect(topic_ids, 1, qtys);
    });

    $('.jnn-tools').on('click', function (e) {
        $(this).parents('.panel').find('.panel-body').slideToggle(300);
    });

})(jQuery);

function open_next_panel(t, e) {
    e.preventDefault();
    var form = $(t).closest('form');
    var parent = $(t).closest('.panel');
    $(parent).find('.panel-body').slideUp(300);
    $(parent).next('.panel').removeClass('hidden').slideDown(300);
    $('.select2').select2();
}

function createQuestionsToSelect(topic_ids, type, qtys) {
    $.ajax({
        url: site_url_path + "/AjaxController/get_topic_questions",
        type: 'get',
        data: {id: topic_ids, type: type, qtys: qtys},
        dataType: 'html',
        success: function (res) {
            // console.log(res);
            if (type == 1) {
                $('.sba-ques-show tbody').html(res);
            } else if (type == 2) {
                $('.mcq-ques-show tbody').html(res);
            }
            $('.select2').select2();
        },
        error: function (err) {
            console.log(err.responseText);
        }
    });
}

function activeMultiselectSearch() {
    $('.my_multi_select3').multiSelect({
        selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
        afterInit: function (ms) {
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '.' + that.$container.attr('class') + ' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '.' + that.$container.attr('class') + ' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function (e) {
                    if (e.which === 40) {
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function (e) {
                    if (e.which == 40) {
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function () {
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function () {
            this.qs1.cache();
            this.qs2.cache();
        }
    });
}

function selected_question_count(t, e) {
    var limit = Number($(t).data('max'));

    var selected = $(t).find('option:selected').length;

    if (selected > limit) {
        e.preventDefault();
        alert('You cannot add more then ' + limit + ' Questions.');
    }
}

function change_chapter_topics(t) {
    var val = $(t).val();
    $.ajax({
        url: site_url_path + 'AjaxController/get_chapter_topics',
        type: "GET",
        data: {chapter: val},
        success: function (result) {
            $(".topic_id").html(result);
        }
    });
}