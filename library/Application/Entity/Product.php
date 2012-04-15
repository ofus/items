<?php

namespace Application\Entity;
/**
 * Description of Product
 *
 * @author Andrew Joseph <andrew at aljweb.com>
 * @Entity
 */
class Product
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     *
     * @Column(type="string")
     */
    private $UPC;
    
    /**
     * @Column(type="string")
     */
    private $name;
    /**
     * @ManyToMany(targetEntity="Company", inversedBy="products")
     **/
    private $companies;
    
    public function __construct() {
        $this->companies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }
    
    
}
