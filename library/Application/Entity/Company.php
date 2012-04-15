<?php

namespace Entity;
/**
 * Description of Company
 *
 * @author Andrew Joseph <andrew at aljweb.com>
 * @Entity
 */
class Company
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
    
    /**
     * @ManyToMany(targetEntity="Products", inversedBy="companies")
     * @JoinTable(name="companies_products")
     **/
    private $products;
    
    /**
     * @OneToMany(targetEntity="Company", mappedBy="parent")
     **/
    private $subsidiaries;

    /**
     * @ManyToOne(targetEntity="Company", inversedBy="children")
     * @JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    private $parent;
    
    public function __construct() {
        $this->subsidiaries = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }    
}
