<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns:og="http://ogp.me/ns#">
<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { ?> at <?php } ?><?php bloginfo('name'); ?></title>
<meta property="og:image" content="http://lod.sfc.keio.ac.jp/common/img/mainvisual2.png" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
<!--link rel="stylesheet" type="text/css" media="all" href="../common/css/import.css" />-->
<link rel="stylesheet" type="text/css" media="all" href="/challenge2014/common/css/import.css" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="shortcut icon" type="image/x-png" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="../common/js/droppy.js"></script>
<?php wp_head(); ?>
		<script type="text/javascript">
			$(function() {
				$("#nav").droppy({speed:50});
			});
		</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26316207-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body <?php body_class(); ?>>
		<div id="pageTop"><a id="pageTop" name="pageTop"></a></div>
		<div id="wrapperAll">
		<div id="wrapperAll">
			<div id="mainBK">
				<div id='header'>
				<h1><a href="index.html" title="Linked Open Data Challenge Japan 2014"><img src="/challenge2014/common/img/lod2014top.png" alt="LODチャレンジ Japan / Linked Open Data Challenge Japan 2014" /></a></h1>
				</div>
				<div id="mainMenu">
					<ul id="nav">
						<!--  以下は各ドキュメントが完成次第に蓋をあけていく -->
						<li id="hm001"><a href="javascript:void(0);" title="開催情報">開催情報</a>
						<ul>
							<li><a href="/challenge2014/objective.html">開催趣旨</a></li>
							<li><a href="/challenge2014/evaluate.html">審査について</a></li>
							<li><a href="/challenge2014/faq.html">FAQ</a></li>
						 <!-- 
							//<li><a href="http://lod.sfc.keio.ac.jp/challenge2012/index.html" target="_blank">LODチャレンジJapan2012アーカイブ</a></li>
							//<li><a href="http://lod.sfc.keio.ac.jp/challenge2011/index.html" target="_blank">LODチャレンジJapan2011アーカイブ</a></li>
						-->
						</ul></li>
						<li id="hm002"><a href="javascript:void(0);" title="応募情報">応募情報</a>
						<ul>
							<li><a href="/challenge2014/outline.html">応募について</a></li>
							<li><a href="/challenge2014/entry_terms.html">応募規定</a></li>
							<li><a href="/challenge2014/category.html">エントリー部門情報</a></li>
							<!-- エントリー結果一覧はコメントアウトする -->
							<!--  <li><a href="dataset.html">データセット部門</a></li>-->
							<!--  <li><a href="idea.html">アイデア部門</a></li> -->
							<!--  <li><a href="application.html">アプリケーション部門</a></li> -->
							<!--  <li><a href="visualization.html">ビジュアライゼーション部門</a></li> -->
							<!--  <li><a href="basetechnology.html">基盤技術部門</a></li> -->
						</ul></li>
						<li id="hm003"><a href="javascript:void(0);" title="エントリー一覧">エントリー一覧</a>
						<ul>
							<!-- エントリー結果一覧はコメントアウトする -->
							<li><a href="/challenge2014/dataset.html">データセット部門</a></li>
							<li><a href="/challenge2014/idea.html">アイデア部門</a></li> 
							<li><a href="/challenge2014/application.html">アプリケーション部門</a></li> 
							<li><a href="/challenge2014/visualization.html">ビジュアライゼーション部門</a></li>
							<li><a href="/challenge2014/basetechnology.html">基盤技術部門</a></li> 
						</ul></li>
						<!--  スポンサーの要項などが決定次第に順次リンクしていく -->
						<li id="hm004"><a href="javascript:void(0);" title="スポンサー">スポンサー</a>
							<ul>
							<li><a href="/challenge2014/recommendation.html">LODチャレンジJapan2014への期待</a></li>
							<li><a href="/challenge2014/resource_usage.html">データ／基盤パートナーのリソース利用方法</a></li>
							<!--  <li><a href="#sponsor">スポンサー一覧</a></li>-->
								<li><a href="/challenge2014/sponsorrecruit.html">スポンサー募集</a></li>
								<li><a href="/challenge2014/partner_platform_data.html">データ提供／基盤提供パートナー募集</a></li>
								<li><a href="/challenge2014/partner_media.html">メディアパートナー募集</a></li>
								<li><a href="/challenge2014/supporter.html">サポーター募集</a></li>
							</ul></li>
						<li id="hm005"><a href="/challenge2014/event.html" title="イベント">イベント</a>
						<!--  LODとはの具体的な内容を再構成した上でリンクを張ることとし、当分はアーカイブをリンクする -->
						<!--  <li id="hm005"><a href="javascript:void(0);" title="LODチャレンジーアーカイブ">LODチャレンジ受賞作品</a>
						 	<ul>
						 		<li><a href="http://lod.sfc.keio.ac.jp/blog/?p=2109" target="_blank">LODチャレンジJapan2013受賞作品</a></li>
						 		<li><a href="http://lod.sfc.keio.ac.jp/blog/?p=1071" target="_blank">LODチャレンジJapan2012受賞作品</a></li>
								<li><a href="http://lod.sfc.keio.ac.jp/challenge2011/result2011.html" target="_blank">LODチャレンジJapan2011受賞作品</a></li>
							</ul>
						</li>
						!-->
						<!-- リンク先ドキュメント内容の修正後に順次公開する -->
						<!--    
							//<li id="hm005"><a href="javascript:void(0);" title="LODとは">LODとは</a>
							//	<ul>
							//	<li><a href="aboutlod.html">LODとは？</a></li>
							//	<li><a href="slideresources2.html">技術解説</a></li>
							//	<li><a href="slideresources.html">分野別事例紹介</a></li>
							//	<li><a href="link.html">リンク集</a></li>
							//	</ul>
							//	</li>
						-->
						<li id="hm006"><a href="../blog/" title="公式ブログ">公式ブログ</a></li>
					</ul>
				</div><!--// mainMenu //-->
				<!-- 
<div id="container" class="group">

<h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
<div id="bubble"><p><?php bloginfo('description'); ?></p></div> <!-- erase this line if you want to turn the bubble off -->