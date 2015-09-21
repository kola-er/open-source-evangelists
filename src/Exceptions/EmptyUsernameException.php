<?php
/**
 * This exception package handles empty username.
 *
 * @package Kola\OpenSourceEvangelist\Exception\EmptyUsernameException
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Exception;

class EmptyUsernameException extends \Exception
{
	const RESPONSE = 'GitHub username cannot be blank!!!';

    /**
     * Handle empty username
     *
     * @return string Notification of empty username supplied
     */
    public function message()
    {
        return self::RESPONSE;
    }
}
