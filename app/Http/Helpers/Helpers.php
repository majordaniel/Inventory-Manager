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

if(! function_exists('company_name_set')) {
	function company_name_set()
	{
		if(get_setting('company_name') == 'undefined' || get_setting('company_name') == null) {
			return false;
		}

		return true;
	}
}
