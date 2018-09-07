<?php
/**
 * args if -t flag is set it goes to test mode
 *
 * This program will iterate though all the plugins looking at the manifests
 *
 *   Will accept args to filter by regular expression on name, and/or regular expression on location, and/or what kind of xml file is already in there
 *   for each plugin,
 *          1) it will load the manifest
 *          2) if its a valid manifest and run is true, ignore is false, and Program_Name is a valid file
 *          2a) If in a repository, and manifest has commit put in, then will sub repo this and put it into the program directory in first run
 *          2b) if code already in the folder, will check to see if the commit id is the same as in the manifest, if different get new version of the code
 *          3) then it creates a temp file and gets the full path for that file
 *          4) calls the program using Language from the manifest ( t flag is set or not from args above)
 *          5) waits for the program to complete (can optimize this later with a thread pool, but for right now will just do one at a time)
 *          6) gets the standard and error outputs
 *          7) if temp file is empty or if it fails a check with gathering/tools/validate_xml.php then an error.xml file is made with the output and written to the base of the plugin folder
 *          8) if in test mode, and the xml type is not test.xml format, then make a test.xml file that shows test is failed (copies in error.xml type if that is what it is)
 *          9) if not in test mode, and the xml type is not output.xml, then make an error xml
 *          10) If output.xml then create a GUI and fill it in
 *
 *   Note for writing xml files: all xml files are called by its type, so there is only one xml file of each type in the plugin file, at most
 *    if an older type is already there, then overwrite it when copying from the temp file
 */
