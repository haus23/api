<?php

namespace App\Tests\Ranking;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RoundsControllerTest extends WebTestCase
{
    public function testGettingRounds()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/rounds/1');

        $rounds = json_decode($client->getResponse()->getContent());

        $this->assertInternalType('array', $rounds);
        $this->assertCount(2, $rounds);
    }

    public function testRoundProperties()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/rounds/1');

        $round = json_decode($client->getResponse()->getContent())[0];

        $this->assertObjectHasAttribute('id', $round);
        $this->assertObjectHasAttribute('nr', $round);
        $this->assertObjectHasAttribute('matchCount', $round);

        $this->assertSame(1, $round->id);
        $this->assertSame(1, $round->nr);
        $this->assertSame(5, $round->matchCount);
    }


}
