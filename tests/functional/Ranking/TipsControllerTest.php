<?php

namespace App\Tests\Ranking;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TipsControllerTest extends WebTestCase
{
    public function testGettingMatches()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/tips/1');

        $tips = json_decode($client->getResponse()->getContent());

        $this->assertInternalType('array', $tips);
        $this->assertCount(2, $tips);
    }

    public function testMatchProperties()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/tips/1');

        $tips = json_decode($client->getResponse()->getContent());
        $tip = $tips[0];

        $this->assertObjectHasAttribute('id', $tip);
        $this->assertObjectHasAttribute('matchId', $tip);
        $this->assertObjectHasAttribute('playerId', $tip);
        $this->assertObjectHasAttribute('result', $tip);
        $this->assertObjectHasAttribute('joker', $tip);
        $this->assertObjectHasAttribute('tipPoints', $tip);
        $this->assertObjectHasAttribute('extraPoints', $tip);
        $this->assertObjectHasAttribute('points', $tip);

        $this->assertSame(1, $tip->id);
        $this->assertSame(1, $tip->matchId);
        $this->assertSame(1, $tip->playerId);
        $this->assertEquals('2:2', $tip->result);
        $this->assertSame(false, $tip->joker);
        $this->assertSame(1, $tip->tipPoints);
        $this->assertSame(0, $tip->extraPoints);
        $this->assertSame(1, $tip->points);
        $this->assertSame(null, $tips[1]->result);
        $this->assertSame(null, $tips[1]->points);
    }


}
