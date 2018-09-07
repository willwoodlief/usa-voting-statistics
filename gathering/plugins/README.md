# Gathering Plugins

## Plugin Overview

Each plugin is a self sufficient folder in this project, there are no dependencies included from outside the folder.

A plugin will have a file inside of it which is called as program. The arguments used to call the plugin and the behavior expected of the plugin is described below

### Folder Structure and name

* Plugin folder names are in the following format


    string.author.domain
    
    where string can be any A-Za-z0-9
          author is any name
          domain is name.extension
          
    example   walker.will.texdev.com

* Each Plugin Folder has the following structure


    walker.will.texdev.com
      - manifest.yaml
      - program/ 
      
  Inside the program directory can be anything the plugin needs and can be any structure. 
  The code for the program folder does not have to be added directly to this repo. It can be sourced in another repository
  and the code here is connected as a sub repository. The manifest will show which commit and branch this will be set to


### Location of the plugin in the project

* The subfolder the plugin is saved under depends on Location set in the manifest

* If no location is set, then it goes to the no_location_set folder in the plugins directory

* Else, if it includes more than one state, it goes under the multi_state_coverage folder

* If it only includes one state then it goes under that state folder

* When only one state, if it includes more than one county, then it goes into that state folder's multi_county_coverage folder

* When only one state, if it includes just one county, then it goes into the county name folder in that state

* When only one state, and no counties, it goes into that state's no_county_coverage folder

So, there should be a folder for everything. If the manifest location changes, then the it can be relocated


## Call Parameters

When the plugin program is run it is called in the following way
            
      <language> program_name [optional test switch -t] <full path to temp file>
            
  * The <language> is the script language set in the manifest [perl,python, ruby, php ]
  * The program_name is the relative path and name of the main script. The path is relative to the plugin root
  so program/main.rb would be a valid example
  * if the test switch -t is passed, then the program is expected to run tests and fill out a test xml to the temp file 

## Communication

* When the plugin program is run, the last argument given is a temp file path which should be
 have an xml file written to it
 
* If an unrecoverable error happens inside the plugin when its run, in normal or test mode, then its expected to fill out an error xml to the temp file

* If in test mode, the plugin is expected to fill out a test xml, not doing so will be regarded as a failed test  

* In a call without the -t flag, then the temp file is expected to have filled out an output.xml to the temp file. 

* If no data is found,then the plugin will return  an error.xml 

* If the plugin writes nothing to the temp file, all output on the standard out and error channels will be recorded in an error xml made by the framework

* After the plugin finished and returns an xml file, the xml file is validated, and placed at the root of the plugin folder with the name of the xml format (ie error.xml, output.xml or test.xml)

* If an xml file fails validation [see validate_xml.php](../tools/validate_xml.php), then the failed xml file is still written out, unless its an error.xml, and the system will write a new error.xml to report a failed validation

* If there is already an xml file there with the same name, its overridden

* multiple xml files in the same plugin ? The system will choose the one with the most recent write date. 

* see link to xml specification : [XML Specifications for Data, Tests, and Errors ](../xml/README.md) 




## Manifest Description

* manifests can be tested with [test_manifest.php](../tools/test_manifest.php)

* for help with yaml specification and figuring out errors, see [ This guide ](https://github.com/Animosity/CraftIRC/wiki/Complete-idiot's-introduction-to-yaml)

| Block        | Key  | Values |Description     |
| -------------|---|---|------------- | 
|Plugin|  | |this block tells if the entire plugin should be ignored or run. If missing then see defaults below|
| | Ignore|  [true,false]| if false then this plugin is not used for anything. Notes and program is skipped, default false |
| | Run|  [true,false]| the program is only run if this is true, default true |
|Note| | array of one or more note objects, the keys are of the note  object | This block describes notes from the plugin that can be shared in collaborative tools.|
| |Author|  | single author of the note, this will be seen in collaborative tools |
| |Date|  | any date or time notation, not machine read,will be seen in collaborative tools |
| |Note| html tags are always stripped | anything here and its shared in collaborative tools|
| |Reminder| html tags are always stripped  | anything here and nobody will see it unless they look at the manifest text|
|Location| | | This tells the system the area the plugin covers. Array of one or more state objects, the keys are of the state object|
| |State| Full Name of State or Territory, or USA for national |Each Plugin only covers one State or is national |
| |County| Array of one or more county names| If no county names then is for the entire State field above |
|Race| | Array of one or more race objects, the keys are of the race object| |
| |Party|[Democratic,Republican,Green,Libertarian,multi]||
| |Type|[Primary,General,Runoff]||
| |Locality|[State,National]||
| |Office|[President,Senator,Representative,Governor]||
| |Year|Numeric Year||
| |Month|Full Spelled Month||
| |Date|Numeric Date||
|Version| | | This block lists the version, if not given see defaults|
| |Major| integer | 0 means not completely developed, bump up every time a new race is added|
| |Minor| integer| defaults to zero, bump up for each small change that changes data coverage |
| |Bugfix| integer| defaults to zero, bump up for each bugfix that does not change data coverage|
|Modified| | |This is the machine readable date the program was modified, can be different from the commit date|
| |Year|Numeric Year||
| |Month|Full Spelled Month||
| |Day|Numeric Date||
|Meta||| This block contains information about the authors, program name and description|
| |Name| |The internal name of this plugin, does not have to be what the repo calls it|
| |Description| | Describes this plugin |
| |Author|array of one or more authors| who wrote this plugin|
|Program|||This block tells how to run this plugin. Program can be hosted on git, and if so then fill out the url, branch and commit, else it will be added directly to the repo|
| |Language|[Perl,Python, Ruby, PHP ]||
| |Path|path name string|relative path (from the plugin folder) of the program |
| |Url|git url string| the full url to the project in publicly accessible  git repository |
| |Branch|string| the name of the branch, if left out the default is master|
| |Commit|string git hash| This must be included as, for security reasons, we cannot hot link to over 3000 projects. Code needs to be audited first|