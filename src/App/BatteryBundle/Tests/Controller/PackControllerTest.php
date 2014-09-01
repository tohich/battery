<?php

namespace App\BatteryBundle\Tests\Controller;

use Doctrine\Bundle\DoctrineBundle\Command\DropDatabaseDoctrineCommand;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PackControllerTest extends WebTestCase
{
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/batterypack/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /batterypack/");
        $crawler = $client->click($crawler->selectLink('here')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'app_batterybundle_pack[count]'  => '4',
            'app_batterybundle_pack[type]'  => '1',
            'app_batterybundle_pack[name]'  => 'Test'
        ));
        $client->submit($form);

        $form = $crawler->selectButton('Create')->form(array(
            'app_batterybundle_pack[count]'  => '3',
            'app_batterybundle_pack[type]'  => '2',
            'app_batterybundle_pack[name]'  => 'Test'
        ));
        $client->submit($form);

        $form = $crawler->selectButton('Create')->form(array(
            'app_batterybundle_pack[count]'  => '2',
            'app_batterybundle_pack[type]'  => '3',
            'app_batterybundle_pack[name]'  => 'Test'
        ));
        $client->submit($form);

        $crawler = $client->followRedirect();

        $expectedValues = array(
            'AA' => 4,
            'AAA' => 3,
            'C' => 0,
            'D' => 0
        );
        $crawlerClient = $this;

        $crawler->filter('.records_list > tbody > tr')->each(function($node, $i) use($expectedValues, $crawlerClient) {
            $type  = $node->children()->eq(0)->text();
            $count = $node->children()->eq(1)->text();

            $crawlerClient->assertEquals($expectedValues[$type], $count);
        });
    }
}
