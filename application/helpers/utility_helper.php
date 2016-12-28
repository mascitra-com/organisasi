<?php
if (!function_exists('check_image')) {
	function check_image($filename, $path, $default = 'default.png'){
		if (!file_exists($path.$filename) || empty($filename)) {
			return $default;
		}
		return $filename;
	}
}

if (!function_exists('trim_article')) {
	function trim_article($article, $length=160){
		if (strlen($article)>$length) {
			$article =substr($article, 0, $length).'...';
		}
		return $article;
	}
}
?>