<?php

namespace AppBundle\Entity;

class Validate
{

  public function validString($value, $min, $max)
  {
    if( strlen($value) >= $min && strlen($value) <= $max )
    {
      $characters = "abcdefghijklmnoprstuvwzźxćśńłóżq";


      for($i = 0; $i < strlen($value); $i++)
      {
          $opt = strpos($characters, substr($value, $i));
      }

      if($opt === FALSE)
      {
        return false;
      }
      else {
        return true;
      }
    }
    return false;
  }

  public function validValues($value, $min, $max)
  {
    if(strlen($value) >= $min && strlen($value) <= $max )
    {
      return true;
    }
    return false;
  }

  public function validMatch($value1, $value2 )
  {
    if($value1 == $value2)
    {
      return true;
    }
    return false;
  }

}
