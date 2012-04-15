<?php

namespace Entity;
/**
 * Description of Category
 *
 * @author Andrew Joseph <andrew at aljweb.com>
 * @Entity
 */
class Category
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
