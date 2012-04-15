<?php

namespace Application\Entity;
/**
 * Description of Item
 *
 * @author Andrew Joseph <andrew at aljweb.com>
 * @Entity
 */
class Item
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }    
}
