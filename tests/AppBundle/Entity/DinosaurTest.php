<?php

namespace Tests\AppBundle\Entity;

use AppBundle\Entity\Dinosaur;
use AppBundle\Factory\DinosaurFactory;
use PHPUnit\Framework\TestCase;
class DinosaurTest extends TestCase
{
    public function testSettingLength()
    {
        $dinosaur = new Dinosaur();
        $this->assertSame(0, $dinosaur->getLength());

        $dinosaur->setLength(9);
        $this->assertSame(9, $dinosaur->getLength());
    }

    public function testDinosaurHasNotShrunk()
    {
        $dinosaur = new Dinosaur();
        $dinosaur->setLength(15);

        $this->assertGreaterThan(12, $dinosaur->getLength(), 'Did you put it in the washing machine?');
    }

    public function testReturnsFullSpecificationOfDinosaur()
    {
        $dinosaur = new Dinosaur();
        $this->assertSame(
            'The Unknown non-carnivorous dinosaur is 0 meters long',
            $dinosaur->getSpecification()
        );
    }

    public function testReturnsFullSpecificationForTyrannosaurus()
    {
        $dinosaur = new Dinosaur('Tyrannosaurus', true);
        $dinosaur->setLength(12);
        $this->assertSame(
            'The Tyrannosaurus carnivorous dinosaur is 12 meters long',
            $dinosaur->getSpecification()
        );
    }

    public function testItGrowsALargeVelociraptor()
    {
        $factory = new DinosaurFactory();
        $dinosaur = $factory->growVelociraptor(5);
        $this->assertInstanceOf(Dinosaur::class, $dinosaur);
        $this->assertInternalType('string', $dinosaur->getGenus());
        $this->assertSame('Velociraptor', $dinosaur->getGenus());
        $this->assertSame(5, $dinosaur->getLength());
    }
}
