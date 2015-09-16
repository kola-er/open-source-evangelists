# Contributing

Contributions are welcome, and are accepted via pull requests. Please review these guidelines before submitting any pull requests.

# Which Branch?

Please submit all pull requests for new features to the master branch.

Please submit pull requests for bug fixes and typos to the earliest branch the issue can be found in.

# Pull Requests

Ensure that the current tests pass, and if you've added something new, add the tests where relevant.

Send a coherent commit history, making sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please squash them before submitting.

# Running Tests

$ vendor/bin/phpunit

If the test suite passes on your local machine, you should be good to go. When you make a pull request, the tests will automatically be run again by Travis CI on multiple php versions and hhvm.