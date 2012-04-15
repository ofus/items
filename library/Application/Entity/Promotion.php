<?php

namespace Application\Entity;
/**
 * Description of Promotion
 *
 * @author Andrew Joseph <andrew at aljweb.com>
 * @Entity
 */
class Promotion
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $name;
    
    public function getId()
    {
        return $this->id;
    }    
}
