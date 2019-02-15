<?php

namespace App\Tests\Ranking;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MatchesControllerTest extends WebTestCase
{
    public function testGettingMatches()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/matches/1');

        $matches = json_decode($client->getResponse()->getContent());

        $this->assertInternalType('array', $matches);
        $this->assertCount(3, $matches);
    }

    public function testMatchProperties()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/matches/1');

        $matches = json_decode($client->getResponse()->getContent());
        $match = $matches[0];

        $this->assertObjectHasAttribute('id', $match);
        $this->assertObjectHasAttribute('roundId', $match);
        $this->assertObjectHasAttribute('nr', $match);
        $this->assertObjectHasAttribute('league', $match);
        $this->assertObjectHasAttribute('matchDay', $match);
        $this->assertObjectHasAttribute('fixture', $match);
        $this->assertObjectHasAttribute('topMatch', $match);
        $this->assertObjectHasAttribute('canceled', $match);
        $this->assertObjectHasAttribute('result', $match);
        $this->assertObjectHasAttribute('points', $match);

        $this->assertSame(1, $match->id);
        $this->assertSame(1, $match->roundId);
        $this->assertSame(1, $match->nr);
        $this->assertEquals('BL', $match->league);
        $this->assertEquals('2002-08-10', $match->matchDay);
        $this->assertSame(null, $matches[2]->matchDay);
        $this->assertEquals('Energie-Leverkusen', $match->fixture);
        $this->assertSame(false, $match->topMatch);
        $this->assertSame(false, $match->canceled);
        $this->assertEquals('1:1', $match->result);
        $this->assertSame(4, $match->points);
    }


}
