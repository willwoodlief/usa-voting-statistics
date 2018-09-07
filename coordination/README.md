# Coordination

This is a web page that displays a google map api of the United States which starts showing the entire country

Each county in the United States is color coded showing the project progress

Clicking on a county will show a pop up with detailed information about status and plugins

Sometimes, there can be notes for specific areas. Depending on what area the note is for, the note might be displayed to the right of the map

## Filters

* the json data structure will list which elections and years are covered

* the javascript, at runtime, will populate a dropdown box to filter progress by election and year

* the map will start unfiltered

## Data Generation for the Map

* Data for the map is generated and refreshed by calling [refresh_data.php](bin/refresh_data.php)

* So be sure to call this before displaying the map, and then after a pull that updates plugins

* The gui folder can be copied without the rest of the repo, to be displayed on a server. 
And the refresh_data script can be called with the -o argument to write a file off the server which can ben be uploaded as data  

## Notes 

* County specific notes are shown when the county is clicked, in the pop up

* Multi County notes are shown, in a bottom bar, when zoom is set in the middle or closer,
 and one of the counties is  hovered over

* Multi State notes is shown at any zoom level and when any of the states associated with the note is in the map view


## Color Schemes 

  
  
  Each County has the following legend
  
  | Color        |  What it means    |
  | -------------|------------- |
  |white|No plugin covers this|
  |green|A plugin covers this county, and it works|
  |purple|More than one plugin covers this county, and they all work|
  |red| There is at least one plugin for this county that is an error |
  |yellow|At least one of the plugins is failing a test for this county|
  |greenish white| There are no active plugins for this county, but one exists that is turned off|
  
  * plugins that have no executable, are not marked on the map 
  
  

## Todo 

* the boundaries for all the counties and states are located in [bounds.json](data/bounds.json)

todo get the lat lng polygons for each county and state in json format so that we don't have to use database connection here