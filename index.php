<?php
require 'functions.php';
$currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$testStr = "";
if($_POST['submit']) {
	$testStr = $_POST['testStr'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Palindrome</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="pageWrapper">
		<div class="formWrapper">
			<h1>Palindrome Checker</h1>
			<form method="POST" action="<?php echo $currentUrl; ?>">
				<div class="inputWrapper">
					<input type="text" name="testStr" placeholder="Enter a string" value="<?php echo $testStr; ?>">
					<input type="submit" name="submit" value="Go">
				</div>
			</form>
		</div>

		<div class="resultWrapper">
			<?php
			if($testStr) {
				$isPalindromeRes = isPalindrome($testStr);
				$cuts = palindromeCuts($testStr);
				?>
				<div class="isPalindrome"><span><?php echo $testStr; ?></span> is <?php echo (!$isPalindromeRes ? "NOT" : ""); ?> a PALINDROME string.</div>
				<div class="longestPalindrome">Longest palindrome substring is <b><?php echo longestPalindrome($testStr); ?></b></div>
				<div class="minimumCuts">The minimum number of cuts is <b><?php echo (count($cuts) - 1); ?></b> <br>(<?php echo implode(' | ', $cuts); ?>)</div>
				<?php
			}
			?>
		</div>
	</div>
</body>
</html>