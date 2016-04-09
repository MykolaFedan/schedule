<?php

namespace MLBBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TableControllerTest extends WebTestCase
{
    public function testTablecreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tableCreate');
    }

}
