phin_Framework
==============

PHP Framework - Methodology (A Different Approach)

A Different Way to think about PHP Frameworks

phin_Framework is NOT a complete framework like Codeigniter or others.  
Instead, it contains the essential parts to allow developers to adapt it to there projects or specific needs quickly
and cleanly.  I takes very little from common frameworks and focus' on being used to create any web app without out of
the box contraints.
Some may even consider this more of a Methodology rather than a Framework, but whatever you call it, it allows quick, 
customizable web app development.

Getting Started
===============
To get started, simply upload the phin_Framwork files to you local or remote server and go to the directory
you installed it in in a web browser.
**NOTE - Since the _system/config.php does not exist by default, we will create it.  The app looks for
_system/config.php file and if does not exist (and on a fresh install it should not), the app will redirect
you to the installation page automatically.

How the Install Works
=====================
The install first looks for _system/config.php.  If this files does not exist(and on a fresh install it should not)
the user will be redirected to the installation page.
Once all of the information has been entered, database name, server address, etc., the app will create the
_system/config.php file based on the _system/config_builder.php file.

File Structure
==============
phin_Frameworks file structure is based on the tables in your database. Therefore, if you have a table named "users", you will also have a folder named "users".
Within that folder, "users" will be at the very least, a file called functions.php.  All functions pertaining to the table "users" go into this functions.php.
Also, within "users" folder will contain controller.php, index.php, view.php, crud_create.php and crud_update.php
- controller.php: this should be at the top of all files with the "users" folder.  It will run first and decide what info to display and or where to redirect.  All function calls should also go into the controller.php file.
* index.php: redirects to the view.php file
* view.php: the main view of the records in the "users" table (contains the controller.php at the top of this file)
* crud_create.php: create a new "users" record (contains the controller.php at the top of this file)
* crud_update: update a "users" records (contains the controller.php at the top of this file)


Naming Methodology
===========
Database table names drive the organization and self documentation of phin_Framework.  Here are examples of how you should name your database tables and function names so they are self documenting and easy to find in the file structure.

* Database names:  should be as descriptive as possible.  If you need a table for events, then the table name should be "events" (plural because there will be more than one event)
* Functions: If we create functions for our "events" table, the function name should contain that name.  For example, read_Events(), update_Events(), join_venues_to_Events(). Now no matter where in the code you see this function, you know it belongs to the "events" table which also means it is in the "events" folder.


Working with Queries
====================
coming soon

Working with _system/ files
===========================
coming soon


