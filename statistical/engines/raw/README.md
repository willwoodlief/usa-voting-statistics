# Statistical Plugins : Raw Import of Data from the Gathering 

This Engine adds data to tables with minimal processing, but with some checks for data integrity 


## General Description 


Internal call to add data
* Once it receives a message that an xml file is ready it will import the information into raw_data
* it does this by sending a message asking for the data via xml_run_id 
* It will get the data via chunks of xml converted to simple objects
* When processing data will check to see if precinct already has this information added
* If there is a conflict, the data will not be changed but a note of the conflict added to 
  raw_conflicts, if a note was not previously made with this xml_runs id . If a note was previously made
  then will see if a flag is set for it to overwrite the data  
* Once writing the data, adds the xml data verbatim, to the raw data tables with each entry tied to the xml_reads FK
* And adds a percentage of each party voted for in each precinct 
* after writing data will send alert if there is raw_conflicts
* after writing data will send message saying raw data ready

# API 

Returns paginated data for each geo region asked for , and breaks up the requested region via
State and County

Geo Regions can be:
 
 a list of one or more state:county pairs
 
 a lat lng polygon where any county inside the polygon is part of the data set
 
 See its [swagger definition](swagger.yaml) for details about the api calls 
 
 ## Search
 
 Additionally has a search function to return a set of GEO ids where the percentage of vote per party is within certain bounds
 The search can be optionally restricted by a list of states and counties ,
  or times read via gathering or added to statistical
  A time within range, including now is allowed
 
 Optional input is another list of geo ids that the return ids have to be a subset
 
 


