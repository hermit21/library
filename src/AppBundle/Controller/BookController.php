<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Hash;
use AppBundle\Entity\Users;
use AppBundle\Entity\Books;
use AppBundle\Entity\Validate;

class BookController extends Controller
{

  /**
   * @Route("/book", name="book")
   */
  public function bookAction(Request $request)
  {

      $title = Hash::escape($_GET['title']);
      $author = Hash::escape($_GET['author']);

      $session = new Session();

      if($title)
      {
        $em_book = $this->getDoctrine()->getRepository('AppBundle:Books')->findBy(
          array('title' => $title)
        );
        if($em_book){

        }
        else {
          //The book title don't exist;
        }
      }
      else if($author)
      {
        $em_book = $this->getDoctrine()->getRepository('AppBundle:Books')->findBy(
          array('author' => $author)
        );
        if($em_book)
        {
          //author exist;

        }
        else {
          // The author not exist;
        }
      }
      else if($author && $title)
      {
        $em_book = $this->getDoctrine()->getRepository('AppBundle:Books')->findBy(
          array(
            'author' => $author,
            'title' => $title
        ));
        if($em_book)
        {
          //exist
        }
        else {
          //don't exist;
        }

      }
      else {
        return $this->redirectToRoute('homepage');
      }



      return $this->render('default/books.html.twig', array(
        'books' => $em_book,
        'session' => $session->get('username')
      ));
  }

  /**
   * @Route("/book/id", name="saved")
   */
   public function savedAction(Request $request, $id) {

     $session = new Session();

     $book = new Books();
     $em_book = $this->getDoctrine()->getManager();

     $book = $em_book->getRepository('AppBundle:Books')->findBy(
       array(
          'NumberID' => $id
      ));

     if(!empty($book) && !empty($session->get('username'))) {


        $table = new Tables();

        $em_table = $this->getDoctrine()->getManager();

        $table = $em_table->getRepository('AppBundle:Tables')->findBy(
          array(
            'book_numberID' => $id
        ));

        if(!empty($table))  {
            $table->setBookId($em_book[0]->getId());
            $table->setBookNumberID($id);
            $table->setUserId($session->get('username'));

            $em_table->persist($table);
            $em_table->flush();

            $date = date_create('now');
            date_add($date, date_interval_create_from_date_string("40 day"));
            $new_date = date_format($date, 'Y-m-d');

            $book->setRented($new_date);

            $em_book->flush();

            return $this->redirectToRoute('account');
        } else {
            echo "<script type='text/javascript'>alert('This book is rented')";
        }



     } else {
        echo "<script type='text/javascript'>alert('This book not exist')</script>";
     }



     return $this->render('default/books.html.twig', array(
       'books' => $book,
       'session' => $session->get('username')
     ));
   }
}
