<?php

if(! function_exists('get_setting')) {
	function get_setting($name)
	{
		$s = DB::table('appsettings')->where('name', '=', $name)->pluck('value');

		return $s[0];
	}
}
