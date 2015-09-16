<?php
/**
 * This exception package handles very low open-source contribution on GitHub.
 *
 * @package Kola\OpenSourceEvangelist\Exception\VeryLowContributionException
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Exception;

class VeryLowContributionException extends \Exception
{
    /**
     * Import the number of public repositories of a user with very low open-source contribution on GitHub at instantiation
     *
     * @param int $publicRepos Number of GitHub public repositories of an individual
     */
    public function __construct($publicRepos)
    {
        $this->publicRepos = $publicRepos;
    }

    /**
     * Handle open-source contribution of less than 5 on GitHub
     *
     * @return string Notification of very low open-source contribution on GitHub
     */
    public function respond()
    {
        return 'So sad!!! You have a very low contribution to open-source. You need ' . (5 - $this->publicRepos) . ' of your work left to be added to your public repo to become a Junior Evangelist.';
    }
}
