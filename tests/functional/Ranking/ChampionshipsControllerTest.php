<?php

namespace App\Tests\Ranking;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChampionshipsControllerTest extends WebTestCase
{
    public function testGettingChampionships()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/championships');

        $championships = json_decode($client->getResponse()->getContent());

        $this->assertInternalType('array', $championships);
        $this->assertCount(2, $championships);
    }

    public function testChampionshipProperties()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/ranking/championships');

        $championship = json_decode($client->getResponse()->getContent())[1];

        $this->assertObjectHasAttribute('id', $championship);
        $this->assertObjectHasAttribute('name', $championship);
        $this->assertObjectHasAttribute('slug', $championship);
        $this->assertObjectHasAttribute('completed', $championship);

        $this->assertSame(1, $championship->id);
        $this->assertEquals('Hinrunde 2002/03', $championship->name);
        $this->assertEquals('hr0203', $championship->slug);
        $this->assertSame(true, $championship->completed);
    }


}
