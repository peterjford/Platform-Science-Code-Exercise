<?php
// this function waits from the user to type yes to confirm the filenames
function confirm() {
    $handle = fopen ("php://stdin","r");
    do { $line = fgets($handle); } while ($line == '');
    fclose($handle);
    return $line;
}

function strip_number_from_address($line) {
    $street = preg_replace("/^\d+\s+/", "", $line);
    return($street);
}

?>