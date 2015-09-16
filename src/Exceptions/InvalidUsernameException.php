<?php

namespace League\OpenSourceEvangelist\Exception;

/**
 * Class InvalidUsernameException
 *
 * @package League\OpenSourceEvangelist\Excepetion
 */
class InvalidUsernameException extends \Exception
{
	/**
	 * Handle unregistered GitHub username
	 *
	 * @param string $username Supply the username searched for on GitHub
	 *
	 * @return string
	 */
    public function respond($username)
    {
        return 'Sorry, ' . $username . ' is not registered on GitHub!';
    }
}
