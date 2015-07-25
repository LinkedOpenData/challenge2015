<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', '_koujikoz_9d3jzz');

/** MySQL データベースのユーザー名 */
define('DB_USER', '_koujikoz_9d3jzz');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', '9g8xtrrp9tvz');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql505.heteml.jp');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Gr.hRFhulRu?I9%v4k?l$^4|U?|td}c$,okb/IMz3{+C`/=?xG51ez??+Q$mtfp3');
define('SECURE_AUTH_KEY',  'JQUX29Mw{W>WjGqXqlOLahek>hM!D[5qmPEfQuRrHjE,,:h0z<CQy9@(ih*&2$wf');
define('LOGGED_IN_KEY',    'T@A%&vwMV@XfE_W_L2p~39GchPiaSV`(pa,vM6|!<yhV/_tY=Z2-Z}o|rM2A!=Gr');
define('NONCE_KEY',        'sRc_O4{ft8@6]%VKeNV^p~VXqN1sf}ZNt]m}<#79!>6_]Ri19_:oYkCF=^=xWqBG');
define('AUTH_SALT',        '$)i?,f?-y<F,h*!gD<L51rA+&R6b}|!CFkWPGpb_6!Fd+HAMYqIPYnYe`V`Yw|4]');
define('SECURE_AUTH_SALT', '!QlH{Dg]E&0OM[4%!DTa,._FhU8Uv2qxIS`iz54^9vlM(gR*%%i;=6UyQTJCL??x');
define('LOGGED_IN_SALT',   'mPWbKRzLCa2I|JRBO?Qf;&TgY7#$<[12lOU<9JbC$TpB7{hLP=-e^fBwcD0sZrlA');
define('NONCE_SALT',       '``Q`j.bnfG*dgp+;7@u@z;)RT7A.o(M%C7~&+5spB1I#gR>em$zb?6/m3NyiUBm0');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

add_filter('xmlrpc_enabled', '__return_false');

add_filter('xmlrpc_methods', function($methods) {
    unset($methods['pingback.ping']);
    unset($methods['pingback.extensions.getPingbacks']);
    return $methods;
});