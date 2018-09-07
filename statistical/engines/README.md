# Statistical Plugins

Each of the engines used as a gem . Also each of these engines is a sub repo for this repository.


  
## Manifest 

While the sub repository will be set already. Each of the engines also
 have a manifest file which simply describes what it is. This is made to be similar to the gathering section,
  and helps with organizing if the number of engines here grow  

| Block        | Key  | Values |Description     |
| -------------|---|---|------------- | 
|Meta|  | |this block talks about who wrote this and what this is|
| |Name|String|Description|
| |Author|Array|Array of Author names|
| |Description|String|Talks about what this is, briefly|
| |Licence|String| The name of the licence|
| |Wiki|String| url to docs|
|Repository|||Gives information about where to find more about this|
| |Url|string|url of the repository|
| |Branch|string|which branch to link to|


## Interface

Each Engine is required to respond to certain methods

|Name|Description|
|----|-----------|
|ExportSwagger| This prints out a swagger definition for the api|
|IterateAPI| for code to go through and connect with each api, allow the OAUTH app to register and create links|
|StatisticInfo|method that returns the manifest, used to pick out the engine in the app|
|ListMessagesListening| returns a hash of message type names this engine listens and reacts to|
|ListMessagesProducing| returns a hash of message types this engine will broadcast|

The plugins talk by broadcasting and listening to messages. The central app provides this ability 

## Engines

Right now we have only three engines. The xml and raw are core engines

Deltam is the only non core engine here, but other analysis can be added

|Name|Description|
|----|-----------|
|[XML](xml/README.md)| Provides the ability, tables, and methods to import xml and provide status info|
|[Raw](raw/README.md)| Listens to messages sent by the xml engine and will take that data and put it into tables. Provides api to query , and also the other engines depend of messages sent from here to do their own calculations|
|[DeltaM](deltam/README.md)| Calculates the number showing possible skewing|

   

   
