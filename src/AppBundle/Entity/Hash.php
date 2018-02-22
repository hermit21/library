<?php

namespace AppBundle\Entity;

/**
 *
 */
class Hash
{

  public function makeHash($password, $salt)
  {
    return hash('sha512', $password.$salt);
  }

  public function createSalt($length)
  {
    $letter = "qwertyuiop[]asdfghjkl;:&*~zxcvbnm,.<>?/1234567890-_+=|\!@#$%^";
    $salt = '';
    for($i = 0; $i < $length; $i++)
    {
      $rand = rand(0, strlen($letter) - 1);
      $salt.= substr($letter, $rand, 1);
    }
    return hash('sha256', $salt);
  }

  public function escape($value)
  {
    return htmlspecialchars(trim($value), ENT_QUOTES, 'utf-8');
  }

}
