# Gathering

Allows different scripts, running independently, to gather election data.
 These scripts are expected to be able to write xml to a temporary file, whose path is passed as a command line argument

The basic idea is that each script will have responsibility over one or more counties in each state,
 although a script can also get data for multiple counties and states
 
Another basic idea is that the scripts can be made from different languages, to help facilitate development   

Right now, script can be written in Perl,Python,Ruby, and Php . But others can be supported as long as 
the source code can be tracked in git and there are no manual build steps to compile a program.
A good fit is to just be able to run the script, without build commands. However, if someone wants to add Go or Java Jar support, for example, that is fine too

The scripts can be developed in their own repository, and the framework will download and update as a sub repository here

## Documentation

| Topic        | What it covers     |
| -------------|------------- | 
|[How to Write a Plugin and integrate it with this](plugins/README.md)|Plugins have to follow a few simple rules, they also need an extra file describing what they do and how to run them|
|[What is the xml they are expected to return?](xml/README.md)||
|[There are some scripts for managing and running these plugins together](bin/README.md)|
|[And a couple tools to help test files in development](tools/README.md)|



## PHP Language Level

While other parts of this project is written in Ruby, I wanted the gathering section framework to be written in php
 because this is the  section of the project that really needs teamwork,
 and a lot of people helping. And more people write and run php on their machines than ruby
  
For the php framework that handles these plugins, and if writing a plugin in php,
 the maximum level for language support should be 5.5.9 as there are many shared hosting phps that are stuck at this level


## Language Level and support for plugins : Server Requirements

Basically, the plugins should be able to run in an ubuntu 14.04 default environment with a few standard extensions, gems and libraries pre installed
 ,in each language, making web scraping and xml handling easier. As the project goes along in evolution, there will be a detailed list of requirements expected on the server

