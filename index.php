<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Palindrome</title>
</head>
<body>
	<?php
	$testStr = "iTopiNonAvevanoNipoti";
	$isPalindromeRes = isPalindrome($testStr);

	echo "<b>" . $testStr . "</b> is " . (!$isPalindromeRes ? "NOT" : "") . " a PALINDROME string.<br>";
	echo longestPalindrome($testStr);

	echo "<pre>";
	print_r(getAllSubStrings($testStr));
	echo "</pre>";
	?>	
</body>
</html>