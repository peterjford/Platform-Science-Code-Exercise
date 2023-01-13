#!/usr/bin/env  php
<?php
// written by Peter J. Ford 2023-01-12

// pull the ss modifier valiues from another file so they could be easily changed
// if the top-secret algorithm changes.
include("ss_modifiers.php");

// functions
include("functions.php");

// arrays initialized
$addresses = array();
$streets = array();
$drivers = array();
$assignments = array();

// check arguments for correct number or help
if ($argc != 3 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
    ?>
    
    This is a command line PHP script to assign addresses to drivers.  It accepts
    2 arguments, the filename of a file containing line separated addresses, 
    and the filename of a file containing line separated drivers names.
    
    Usage:
    <?php echo $argv[0]; ?> <address filename> <drivers filename>
    
    Use --help, -help, -h, or -? instead of a filename to get this help.
    
<?php
// after displaying usage, exit
    exit();

} else {
// quick validation of filenames. 
// for better file validation I would implement
// $addresses_file = fopen($argv[1], 'r')
// or exit("unable to open address file ($argv[1])");
// $drivers_file = fopen($argv[2], 'r')
// or exit("unable to open drivers file ($argv[2])");
    echo "\naddress filename: " . $argv[1];
    echo "\ndrivers filename : " . $argv[2];
}

// ask for confirmation to continue.  could be omitted
?>

enter yes if this is correct and you want to continue
<?php
$continue = confirm();
// echo strtoupper($continue);
if (trim(strtoupper($continue)) !== "YES")
{ 
// a more use friendly solution would be to promp the user to enter the filenames.
    exit();
}

// open address file in read mode, exit on failure, default error is sufficient if file not found
$addresses_file = fopen($argv[1], r) or exit();
  
// read a line of the file until the end 
while(!feof($addresses_file)) {
    // add to addresses array 
    // trim number fom each line and add to addresses array
    // with the no malformed data assumtion I don't have to check for blank lines
    $addresses[] = strip_number_from_address(fgets($addresses_file));
}

// var_dump($addresses);
$drivers_file = $argv[2];


echo "ss modifiers:\n" . $odd . "\n" . $even . "\n" . $common_factors;
?>
