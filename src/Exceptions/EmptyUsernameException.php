<?php
/**
 * This exception package handles empty username.
 *
 * @package Kola\OpenSourceEvangelist\Exception\EmptyUsernameException
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Exception;

define('RESPONSE', 'GitHub username cannot be blank!!!');

class EmptyUsernameException extends \Exception
{
    /**
     * Handle empty username
     *
     * @return string Notification of empty username supplied
     */
    public function message()
    {
        return RESPONSE;
    }
}
