# WordPress Starterplate

Like my [WordPress Boilerplate](https://github.com/dansundy/boilerplate-wordpress) just stripped right down.


## Getting Started

Set up a WordPress build.

Clone this repository into the Themes directory:

	$ cd root/wp-content/themes
	
	$ git clone git@github.com:dansundy/starterplate-wordpress.git [themename]
	
Install the needed node packages in the root of the theme:

	$ cd [themename]
	
	$ npm install
	
Log in to your WordPress dashboard and select the theme marked (development).

To create a deployment build run:

	$ gulp build
	
This will create a production theme in the `deploy` folder.

*(This repository is currently very much in development.)*

## TO DO

* Uh, make it.
