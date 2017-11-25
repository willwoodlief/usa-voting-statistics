# USA Voting Statistics


A collaborative project for finding trends and statistics in American Elections

The goal of this project is to graph election results from all American precincts in all states and territories, and to analyze results. That is a pretty ambitious undertaking, as there are over 3,007 counties and over 170,000 precincts. And there is no centralized source to pull all the data.

This can happen if enough people help. So this project tries to assist by adding  a framework to work within and offers collaboration tools. All work here is under MIT license to allow any kind of website or organization to use the tools and data here freely

## Project Map 
This work is actually 5 semi independent projects that can be worked on separately. To find out more about each area, see the project readme links below for overviews and installation notes. 

| Project        | Description     |
| ------------- |------------- | 
|  [Gathering](gathering/README.md)      | PHP set of tools that uses a plugin structure. Plugins can have scripts written in contributor's choice of [Perl,Python, Ruby, PHP , Go]. These get data from specific counties and states.  |
|  [Coordination](coordination/README.md)     | Allows people to track the status of gathering data from counties across the USA. HTML page that shows the status of the project by colored counties of the United States . Clicking on a county will give more info on that area |
| [Statistical](statistical/README.md)  | Imports data from the xml files generated by the Gathering Project and uses a plugin structure to crunch the numbers in different ways |
| [API](api/README.md)  | OAUTH2 Rails Server that allow for the querying of data and stats, and process search requests. Uses the tables and plugins from the Statistical Project       |
| [GUI](gui/README.md)  | Web Page tools, written in JavaScript, that give a nice search box, and make nice graph displays with options. Works with the API, allowing easy access to data   |



