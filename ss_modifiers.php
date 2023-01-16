<?php
// these are the modifiers for the suitability score
// they are included in a separate file in case the values
// in the top-secret algorithm need to be changed.

// If the length of the shipment's destination street name is even, 
// the base suitability score (SS) is the number of vowels in the driver’s name multiplied by 1.5
$ss_even = 1.5;

//If the length of the shipment's destination street name is odd, 
// the base SS is the number of consonants in the driver’s name multiplied by 1.
$ss_odd = 1;

// If the length of the shipment's destination street name shares any common factors 
// (besides 1) with the length of the driver’s name, 
// the SS is increased by 50% above the base SS.
$ss_common_factors = .5;
?>
