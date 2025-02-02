<?php

// timezoneの設定
	date_default_timezone_set('Asia/Tokyo');
// set variables
	// サイトの表示を制御する変数の設定
	// 
	// 応募者に更新を許す場合は、true を設定する。更新させない場合は、false を設定する。
	// show_*_status.php に影響する。
	$_lod_allowupdate = false;  // LOD site do not allow to update

	// デバッグのための表示を行う
	// デバッグのための表示を行う場合には、true を設定する。
	$_is_debug = false;

	// アイコンのための設定
	// 一覧表示の場合
	define("ICON_WIDTH", "30");
	define("ICON_HEIGHT", "30");
	// 個別表示の場合
	define("L_ICON_WIDTH", "60");
	define("L_ICON_HEIGHT", "60");
	// アップロード・最大ファイルサイズ MAX_FILE_SIZE 30MB
	define("MAX_ICON_FILE_SIZE" , "30000000");

	// デフォルトのアイコンファイル 
//	define("DEFAULT_ICON", "/image/lod_challeng_log.png");
	define("DEFAULT_ICON", "/image/blank_icon30x30.gif");
	// 
	function get_file_extension($path_name) {
	// 拡張子を取り出す
		$path_parts = pathinfo($path_name);
		return $path_parts['extension'];
	}
	function get_file_basename($path_name) {
	// 拡張子を含めたファイル名を取り出す
		$path_parts = pathinfo($path_name);
		return $path_parts['basename'];
	}
?>
