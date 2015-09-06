/**
 * Created by Tu on 07/2/2015.
 */

jQuery(document).ready(function ($) {
    $('#btn_get_zing_mp3').on('click', function () {
        var url = $('#link-mp3').val();
        var result_dom = $('#zing_result');
        var error_dom = $('#zing_error');

        result_dom.hide();
        error_dom.hide();
        $.ajax({
            url: ajaxurl,
            method: 'POST',
            data: {action: 'zing-mp3', url: url},
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if (data.validate == true) {
                    if (data.status == true) {
                        result_dom.find('.title').text(data.title);
                        result_dom.find('.artist span').text(data.artist);
                        result_dom.find('.composer span').text(data.composer);
                        result_dom.find('#music_128').attr('href', data.music_128);
                        result_dom.find('#music_128').attr('download', data.music_128);
                        result_dom.find('#music_320').attr('href', data.music_320);
                        result_dom.find('#music_320').attr('download', data.music_320);

                        result_dom.fadeIn();
                    }
                } else {
                    error_dom.find('.not-valid-url').fadeIn();
                    error_dom.fadeIn();
                }

            }
        });
    });
});