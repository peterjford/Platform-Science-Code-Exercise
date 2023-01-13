# Platform-Science-Code-Exercise
Code exercise for Platform Science.  Assign each shipment destination to a given driver.

language: PHP CLI

Assumptions
  no malformed input means 
    the files exist
    the addresses in the addresses file are in this format:
        123 Street Name\n
        456 Other Street Name Ave.\n
    the drivers names in the drivers file are in this format:
        Firstname Lastname\n
        Bob James Driver\n
  there are an equal number of drivers and addresses
  spaces count as characters in lengths of street names
  characters are ascii
  y is not a vowel
  
  Input 
