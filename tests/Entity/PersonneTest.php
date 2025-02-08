<?php

namespace App\Tests\Entity;

use App\Entity\Personne;
use PHPUnit\Framework\TestCase;

class PersonneTest extends TestCase
{

    private Personne $personne;
    //before each test
    protected function setUp(): void
    {
        $this->personne = new Personne('Ratovobodo', 'Nicka', 20);
    }
    public function testGetName(): void
    {
        $this->assertEquals('Ratovobodo', $this->personne->getName());
    }

    public function testGetPrenom(): void
    {
        $this->assertEquals('Nicka', $this->personne->getPrenom());
    }

    public function testGetAge(): void
    {
        $this->assertEquals(20, $this->personne->getAge());
    }
}