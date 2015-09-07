/**
 * Created by Tu on 07/2/2015.
 */

jQuery(document).ready(function ($) {
    var url_zing_dom = $('#link-mp3');
    var result_dom = $('#zing_result');
    var error_dom = $('#zing_error');
    var img_loading = $('#img_loading');
    var example_dom = $('#zing_example');
    var btn_reset_dom = $('#btn_reset');

    example_dom.find('a').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var url = $(this).text();
        url_zing_dom.val(url);
    });

    $('#btn_get_zing_mp3').on('click', function () {
        var url = url_zing_dom.val();

        img_loading.fadeIn();

        btn_reset_dom.hide();
        example_dom.hide();
        result_dom.hide();
        error_dom.hide();
        $.ajax({
            url: ajaxurl,
            method: 'POST',
            data: {action: 'zing-mp3', url: url},
            dataType: 'json',
            success: function (data) {
                img_loading.hide();
                btn_reset_dom.fadeIn();
                console.log(data);
                if (data.status == true) {
                    result_dom.find('.title').text(data.title);
                    result_dom.find('.artist span').text(data.artist);
                    result_dom.find('.composer span').text(data.composer);
                    result_dom.find('#music_128').attr('href', data.music_128);
                    result_dom.find('#music_128').attr('download', data.music_128);
                    result_dom.find('#music_320').attr('href', data.music_320);
                    result_dom.find('#music_320').attr('download', data.music_320);
                    result_dom.find('.lyrics').html(data.lyrics);

                    result_dom.fadeIn();
                } else {
                    error_dom.text(data.msg);
                    error_dom.fadeIn();
                }

            }
        });
    });

    btn_reset_dom.on('click', function () {
        url_zing_dom.val('');

        result_dom.hide();
        error_dom.hide();
        btn_reset_dom.fadeOut();

        example_dom.fadeIn();
    })
});