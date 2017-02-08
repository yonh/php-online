<?php
/**
 * 判断字符是否开始于某字符串
 *
 * @param $haystack string 原字符串
 * @param $needle string 判断字符串
 * @return bool
 */
function startsWith($haystack, $needle)
{
	$length = strlen($needle);
	return (substr($haystack, 0, $length) === $needle);
}
/**
 * 判断字符是否结束于某字符串
 *
 * @param $haystack string 原字符串
 * @param $needle string 判断字符串
 * @return bool
 */
function endsWith($haystack, $needle)
{
	$length = strlen($needle);
	if ($length == 0) {
		return true;
	}
	return (substr($haystack, -$length) === $needle);
}