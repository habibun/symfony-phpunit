<?php

namespace Tests\AppBundle\Factory;

class DinosaurFactoryTest
{
    public function testItGrowsALargeVelociraptor()
    {
        $factory = new DinosaurFactory();
        $dinosaur = $factory->growVelociraptor(5);
        $this->assertInstanceOf(Dinosaur::class, $dinosaur);
        $this->assertInternalType('string', $dinosaur->getGenus());
        $this->assertSame('Velociraptor', $dinosaur->getGenus());
        $this->assertSame(5, $dinosaur->getLength());
    }

    public function growVelociraptor(int $length): Dinosaur
    {
        $dinosaur = new Dinosaur('Velociraptor', true);
        $dinosaur->setLength($length);
        return $dinosaur;
    }
}
