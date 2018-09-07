# Statistical Plugins : XML

This engine handles xml files, and provides methods to feed the data to other parts of the app and engines


## General Description


* Allows a way to upload an xml file
* Allows a way to scan for certain kinds of xml files in a directory
* Processing an xml
  *  Given an xml, validates its of type input (link to xml file definition)
  *  Uses the guid field in the xml spec, and the fingerprint of the file
   to see if this has already been uploaded and processed. Part of the interface of the plugins is to 
   check if xml_reads id has been processed fully
  *  If already in the xml_reads and all other plugins report all completed then the xml import is finished
  *  However if a match with the guid but not the fingerprint,
        will tell all plugins to remove this runs_id and it will import it like new again,
  * if got here, then import started. Make a new xml_runs entry, and if because fingerprint changed,
   then will say so in the row
  * will save the xml data through file storage and  cloud storage 
  * will send a message to other waiting plugins that new data in an xml file is waiting  
  * will answer to messages to read chunks of the file for the calling process. the xml is parsed
    so will return the chunks as simple objects      
     

# API 

The api has methods for
 
 * checking if a file was uploaded and processed fully or not
 * uploading an xml file
 * getting the raw xml file
 
 Search
 
 Can give a list of xml files and times uploaded based on geographical and time queries
 
 See its [swagger definition](swagger.yaml) for details about the api calls
 
 The contract with its interface is that it
  fires off a message seeing if the user has permissions to do this


