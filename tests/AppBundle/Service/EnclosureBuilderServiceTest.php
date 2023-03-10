<?php

namespace Tests\AppBundle\Service;

use AppBundle\Entity\Dinosaur;
use AppBundle\Factory\DinosaurFactory;
use AppBundle\Service\EnclosureBuilderService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use AppBundle\Entity\Enclosure;

class EnclosureBuilderServiceTest extends TestCase
{
    public function testItBuildsAndPersistsEnclosure()
    {
        $em = $this->createMock(EntityManagerInterface::class);
        $em->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf(Enclosure::class));

        $em->expects($this->atLeastOnce())
            ->method('flush');

        $dinoFactory = $this->createMock(DinosaurFactory::class);

        $dinoFactory->expects($this->exactly(2))
            ->method('growFromSpecification')
            ->willReturn(new Dinosaur())
            ->with($this->isType('string'));

        $builder = new EnclosureBuilderService($em, $dinoFactory);
        $enclosure = $builder->buildEnclosure(1, 2);

        $this->assertCount(1, $enclosure->getSecurities());
        $this->assertCount(2, $enclosure->getDinosaurs());
    }
}
