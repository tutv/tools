<?php
/**
 * Created by PhpStorm.
 * User: Tu TV
 * Date: 05/9/2015
 * Time: 2:06 AM
 */

/**
 * Add short code Zing Mp3
 *
 */
function tutv_zing_mp3_short_code() {
	$html = '<form role="form">
                <div class="form-group">
                    <label>' . esc_html__('Link mp3.zing.vn:', 'tutv') . '<button type="button" class="btn btn-success btn-xs">Link demo</button></label>
                    <input type="text" class="form-control" id="link-mp3">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-lg" onclick="getLink();">Download</button>
                    <span id="load" style="margin-left: 15px; display: none"><img src="img/load.gif" /></span>
                    <button type="button" class="btn btn-success btn-lg" onclick="resetX()" style="display: none" id="reset">Reset</button>
                </div>
            </form>';

	return $html;
}

add_shortcode( 'zing-mp3', 'tutv_zing_mp3_short_code' );