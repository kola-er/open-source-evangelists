<?php
/**
 * This helper package does the fetching of the number of public repositories
 * for package Kola\OpenSourceEvangelist\Evangelist.
 *
 * @package Kola\OpenSourceEvangelist\Helper\EvangelistFetch
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Helper;

use Kola\OpenSourceEvangelist\Exception\EmptyUsernameException;
use Kola\OpenSourceEvangelist\Exception\InvalidUsernameException;

class EvangelistFetch
{
    /**
     * Fetch the number of public repositories of the searched username on GitHub
     *
     * @param  string $username Supply the username searched for on GitHub
     * @return mixed
     * @throws EmptyUsernameException
     * @throws InvalidUsernameException
     */
    public static function getNumOfPublicRepos($username)
    {
        if ($username === '') {
            throw new EmptyUsernameException;
        }

        $user = curl_init();

        curl_setopt_array(
            $user, [
            CURLOPT_URL => 'https://api.github.com/users/' . $username. '?client_id=' . getenv('GITHUB_CLIENT_ID') . '&client_secret=' . getenv('GITHUB_CLIENT_SECRET'),
            CURLOPT_USERAGENT => 'Open-source Evangelist',
            CURLOPT_RETURNTRANSFER => 1
            ]
        );

        $result = curl_exec($user);
        $result =json_decode($result, true);

        curl_close($user);

        if (isset($result['message'])) {
            throw new InvalidUsernameException;
        }
        
        return $result['public_repos'];
    }
}
