<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Dinosaur
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    public $length = 0;

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     *
     * @return Dinosaur
     */
    public function setLength(int $length): Dinosaur
    {
        $this->length = $length;

        return $this;
    }


}
