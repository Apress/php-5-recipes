<?php

class RegExp {

	const POSIX = 'POSIX';
	const PCRE = 'PCRE';

	public $pattern;
	public $mode;
	
	// Constructor
	// Creates a new instance of the RegExp object 
	// with the pattern given.
	public function __construct($pattern, $mode) {
		$this->pattern = $pattern;
		if (! $mode) {
			// Defaults to PCRE if there is no mode defined
			$this->mode = self::PCRE;
		} else {
			$this->mode = $mode;
		}
	}

	// prints the string representation of the RegExp object,
	// which in this case is the pattern
	public function __toString() {
		return $this->pattern;
	}

	// isMatch($str)
	// Returns the number of matches found, so is 0 if
	// no match is present.
	public function isMatch($str) {
		if (strcmp($this->mode, self::PCRE)==0) {
			$result = preg_match($this->pattern, $str);
		} else {
			$result = ereg($this->pattern, $str);
		}
		return $result;
	}

	// getMatches($str)
	// Returns an array of matches found in the string $str
	public function getMatches($str) {
		if (strcmp($this->mode, self::PCRE)==0) {
			preg_match_all($this->pattern, $str, $matches);
		} else { 
			ereg($this->pattern, $str, $matches);
		}
		return $matches;
	}
	
	// replace($replaceStr, $str)
	// Makes a replacement in a string
	// 	-$replaceStr:  The string to use as a replacement
	//		for the pattern.
	//	-$str:  The string in which to make the replacement
	public function replace($replaceStr, $str) {
		if (strcmp($this->mode, self::PCRE)==0) {
			$result = preg_replace($this->pattern, $replaceStr, $str);
		} else {
			$result = ereg_replace($this->pattern, $replaceStr, $str);
		}
		return $result;
	}

}


$re = new RegExp('/Hello/', RegExp::PCRE);
$re2 = new RegExp('Hello', RegExp::POSIX);

print "\n\nUsing PCRE: \n\n";

print "Pattern:  " . $re->pattern . "\n";

if ($re->isMatch('Goodbye world!')) {
	echo "Found match!\n";
} else {
	echo "Didn't find match!\n";
}

if ($re->isMatch('Hello world!')) {
	echo "Found match!\n";
} else {
	echo "Didn't find match!\n";
}

$res = $re->replace('Goodbye', 'Hello world!');
echo $res . "\n";

print "\n\nUsing POSIX: \n\n";

print "Pattern:  " . $re2->pattern . "\n";

if ($re2->isMatch('Goodbye world!')) {
	echo "Found match!\n";
} else {
	echo "Didn't find match!\n";
}

if ($re2->isMatch('Hello world!')) {
	echo "Found match!\n";
} else {
	echo "Didn't find match!\n";
}

$re2s = $re2->replace('Goodbye', 'Hello world!');
echo $re2s . "\n";
?>
