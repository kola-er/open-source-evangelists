<?php
/**
 * This package tests the EvangelistFetch Helper class.
 *
 * @package Kola\OpenSourceEvangelist\Test\EvangelistTest
 * @author  Kolawole ERINOSO <kola.erinoso@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Kola\OpenSourceEvangelist\Test;

use Kola\OpenSourceEvangelist\Helper\EvangelistFetch;
use \Exception;

class EvangelistFetchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Hold array of dummy data to be used for the test
     *
     * @return array Set of dummy data for the test
     */
    public function supplyValidUsername()
    {
        return [
            ['andela-vdugeri', 5],
            ['andela-doladosu', 12],
            ['andela-oadebayo', 23],
            ['andela-cijeomah', 4]
        ];
    }

    /**
     * Test for the equality between the expected values and actual values returned by function analyse()
	 *
     * @dataProvider supplyValidUsername
     */
    public function testGetStatusOfEvangelist($username, $response)
    {
        $this->assertEquals($response, EvangelistFetch::getNumOfPublicRepos($username));
    }

    /**
     * Hold array of dummy data to be used for the test
     *
     * @return array Set of dummy data for the test
     */
    public function supplyInvalidUsername()
    {
        return [
            [''],
            ['njfjffojirfjnknv']
        ];
    }

    /**
     * Test for throw of Exception if the supplied username is empty or invalid
	 *
     * @dataProvider supplyInvalidUsername
     * @expectedException Exception
     */
    public function testSupplyOfEmptyAndInvalidUsername($username)
    {
        EvangelistFetch::getNumOfPublicRepos($username);
    }
}
