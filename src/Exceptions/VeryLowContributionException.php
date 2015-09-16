<?php

namespace League\OpenSourceEvangelist\Exception;

/**
 * Class VeryLowContributionException
 *
 * @package League\OpenSourceEvangelist\Excepetion
 */
class VeryLowContributionException extends \Exception
{
    /**
     * Import the number of public repo of a user with very low open-source contribution at instantiation
     *
     * @param int $publicRepos
     */
    public function __construct($publicRepos)
    {
        $this->publicRepos = $publicRepos;
    }

    /**
	 * Handle open-source contribution of less than 5
	 *
     * @return string
     */
    public function respond()
    {
        return 'So sad!!! You have a very low contribution to open-source. You need ' . (5 - $this->publicRepos) . ' of your work left to be added to your public repo to become a Junior Evangelist.';
    }
}
