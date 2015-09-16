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
//use Kola\OpenSourceEvangelist\Exception\EmptyUsernameException;
//use Kola\OpenSourceEvangelist\Exception\InvalidUsernameException;

class EvangelistFetchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Hold array of dummy data to be used for the test
     *
     * @return array Set of dummy data for the test
     */
    public function Inputs()
    {
        return [
            ['andela-ooduye', 8],
            ['andela-amaborukoje', 17],
            ['andela-smartins', 30],
            ['andela-kerinoso', 3]
        ];
    }

    /**
     * Test for the equality between the expected values and actual values returned by function analyse()
     *
     * @param        string $username Username of an individual to be searched for on GitHub
     * @param        int    $response Expected number of public repositories of the person
     * @dataProvider Inputs
     */
    public function testGetStatusOfEvangelist($username, $response)
    {
        $this->assertEquals($response, EvangelistFetch::getNumOfPublicRepos($username));
    }

//    /**
//     * Test for throw of EmptyUsernameException if the supplied username is empty
//     *
//     * @expectedException EmptyUsernameException
//     */
//    public function testSupplyOfEmptyUsername()
//    {
//        EvangelistFetch::getNumOfPublicRepos('');
//    }

//    /**
//     * Test for throw of InvalidUsernameException if unregistered username on GitHub is supplied
//     *
//     * @expectedException InvalidUsernameException
//     */
//    public function testSupplyOfInvalidUsername()
//    {
//        EvangelistFetch::getNumOfPublicRepos('njfjffojirfjnknv');
//    }
}
