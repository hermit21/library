<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tables
 *
 * @ORM\Table(name="tables")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TablesRepository")
 */
class Tables
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
     * @var int
     *
     * @ORM\Column(name="book_id", type="integer")
     */
    private $bookId;

    /**
     * @var int
     *
     * @ORM\Column(name="book_numberID", type="integer")
     */
    private $bookNumberID;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;


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
     * Set bookId
     *
     * @param integer $bookId
     *
     * @return Tables
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;

        return $this;
    }

    /**
     * Get bookId
     *
     * @return int
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * Set bookNumberID
     *
     * @param integer $bookNumberID
     *
     * @return Tables
     */
    public function setBookNumberID($bookNumberID)
    {
        $this->bookNumberID = $bookNumberID;

        return $this;
    }

    /**
     * Get bookNumberID
     *
     * @return int
     */
    public function getBookNumberID()
    {
        return $this->bookNumberID;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Tables
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }
}

