<?php

namespace Application\Entity;
/**
 * Description of Purchase
 *
 * @author Andrew Joseph <andrew at aljweb.com>
 * @Entity
 */
class Purchase
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
