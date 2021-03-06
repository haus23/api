<?php

namespace App\Tests\Ranking;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommonRankingControllerTest extends WebTestCase
{
    /**
     * @dataProvider resourceUrls
     * @param string $url
     */
    public function testSuccessfulJsonResponse(string $url)
    {
        $client = static::createClient();
        $client->request('GET', $url);

        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
        $this->assertJson($response->getContent());

        // Check for CORS headers
        $this->assertTrue($response->headers->has('Access-Control-Allow-Origin'));
        $this->assertEquals('GET', $response->headers->get('Access-Control-Allow-Methods'));
    }

    /**
     * @dataProvider resourceUrls
     * @param string $url
     */
    public function testSuccessfulOptionsRequests(string $url)
    {
        $client = static::createClient();
        $client->request('OPTIONS', $url);

        $response = $client->getResponse();

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEmpty($response->getContent());

        // Check for CORS headers
        $this->assertTrue($response->headers->has('Access-Control-Allow-Origin'));
        $this->assertEquals('GET', $response->headers->get('Access-Control-Allow-Methods'));
    }


    public function resourceUrls() {

        return [
            ['/v1/ranking/championships'],
            ['/v1/ranking/players/1'],
            ['/v1/ranking/rounds/1'],
            ['/v1/ranking/matches/1'],
            ['/v1/ranking/tips/1'],
        ];
    }
}
