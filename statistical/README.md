# Statistical 

Ruby on Rails service. This gathers the XML made in the [Gathering Section](../gathering/README.md),
 stores the information into tables, statistically analyzes them,
 and provides and API to sort through and display the information

 Its organized into a central Application which provides some things and most of the functionality is handled 
 in engines which can be plugged in and out which out rewriting app code
 
 The idea is that none of the statistical and data keeping records should be tied into the app directly
   This allows the stats to be worked on separately,  
   and allows new stats and api to be added easily 

## Central App

This is a ruby app which provides:
 
 * OAUTH service
 * Geo information 
 * handles queries based on a plugin system (add link to that folder)
 * remembers user favorite searches (including searches for information that is not there yet)
 * rake task to combine the swagger definition inside the app file, and the partial swaggers in each engine
 * implements the messaging service where the engines talk to each other. Hooks up their communications
 * Registers the API of each engine to be used with the OAUTH
 * adds an alert service where users can be alerted (like in the raw engine where there is overwrite issues)
 * adds  filled models of lat lng polygons for counties and states (taken from json in coordination)
 
## Engines

  The engines are listed at [engines/README.md](engines/README.md)
 
