<?php

use League\OpenSourceEvangelist\Evangelist;
use \League\OpenSourceEvangelist\Helper\EvangelistFetch;

class EvangelistTest extends \PHPUnit_Framework_TestCase
{
    public function Inputs()
    {
        return [
            ['andela-ooduye', 'Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist.'],
            ['andela-amaborukoje', 'Keep Up The Good Work, I crown you Associate Evangelist.'],
            ['andela-smartins', 'Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place.'],
            ['andela-kerinoso', 'So sad!!! You have a very low contribution to open-source. You need ' . (5 - EvangelistFetch::getNumOfPublicRepos('andela-kerinoso')) . ' of your work left to be added to your public repo to become a Junior Evangelist.'],
            ['', 'GitHub username cannot be blank!!!'],
            ['njfjffojirfjnknv', 'Sorry, njfjffojirfjnknv is not registered on GitHub!']
        ];
    }

    /**
     * @dataProvider Inputs
     */
    public function testGetStatusOfEvangelist($username, $response)
    {
        $status = new Evangelist($username);

        $this->assertEquals($response, $status->getStatus());
    }
}
