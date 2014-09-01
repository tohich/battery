<?php

namespace App\BatteryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pack
 */
class Pack
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $count;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \App\BatteryBundle\Entity\Type
     */
    private $type;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return Pack
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Pack
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param \App\BatteryBundle\Entity\Type $type
     * @return Pack
     */
    public function setType(\App\BatteryBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \App\BatteryBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }
}
