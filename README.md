# Platform-Science-Code-Exercise
Code exercise for Platform Science.  Assign each shipment destination to a given driver.

language: PHP CLI

See file instructions.txt for instructions on use.

Assumptions

  no malformed input means
    the files exist
    the addresses in the addresses file are in this format:
        123 Street Name\n
        456 Other Street Name Ave.\n 
    the drivers names in the drivers file are in this format:
        Firstname Lastname\n
        Bob James Driver\n
  the number of drivers is >= the number of addresses
  spaces count as characters in lengths of street names
  characters are ascii
  y is not a vowel
  abbreviations will not be expanded for driver and address lengths
  Ray Parker Jr.
  Dr. Al Bundy
  Riverside Ave.
  Lakeview St.
  
Input

file with addresses to be delivered to 
file with drivers names

Output

List of drivers assigned to shipment addresses ordered by SS and showing SS
File listing driver assignments in the form of Driver Assignments.YYYY-MM-DD.txt
