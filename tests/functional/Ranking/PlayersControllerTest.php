<?php

namespace App\Tests\Ranking;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlayersControllerTest extends WebTestCase
{
    public function testGettingChampionships()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/players/1');

        $players = json_decode($client->getResponse()->getContent());

        $this->assertInternalType('array', $players);
        $this->assertCount(10, $players);
    }

    public function testChampionshipProperties()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/players/1');

        $player = json_decode($client->getResponse()->getContent())[9];

        $this->assertObjectHasAttribute('id', $player);
        $this->assertObjectHasAttribute('name', $player);
        $this->assertObjectHasAttribute('slug', $player);
        $this->assertObjectHasAttribute('rank', $player);
        $this->assertObjectHasAttribute('points', $player);
        $this->assertObjectHasAttribute('extraPoints', $player);
        $this->assertObjectHasAttribute('totalPoints', $player);

        $this->assertSame(10, $player->id);
        $this->assertEquals('Micha A', $player->name);
        $this->assertEquals('micha-a', $player->slug);
        $this->assertNull($player->rank);
        $this->assertNull($player->points);
        $this->assertNull($player->extraPoints);
        $this->assertNull($player->totalPoints);
    }


}
