<?php

namespace League\OpenSourceEvangelist;

use League\OpenSourceEvangelist\Helper\EvangelistAnalysis;
use League\OpenSourceEvangelist\Exception\VeryLowContributionException;

/**
 * Class Evangelist
 *
 * @package League\OpenSourceEvangelist
 */
class Evangelist
{
    private $evangelist;

    /**
     * Import the username to be searched for on GitHub at instantiation
     *
     * @param string $username Supply the username searched for on GitHub
     */
    public function __construct($username)
    {
        $this->evangelist = $username;
    }

    /**
     * Categorize a user according to his/her open-source contribution
     */
    public function getStatus()
    {
        try {
            $response = EvangelistAnalysis::analyze($this->evangelist);
        } catch (VeryLowContributionException $e) {
            return $e->respond();
        }

        return $response;
    }
}
