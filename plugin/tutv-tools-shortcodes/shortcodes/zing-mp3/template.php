<div id="zing-mp3">
	<form role="form">
		<div class="form-group zing-input">
			<label for="link-mp3"></label>
			<input type="text" class="form-control" id="link-mp3" autocomplete="on"
			       placeholder="<?php esc_html_e( 'Link mp3.zing.vn', 'tutv' ); ?>">
		</div>
		<div class="form-group zing-action">
			<button type="button" class="btn btn-primary btn-lg"
			        id="btn_get_zing_mp3"><?php esc_html_e( 'Download', 'tutv' ); ?></button>
			<span id="img_loading"><img
					src="<?php echo esc_url( tutv_get_url_file( __FILE__, 'images/load.gif' ) ); ?>"/></span>
			<button type="button" class="btn btn-primary btn-lg"
			        id="btn_reset"><?php esc_html_e( 'Refresh', 'tutv' ); ?></button>
		</div>
	</form>
	<div id="zing_example">
		<h3><?php esc_html_e( 'Example: ', 'tutv' ); ?></h3>
		<ul class="list-url-example">
			<li><?php printf( __( wp_kses( 'Song: <a href="#">%1$s</a>', array( 'a' => array( 'href' => array() ) ) ), 'tutv' ), 'http://mp3.zing.vn/bai-hat/Chieu-Nay-Khong-Co-Mua-Bay-Trung-Quan-Idol/ZW6CED0I.html' ); ?></li>
		</ul>
	</div>
	<div id="zing_result_song">
		<h3 class="title"></h3>

		<div class="artist"><?php esc_html_e( 'Artist: ', 'tutv' ); ?><span></span></div>
		<div class="composer"><?php esc_html_e( 'Composer: ', 'tutv' ); ?><span></span></div>
		<div class="link-download">
			<span><?php esc_html_e( 'Link download: ', 'tutv' ); ?></span>
			<a type="button" class="btn btn-success btn-lg"
			   id="music_128"><?php esc_html_e( '128 kpbs', 'tutv' ); ?></a>
			<a type="button" class="btn btn-success btn-lg"
			   id="music_320"><?php esc_html_e( '320 kpbs', 'tutv' ); ?></a>
		</div>
		<h4><?php esc_html_e( 'Lyrics', 'tutv' ); ?></h4>

		<div class="lyrics"></div>
	</div>
	<div id="zing_result_album">
		<h3 class="title"></h3>

		<div class="artist"><?php esc_html_e( 'Artist: ', 'tutv' ); ?><span></span></div>
	</div>
	<div id="zing_error"></div>
</div>