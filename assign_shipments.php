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
$ss = 0;
$odd = false;

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
    echo "address filename: $argv[1]\n";
    echo "drivers filename : $argv[2]\n";
}

/* this got really annoying during testing
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
*/

// open address file in read mode, exit on failure, default error is sufficient if file not found
$addresses_file = fopen($argv[1], r) or exit();
  
// read a line of the file until the end 
while(!feof($addresses_file)) {
    // add to addresses array 
    $addresses[] = trim(fgets($addresses_file));  
}
 
var_dump($addresses);

// open drivers file in read mode, exit on failure, default error is sufficient if file not found
$drivers_file = fopen($argv[2], r) or exit();

// read a line of the file until the end 
while(!feof($drivers_file)) {
    // add to drivers array
    // with the no malformed data assumtion I don't have to check for blank lines
    $drivers[] = trim(fgets($drivers_file));
}

//var_dump($drivers);

// echo "ss modifiers:\n\todd: $ss_odd\n\teven: $ss_even\n\tcommon factors: $ss_common_factors\n";

// determine SS for each driver for each shipment street

// loop through each address
// get streets from addresses
foreach ($addresses as $address) {
    // trim number fom each line and add to addresses array
    $street = strip_number_from_address($address);
    // first determine if length is odd or even
    $odd = odd_or_even($street);
     echo ($odd) ? "street $street is odd\n" : "street $street is even\n";

    // for each even (not odd) street, loop through each driver and multiply the number of vowels by the SS modifier
    if (!$odd) {
        foreach($drivers as $driver) {
            // multiply number of vowels by the even modifier
            $ss = count_vowels($driver) * $ss_even; 
             echo count_vowels($driver);
             echo "Driver $driver has ss of $ss for Street $street\n";
            if (strlen($driver) === strlen($street) || count_common_factors($street, $driver) >= 1){
                $ss += $ss * $ss_common_factors;
            }
             echo "Driver $driver has ss of $ss for Street $street\n\n";

            // now assign each driver and address to their ss
        }
    // now for odd streets
    } else {
         echo "\n";
        // counting consonants is removing removing puctuation then substracting vowels.
        foreach($drivers as $driver) {
            // remove puctuation and spaces to get correct number of consonants
            $stripped_driver = preg_replace("/[^a-z0-9]/i", '', $driver);
            preg_match_all('/[^aeiou]/i',$stripped_driver,$cons);
             var_dump($cons);
            // multiply the number of consonants by the odd modifier
            $ss = count($cons[0]) * $ss_odd;
             echo "Driver $driver has ss of $ss for Street $street\n";
            // having a length of 1 broke my original if statement, so 
            if (((strlen($driver) !==1) && strlen($driver) === strlen($street)) || (count_common_factors($street, $driver))) {
                 echo "common factor for " . strlen($street) . " and " . strlen($driver) . "\n";
                $ss += $ss * $ss_common_factors;
            }
             echo "Driver $driver has ss of $ss for Street $street\n\n";
            // now assign each driver ss to each address
        }
    }
}
?>
