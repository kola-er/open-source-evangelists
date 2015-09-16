<?php

namespace League\OpenSourceEvangelist\Exception;

define('RESPONSE', 'GitHub username cannot be blank!!!');

/**
 * Class EmptyUsernameException
 *
 * @package League\OpenSourceEvangelist\Excepetion
 */
class EmptyUsernameException extends \Exception
{
	/**
	 * Handle empty username
	 *
	 * @return string
	 */
    public function respond()
    {
        return RESPONSE;
    }
}
