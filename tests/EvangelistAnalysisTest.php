<?php
/**
 * This package tests the EvangelistAnalysis Helper class.
 *
 * @package Kola\OpenSourceEvangelist\Test\EvangelistTest
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Test;

use Kola\OpenSourceEvangelist\Helper\EvangelistAnalysis;
use Kola\OpenSourceEvangelist\Exception\VeryLowContributionException;

class EvangelistAnalysisTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Hold array of dummy data to be used for the test
     *
     * @return array Set of dummy data for the test
     */
    public function Inputs()
    {
        return [
            ['andela-ooduye', 'Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist.'],
            ['andela-amaborukoje', 'Keep Up The Good Work, I crown you Associate Evangelist.'],
            ['andela-smartins', 'Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place.'],
            ['', 'GitHub username cannot be blank!!!'],
            ['njfjffojirfjnknv', 'Sorry, njfjffojirfjnknv is not registered on GitHub!'],
        ];
    }

    /**
     * Test for the equality between the expected values and actual values returned by function analyse()
     *
     * @param        string $username Username of an individual to be searched for on GitHub
     * @param        string $response Expected category response
     * @dataProvider Inputs
     */
    public function testGetStatusOfEvangelist($username, $response)
    {
        $this->assertEquals($response, EvangelistAnalysis::analyse($username));
    }

    //    /**
    //	 * Test for throw of VeryLowContributionException if an individual has less than 5 public repositories on GitHub
    //	 *
    //     * @expectedException VeryLowContributionException
    //     */
    //    public function testWithUserWithVeryLowPublicRepos()
    //    {
    //        EvangelistAnalysis::analyse('andela-kerinoso');
    //    }
}
