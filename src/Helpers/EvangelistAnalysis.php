<?php
/**
 * This helper package does the open-source evangelists categorization
 * for package Kola\OpenSourceEvangelist\Evangelist.
 *
 * @package Kola\OpenSourceEvangelist\Helper\EvangelistAnalysis
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Helper;

use Kola\OpenSourceEvangelist\Exception\EmptyUsernameException;
use Kola\OpenSourceEvangelist\Exception\InvalidUsernameException;
use Kola\OpenSourceEvangelist\Exception\VeryLowContributionException;

define('SENIOR_RESPONSE', 'Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place.');
define('INTERMEDIATE_RESPONSE', 'Keep Up The Good Work, I crown you Associate Evangelist.');
define('JUNIOR_RESPONSE', 'Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist.');

class EvangelistAnalysis
{
    /**
     * Process the data on an individual's username got from GitHub
     *
     * @param  string $username Supply the username to be searched for on GitHub
     * @return string
     * @throws VeryLowContributionException
     */
    public static function analyse($username)
    {
        try {
            $publicRepos = EvangelistFetch::getNumOfPublicRepos($username);
        } catch (EmptyUsernameException $e) {
            return $e->message();
        } catch (InvalidUsernameException $e) {
            return $e->message($username);
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
