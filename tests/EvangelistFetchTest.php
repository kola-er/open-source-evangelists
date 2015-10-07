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
            ['andela-sakande', 7],
            ['andela-doladosu', 17],
            ['andela-oadebayo', 23],
            ['andela-kerinoso', 3]
        ];
    }

    /**
     * Test for the equality between the expected values and actual values returned by function analyse()
     *
     * @param        string $username Username of an individual to be searched for on GitHub
     * @param        int $response Expected number of public repositories
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
    public function supplyEmptyUsername()
    {
        return [
            ['']
        ];
    }

    /**
     * Test for throw of EmptyUsernameException if the supplied username is empty
     *
     * @param        string $username Username of an individual to be searched for on GitHub
     * @dataProvider supplyEmptyUsername
     */
    public function testSupplyOfEmpty($username)
    {
		$this->setExpectedException('Kola\OpenSourceEvangelist\Exception\EmptyUsernameException');
        EvangelistFetch::getNumOfPublicRepos($username);
    }

	/**
	 * Hold array of dummy data to be used for the test
	 *
	 * @return array Set of dummy data for the test
	 */
	public function supplyInvalidUsername()
	{
		return [
            ['njfjffojirfjnknv']
		];
	}

	/**
	 * Test for throw of InvalidUsernameException if the supplied username is invalid
	 *
	 * @param        string $username Username of an individual to be searched for on GitHub
	 * @dataProvider supplyInvalidUsername
	 */
	public function testSupplyOfInvalidUsername($username)
	{
		$this->setExpectedException('Kola\OpenSourceEvangelist\Exception\InvalidUsernameException');
		EvangelistFetch::getNumOfPublicRepos($username);
	}
}
