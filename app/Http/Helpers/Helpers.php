<?php

if(! function_exists('get_setting')) {
	function get_setting($name)
	{
		$s = DB::table('appsettings')->where('name', '=', $name)->pluck('value');

		return $s[0];
	}
}

if(! function_exists('currency_options')) {
	function currency_options()
	{
		return [
			'$' => '$',
			'£' => '£',
			'€' => '€',
			'¥' => '¥',
			'₹' => '₹',
			'₽' => '₽',
			'元' => '元'
		];
	}
}
