<?php

namespace League\OpenSourceEvangelist\Helper;

use League\OpenSourceEvangelist\Exception\EmptyUsernameException;
use League\OpenSourceEvangelist\Exception\InvalidUsernameException;
use League\OpenSourceEvangelist\Exception\VeryLowContributionException;

define('SENIOR_RESPONSE', 'Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place.');
define('INTERMEDIATE_RESPONSE', 'Keep Up The Good Work, I crown you Associate Evangelist.');
define('JUNIOR_RESPONSE', 'Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist.');

/**
 * Class EvangelistAnalysis
 *
 * @package League\OpenSourceEvangelist\Helper
 */
class EvangelistAnalysis
{
	/**
	 * Process the data got from GitHub
	 *
	 * @param string $username Supply the username searched for on GitHub
	 *
	 * @return string
	 *
	 * @throws VeryLowContributionException
	 */
    public static function analyze($username)
    {
        try {
            $publicRepos = EvangelistFetch::getNumOfPublicRepos($username);
        } catch (EmptyUsernameException $e) {
            return $e->respond();
        } catch (InvalidUsernameException $e) {
            return $e->respond($username);
        }

        if ($publicRepos >= 21) {
            return SENIOR_RESPONSE;
        } elseif ($publicRepos >= 11) {
            return INTERMEDIATE_RESPONSE;
        } elseif ($publicRepos >= 5) {
			return JUNIOR_RESPONSE;
		} else {
            throw new VeryLowContributionException($publicRepos);
        }
    }
}
