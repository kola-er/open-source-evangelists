<?php
/**
 * This package tests the class Evangelist.
 *
 * @package Kola\OpenSourceEvangelist\Test\EvangelistTest
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Test;

use Kola\OpenSourceEvangelist\Evangelist;
use Kola\OpenSourceEvangelist\Helper\EvangelistFetch;

class EvangelistTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Hold array of dummy data to be used for the test
     *
     * @return array Set of dummy data for the test
     */
    public function supplyUsername()
    {
        return [
            ['andela-vdugeri', 'Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist.'],
            ['andela-doladosu', 'Keep Up The Good Work, I crown you Associate Evangelist.'],
            ['andela-oadebayo', 'Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place.'],
            ['andela-kerinoso', 'So sad!!! You have a very low contribution to open-source. You need ' . (5 - EvangelistFetch::getNumOfPublicRepos('andela-kerinoso')) . ' of your work left to be added to your public repo to become a Junior Evangelist.'],
            ['', 'GitHub username cannot be blank!!!'],
            ['njfjffojirfjnknv', 'Sorry, njfjffojirfjnknv is not registered on GitHub!']
        ];
    }

    /**
     * Test for the equality between the expected values and actual values returned by function getStatus()
     *
     * @param        string $username Username of an individual to be searched for on GitHub
     * @param        string $response Expected category response
     * @dataProvider supplyUsername
     */
    public function testGetStatusOfEvangelist($username, $response)
    {
        $status = new Evangelist($username);
        
        $this->assertEquals($response, $status->getStatus());
    }
}
