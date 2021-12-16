<?php
function isPalindrome($str) {
	if(!$str) {
		return false;
	}

	$strCount = strlen($str);
	$midStrCount = round($strCount / 2);
	for($a = 0; $a < $midStrCount; $a++) {
		if(strtolower($str[$a]) != strtolower($str[($strCount - ($a + 1))])) {
			return false;
		}
	}

	return true;
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

	// get the subsctring of the substring
	$subStrOfSubStr = getAllSubStrings(substr($str, 1));
	$allSubStr = array_merge($subStr, $subStrOfSubStr);

	// get the unique string from the regardless their cases.
	return array_unique(array_map("strtolower", $allSubStr));
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

	// sort array by character length
	usort($arr, function($a, $b) {
		return strlen($b) - strlen($a);
	});

	for($a = 0; $a < count($arr); $a++) {
		if(isPalindrome($arr[$a])) {
			return $arr[$a];
		}
	}

	return "";
}