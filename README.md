# Install instructions

To be able to run this project you will need:
- a working shell command line (ex.: [terminator](https://gnome-terminator.org/), [iTerm2](https://iterm2.com/), [wsl](https://learn.microsoft.com/en-us/windows/wsl/install))
- [node](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm) and [npm](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)
- [php](https://www.php.net/manual/en/install.php) version ^8.0.2
- [composer](https://getcomposer.org/)
- [docker](https://docs.docker.com/compose/install/) and its [compose](https://docs.docker.com/compose/install/) plugin


----

To spin up this application, go ahead to the shell terminal of your choice and clone the repository to your local machine.

    git clone https://github.com/vascocajada/flags.git flags

Enter the project with `cd flags` and run the following commands to install the dependencies.

    npm install
    composer install

Once everything is properly installed, configure your laravel application.

    cp .env.example .env && php artisan key:generate

Launch laravel's dev web server with

    vendor/bin/sail up -d

And build the application's frontend bundles with

    npm run build

Once these commands finish running you should be able to see the application at http://localhost ! 👏👏

Go ahead and create an account to see the flag list!
