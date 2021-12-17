<?php
function isPalindrome($str) {
	if(!$str) {
		return false;
	}

	// this is the simplest way to do it with PHP
	return strrev($str) == $str;

	// if there is no PHP function that will reverse the string 
	// I'll be using this long method
	
	/*
	$strCount = strlen($str);
	$midStrCount = round($strCount / 2);
	for($a = 0; $a < $midStrCount; $a++) {
		if(strtolower($str[$a]) != strtolower($str[($strCount - ($a + 1))])) {
			return false;
		}
	}

	return true;
	*/
}

function getAllSubStrings($str){
	if(!$str) {
		return [];
	}

	$length = strlen($str);
	$subStrOfSubStr = $subStr = [];
	for($i = 1; $i <= $length; $i++) {
		$subStr[] = substr($str, 0, $i);
	}

	// get the substring of the substring
	$subStrOfSubStr = getAllSubStrings(substr($str, 1));
	$allSubStr = array_merge($subStr, $subStrOfSubStr);

	return $allSubStr;
}

function longestPalindrome($str) {
	/*
	 * check if the string is a palindrome itself
	 * if the string is palindrome then return the string
	 * by definition - the string is a substring of itself.
	 * https://en.wikipedia.org/wiki/Substring
	 */
	if(isPalindrome($str)) {
		return $str;
	}

	// if the string is not palindrome then get all its substrings
	$arr = getAllSubStrings($str);

	// sort array by character length descending
	usort($arr, function($str1, $str2) {
		return strlen($str2) - strlen($str1);
	});

	for($a = 0; $a < count($arr); $a++) {
		if(isPalindrome($arr[$a])) {
			return $arr[$a];
		}
	}

	return "";
}


function palindromeCuts($str) {
	static $cuts = [];
	if(!$str) {
		return 0;
	}

	// get the longest palindrome substring first
	$long = longestPalindrome($str);
	$cuts[] = $long;

	// split the given string by the longest palindrome substring (using explode() PHP function), 
	// remove the empty strings (using array_filter() PHP function) and
	// rerun the palindromeCuts function to check the remaining substrings
	$remaining = array_filter(explode($long, $str));
	foreach($remaining as $val) {
		palindromeCuts($val);
	}

	// return all the palindromic substrings 
	return $cuts;
}