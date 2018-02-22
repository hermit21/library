<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Hash;
use AppBundle\Entity\Users;
use AppBundle\Entity\Books;
use AppBundle\Entity\Validate;
use AppBundle\Entity\Tables;

class UserController extends Controller
{

  /**
   * @Route("/account", name="account")
   */
  public function accountAction(Request $request)
  {
    $session = new Session();
    if(!empty($session->get('username')))
    {

      if($request->request->get('search'))
      {
        // Get value from ours form
        $title = Hash::escape($request->request->get('title'));
        $author = Hash::escape($request->request->get('author'));

        if($author || $title)
        {
          // one of this element or two exist;
          echo "<script type='text/javascript'>alert('OK');</script>";
          return $this->redirectToRoute('book', array('title' => $title, 'author' => $author));
        }
        else {
          echo "<script type='text/javascript'>alert('One of This Field must be not empty');</script>";
        }

      }
    }
    else {
      return $this->redirectToRoute('homepage');
    }
    return $this->render('account/accounts.html.twig');
  }


  /**
   * @Route("/account/my_account", name="my_account")
   */
  public function myaccountAction(Request $request)
  {
    $session = new Session();
    if(!empty($session->get('username')))
    {

    }
    else {
      return $this->redirectToRoute('homepage');
    }
    return $this->render('account/myaccount.html.twig');
  }

  /**
   * @Route("/account/myrequest/book_number", name="myrequest")
   */
  public function myrequestAction(Request $request, $book_number)
  {
    $session = new Session();
    if(!empty($session->get('username')))
    {
      $book = new Books();

      $em_book = $this->getDoctrine()->getManager();

      $book = $$em_book->getRepository('AppBundle:Books')->findBy(
        array(
          'NumberID' => $book_number
      ));

      if(!empty($book))
      {
        $book->setRented('rented');
        $em_book->flush();

        echo "<script type='taxt/javascript'>alert('Book has been added');</script>";
      }
      else {
        //number book not exist
      }
    }
    else {
      return $this->redirectToRoute('homepage');
    }
    return $this->render('account/myrequest.html.twig');
  }

  /**
   * @Route("/account/prolongue", name="prolongue")
   */
  public function prolongueAction(Request $request)
  {
    $session = new Session();
    $date = date_create('now');
    date_add($date, date_interval_create_from_date_string("40 day"));
    echo date_format($date, 'Y-m-d');
    if(!empty($session->get('username')))
    {
      $table = new Tables();
      $em_table = $this->getDoctrine()->getManager();

      //take all books from user
      $table = $em_table->getRepository('AppBundle:Tables')->findBy(
        array(
            'userId' => $session->get('username')
      ));

      $book_user = array();
      //find books in user
      foreach ($table as $key ) {
        $book_user[] = $this->getDoctrine()->getRepository('AppBundle:Books')->findBy(
          array(
            'NumberID' => $$table[$key]->getBookNumberID()
        ));

        $book = new Books();
        $em_user_book = $this->getDoctrine()->getManager();

        
      }

    }
    else {
      return $this->redirectToRoute('homepage');
    }
    return $this->render('account/prolongue.html.twig',array(
      'book_user' => $book_user
    ));
  }

  /**
   * @Route("/account/change_password", name="change_password")
   */
  public function change_passwordAction(Request $request)
  {
    $session = new Session();
    if(!empty($session->get('username')))
    {
      if($request->request->get('changepassword')) {

        $password = Hash::escape($request->request->get('oldpassword'));
        $newpassword = Hash::escape($request->request->get('newpassword'));
        $repeatnewpassword = Hash::escape($request->request->get('repeatnewpassword'));

        if(Validate::validMatch($newpassword, $repeatnewpassword))  {

          $users = new Users();

          $em_user = $this->getDoctrine()->getManager();

          $id_user = $session->get('username');

          $users = $em_user->getRepository('AppBundle:Users')->find($id_user);

          $salt = $users->getSalt();
          $hash_passowrd = Hash::makeHash($password, $salt);

          if($hash_passowrd == $users->getPassword())
          {
            $new_salt = Hash::createSalt(10);
            $hash_new_password = Hash::makeHash($newpassword,$new_salt);

            $users->setPassword($hash_new_password);
            $users->setSalt($new_salt);

            $em_user->flush();
          }
          else {
            echo "<script type='text/javascript'>alert('Current Password don't match);</script>";
          }
        }
        else {
          echo "<script type='text/javascript'>alert('New passwords don't match);</script>";
        }


      }
    }
    else {
      return $this->redirectToRoute('homepage');
    }
    return $this->render('account/changepassword.html.twig');
  }

}
