<?php 

namespace Helpers;

class HTTP
{
	static $base="http://localhost:8080/digit_betting_php";

	static function redirect($path,$query="")
	{
		$url=static::$base.$path;
		if($query) $url.="?$query";

		header("location:$url");
		exit();
	}
}