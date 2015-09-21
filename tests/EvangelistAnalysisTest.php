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
use \Exception;

class EvangelistAnalysisTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Hold array of dummy data to be used for the test
     *
     * @return array Set of dummy data for the test
     */
    public function inputs()
    {
        return [
            ['andela-vdugeri', 'Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist.'],
            ['andela-doladosu', 'Keep Up The Good Work, I crown you Associate Evangelist.'],
            ['andela-oadebayo', 'Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place.'],
            ['', 'GitHub username cannot be blank!!!'],
            ['njfjffojirfjnknv', 'Sorry, njfjffojirfjnknv is not registered on GitHub!']
        ];
    }

    /**
     * Test for the equality between the expected values and actual values returned by function analyse()
     *
     * @param        string $username Username of an individual to be searched for on GitHub
     * @param        string $response Expected category response
     * @dataProvider inputs
     */
    public function testGetStatusOfEvangelist($username, $response)
    {
        $this->assertEquals($response, EvangelistAnalysis::analyse($username));
    }

    /**
     * Test for throw of Exception if an individual has less than 5 public repositories on GitHub
     *
     * @expectedException Exception
     */
    public function testWithUserWithVeryLowPublicRepos()
    {
        EvangelistAnalysis::analyse('andela-kerinoso');
    }
}
