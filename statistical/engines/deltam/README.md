# Statistical Plugins : Fractions Per Precinct

This engine calculates a DeltaM for each precinct and stores it in seperate table


## General Description

from http://www.votesleuth.org/

a very simple metric – deltaM* – to describe how “flat” one of these sets of lines is. This estimates numerically the extent to which there is a change in vote margin as we move from adding only smaller precincts to adding larger precincts to the totals. We arrive at this margin by first identifying the median precinct size – where half the precincts are smaller and half the precincts are larger. We then add up the votes for the two candidates in all of the precincts below and including the median to see how different the vote outcome would be if we stopped counting votes after we added only the results from the smaller precincts. If the outcome for all precincts compared to that for only the smaller half of the precincts favors the Republican candidate, deltaM is positive. If the final outcome compared to the “smaller precincts only” outcome favors the Democratic candidate, deltaM is negative.

DeltaM represents the distance between the vote lines at the far right of the graph compared to the distance between the lines at the middle of the graph.

* waits for message saying the raw data is ready
* calculates the DeltaM for each precinct for the county and state levels
* writes this deltaM to deltam_calcs table

# API 

The api returns graphing information using precinct sizes ordered inside a region

Will set ranges of precinct sizes for use for the x, the range size will depend on the
 total number of precincts in the returned query as well as preferences

The return will be only one graph per region asked for

Geo Regions can be:
 
 a list of one or more state:county pairs
 
 a lat lng polygon where any county inside the polygon is part of the data set
 
 See its [swagger definition](swagger.yaml) for details about the api calls  
 
## Search 
 
Also included is a search function that returns a list of ids for deltam of a certain range
and geography size (county or state). 
The ids are standard geo ids found in the mapping database (TODO get that database link)

Optional input is another list of geo ids that the return ids have to be a subset

Another restriction on the search is  times read via gathering or added to statistical
A time within range, including now is allowed


