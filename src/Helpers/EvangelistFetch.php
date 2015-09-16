<?php

namespace League\OpenSourceEvangelist\Helper;

use League\OpenSourceEvangelist\Exception\EmptyUsernameException;
use League\OpenSourceEvangelist\Exception\InvalidUsernameException;

/**
 * Class EvangelistFetch
 *
 * @package League\OpenSourceEvangelist\Helper
 */
class EvangelistFetch
{
	/**
	 * Fetch the number of public repos of the searched username on GitHub
	 *
	 * @param string $username Supply the username searched for on GitHub
	 *
	 * @return mixed
	 *
	 * @throws EmptyUsernameException
	 *
	 * @throws InvalidUsernameException
	 */
    public static function getNumOfPublicRepos($username)
    {
        if ($username === '') {
            throw new EmptyUsernameException;
        }

        $user = curl_init();

        curl_setopt_array($user, [
            CURLOPT_URL => 'https://api.github.com/users/' . $username,
            CURLOPT_USERAGENT => 'Open-source Evangelist',
            CURLOPT_RETURNTRANSFER => 1
        ]);

        $result = curl_exec($user);
        $result =json_decode($result, true);

        curl_close($user);

        if (isset($result['message'])) {
            throw new InvalidUsernameException;
        }
        
        return $result['public_repos'];
    }
}
