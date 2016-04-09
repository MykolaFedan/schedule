<?php

namespace MLBBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class runControllerTest extends WebTestCase
{
    public function testRun()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/run');
    }

}
