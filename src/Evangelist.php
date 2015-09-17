<?php
/**
 * This package takes the GitHub username of an individual and categorises him/her,
 * based on the number of his/her public repositories, as one of these:
 * Senior, Intermediate or Junior Evangelist.
 *
 * @package Kola\OpenSourceEvangelist\Evangelist
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist;

use Kola\OpenSourceEvangelist\Helper\EvangelistAnalysis;
use Kola\OpenSourceEvangelist\Exception\VeryLowContributionException;

class Evangelist
{
    /**
     * @var string Hold the GitHub username
     */
    private $evangelist;

    /**
     * Import the username to be searched for on GitHub at instantiation
     *
     * @param string $username Supply the username to be searched for on GitHub
     */
    public function __construct($username)
    {
        $this->evangelist = $username;
    }

    /**
     * Categorise a individual according to his/her open-source contribution on GitHub
     *
     * @return string
     */
    public function getStatus()
    {
        try {
            $response = EvangelistAnalysis::analyse($this->evangelist);
        } catch (VeryLowContributionException $e) {
            return $e->message();
        }

        return $response;
    }
}
