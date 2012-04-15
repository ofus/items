<?php

namespace Application\Entity;
/**
 * Description of Order
 *
 * @author Andrew Joseph <andrew at aljweb.com>
 * @Entity
 */
class Order
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
