<?php
// this function waits from the user to type yes to confirm the filenames.
function confirm() {
    $handle = fopen ("php://stdin","r");
    do { $line = fgets($handle); } while ($line == '');
    fclose($handle);
    return $line;
}

// this function strips the number from the front of the address and returns the street name.
function strip_number_from_address($line) {
    $street = trim(preg_replace("/^\d+\s+/", "", $line));
    return($street);
}

// this function returns a bool, true if odd.
function odd_or_even($input) {
    return(strlen($input) %2);
}

// This function counts the number of vowels in a string.
function count_vowels($input) {
    preg_match_all('/[aeiou]/i',$input,$vowels);
    // var_dump($vowels);
    return(count($vowels[0]));
}

// this function counts the common factors
function count_common_factors($street, $driver) {
    // get the length of street and driver
    $s = strlen($street);
    $d = strlen($driver);
    // select the shortest length
    $min = ($s < $d ) ? $s : $d;
    // loop through the numbers starting with 2 to less than or equal to min checking if the modulus is 0 for both lengths
    for ($i = 2; $i <= $min; $i++) {
        if (($s%$i===0) && ($d%$i===0)) {
            // we only need one common factor so instead of returning a count, we just return 1
            return(1);
        }
    }
    return(0);
}

?>