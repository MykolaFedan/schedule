<?php

namespace MLBBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testGetremote()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getRemote');
    }

    public function testApi()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api');
    }

    public function testCeatetable()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ceatetable');
    }

}
