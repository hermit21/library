<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 */
class Users
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
     * @ORM\Column(name="FirstName", type="string", length=15)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=15)
     */
    private $lastName;



    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=40)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Salt", type="string", length=64)
     */
    private $salt;



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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Users
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Users
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Users
     */
    public function setUsername($username)
    {
      $this->username = $username;

      return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
      return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
      $this->password = $password;

      return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
      return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Users
     */
    public function setSalt($salt)
    {
      $this->salt = $salt;

      return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
      return $this->salt;
    }
}
