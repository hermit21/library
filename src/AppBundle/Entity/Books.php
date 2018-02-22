<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BooksRepository")
 */
class Books
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=40)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Author", type="string", length=40)
     */
    private $author;

    /**
     * @var int
     *
     * @ORM\Column(name="NumberID", type="integer")
     */
    private $numberID;

    /**
     * @var string
     *
     * @ORM\Column(name="Rented", type="string", length=15)
     */
    private $rented;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Books
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Books
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set numberID
     *
     * @param integer $numberID
     *
     * @return Books
     */
    public function setNumberID($numberID)
    {
        $this->numberID = $numberID;

        return $this;
    }

    /**
     * Get numberID
     *
     * @return int
     */
    public function getNumberID()
    {
        return $this->numberID;
    }

    /**
     * Set rented
     *
     * @param string $rented
     *
     * @return Books
     */
    public function setRented($rented)
    {
        $this->rented = $rented;

        return $this;
    }

    /**
     * Get rented
     *
     * @return string
     */
    public function getRented()
    {
        return $this->rented;
    }
}

