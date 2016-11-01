!!!
TODO: Replace all instances of [TODO:foo] in this document! Make sure to
			highlight each [TODO:foo] and 'find all' to replace all other instances
			of that [TODO:foo] in the document.
!!!

# [TODO:project title]

[TODO:project description]

## Table of Contents

- [Installation](#installation)
	- [Requirements](#requirements)
	- [Viewing the Site](#viewing-the-site)
	- [WordPress Admin and phpMyAdmin](#wordpress-admin-and-phpmyadmin)
- [Development](#development)
	- [First Run](#first-run)
	- [Development Process](#development-process)
	- [Building for Production/Distribution](#building-for-production-distribution)
- [Troubleshooting](#troubleshooting)

---

## Installation

[TODO:project title] is built on WordPress, and the site runs in a virtual machine called [VagrantPress](https://github.com/vagrantpress/vagrantpress) to ensure the uniformity of development environments and ease of setup.

Development is aided by [Grunt](http://gruntjs.com/), a task runner that handles things like compiling SASS and JS, optimizing images, and generating files for distributions.

### Requirements

- [Vagrant](https://www.vagrantup.com/downloads.html)
- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
- [vagrant-hostsupdater](https://github.com/cogitatio/vagrant-hostsupdater)
- [Node.js](https://nodejs.org/en/download/)

### Viewing the Site

Here's how to get [TODO:project title] running on your machine:

1. [Download and install Vagrant](https://www.vagrantup.com/downloads.html).

1. [Download and install VirtualBox](https://www.virtualbox.org/wiki/Downloads).

1. Download or clone this repository.

	```sh
	> git clone [TODO:repo-url]
	```

1. Navigate into the downloaded/cloned repository and start the virtual machine:

	```sh
	> cd [TODO:repo-name]
	```

1. Install the [vagrant-hostsupdater plugin](https://github.com/cogitatio/vagrant-hostsupdater), which allows us to view the site at the URL *http://[TODO:dev-url]* instead of *http://localhost:8080*.

	```sh
	> vagrant plugin install vagrant-hostsupdater
	```

1. Start the virtual machine:

	```sh
	> vagrant up
	```

	The first time booting up the site may take a few minutes.

	Once it's done launching the virtual machine, you'll be returned to the prompt.

	You're done!

1. [Go to http://[TODO:dev-url]](http://[TODO:dev-url]) to see the site.


### WordPress Admin and phpMyAdmin

- You can access the WP Admin at [[TODO:dev-url]/wp-admin](http://[TODO:dev-url]/wp-admin).

	**Username:** admin<br>
	**Password:** vagrant

- You can access phpMyAdmin at [[TODO:dev-url]/phpmyadmin/](http://[TODO:dev-url]/phpmyadmin).

	**Username:** wordpress<br>
	**Password:** wordpress


---


## Development

If you're working on this site, you're probably working on its WordPress theme.

To work on the theme, first navigate to the root of the project and into the theme folder (`theme` is symlinked to `wordpress/wp-content/themes/[TODO:theme-name]` for ease of navigation).

```sh
> cd [TODO:repo-name]
> cd theme
```

### First Run

These three tasks only need to be done the first time you work on the site:

1. [Install Node.js](https://nodejs.org/en/download/) if you don't have it installed already.

1. Install the Grunt command-line interface:

	```sh
	> npm install -g grunt-cli
	```

1. Use the NodeJS Package Manager to install development dependencies:

	```sh
	> npm install
	```

	This will take a minute or two.

### Development Processe

To start developing the site:

1. Start Grunt.

    ```sh
    > grunt
    ```

    This runs the `default` Grunt task, which is configured in the `Gruntfile.js` file in the project root.

    BrowserSync will start a webserver at [localhost:3000](http://localhost:3000) that is set up as a proxy for [[TODO:dev-url]](http://[TODO:dev-url]). It will automatically refresh the page when changes are made to JS or PHP files, and will automatically inject CSS changes without reloading the page. BrowserSync also mirrors scrolling and clicking across devices, so you can go to [localhost:3000](http://localhost:3000) on your phone and control both your computer and phone simultaneously.

1. Open a browser window to [http://localhost:3000](http://localhost:3000) to see the site.

1. Start working on the site!

	- **CSS** is written in SASS, using SCSS syntax. It is located in `_src/css/…` and is compiled to `style.css`.
	- **JavaScript** is concatenated and uglified from NPM sources and files in `_src/js/…` and is compiled to `js/script.js`.
		- **To change what JS files get included, you must change the `uglify` task in the `Gruntfile.js` file.**
	- **Images** are optimized from `_src/img/…` and copied to `img/…`.

	Grunt will continue running in the background, watching all of the files in the repository, recompiling and rebuilding as necessary.

1. When you're finished, stop Grunt with <kbd>Ctrl-C</kbd>.


### Building for Production/Distribution

1. Run the `dist` Grunt task:

	```sh
	> grunt dist
	```

	This will generate all assets and copy the theme files into the **_dist** directory. It skips all of the files related to development.

2. Upload the contents of the **_dist** directory to the production server.


---


## Troubleshooting

- It might be quickest to [email me](mailto:matthew@matthewmcvickar.com).
- Problems with VagrantPress? See the [VagrantPress troubleshooting guide](https://github.com/vagrantpress/vagrantpress/wiki).
- Problems with Grunt? See the [Grunt help resources](http://gruntjs.com/help-resources)
	- Also try removing the installed dependencies and reinstalling them.
			```sh
			rm -rf node_modules; npm cache clean; npm install;
			```


---


[TODO:additional notes]
