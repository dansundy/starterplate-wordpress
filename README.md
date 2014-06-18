# WordPress Starterplate

Like my [WordPress Boilerplate](https://github.com/dansundy/boilerplate-wordpress) just stripped right down.


## Getting Started

Set up a WordPress build.

Clone this repository into the `themes` directory:

	$ cd root/wp-content/themes
	
	$ git clone git@github.com:dansundy/starterplate-wordpress.git [themename]
	
Install the needed node packages in the root of the theme:

	$ cd [themename]
	
	$ npm install

Update the information in the `package.json` file. All the data at the top of the `style.css` template is automatically pulled from there.
	
Log in to your WordPress dashboard and select the theme marked (development).

## Deployment

To create a deployment build run:

	$ gulp build
	
This will create a production theme in the `deploy` folder.

## Notes

*(This repository is currently very much in development.)*

## TO DO

* Lots
