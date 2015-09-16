# Open-source Evangelist

This package aims to provide an analysis based on the number of open-source projects an individual possess on GitHub. An individual is ranked according to this category:

* 5 <= Junior Evangelist <= 10
* 11 <= Associate Evangelist <= 20
* 21 <= Most Senior Evangelist

# Installation

Via Composer

$ composer require league/open-source-evangelist

$ composer install

# Usage

$status = new EvangelistStatus($username);

$status->getStatus();

Note that $username is the GitHub username of the individual.

# Change log

Please check out the CHANGELOG.md file for information on what has changed recently.

# Testing

$ vendor/bin/phpunit test

# Contributing

Please check out the CONTRIBUTING.md file for detailed contribution guidelines.

# Credits

Open-source Evangelist is maintained by Kolawole ERINOSO.

# License

Open-source Evangelist is released under the MIT Licence. See the bundled LICENCE file for details.