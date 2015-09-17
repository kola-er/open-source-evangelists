<?php
/**
 * This exception package handles unregistered username on GitHub.
 *
 * @package Kola\OpenSourceEvangelist\Exception\InvalidUsernameException
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Exception;

class InvalidUsernameException extends \Exception
{
    /**
     * Handle unregistered GitHub username
     *
     * @param  string $username Supply the username searched for on GitHub
     * @return string Notification of unregistered username on GitHub supplied
     */
    public function respond($username)
    {
        return 'Sorry, ' . $username . ' is not registered on GitHub!';
    }
}
