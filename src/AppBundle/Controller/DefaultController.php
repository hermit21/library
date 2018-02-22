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

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
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

        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {

        if($request->request->get('login'))
        {
          $username = Hash::escape($request->request->get('username_login'));
          $password = Hash::escape($request->request->get('password_login'));
          if(!empty($username) && !empty($password))
          {

            $em_user = $this->getDoctrine()->getRepository('AppBundle:Users')->findBy(
              array(
                'username' => $username
            ));

            if(!empty($em_user))
            {
              $salt = $em_user[0]->getSalt();
              $hash_password = Hash::makeHash($password, $salt);

              if($hash_password === $em_user[0]->getPassword())
              {
                $session = new Session();
                $session->set('username', $em_user[0]->getId());
                return $this->redirectToRoute('account');
              }
              else {
                echo "<script type='text/javascript'>alert('Username or password is incorrect')</script>";
              }
            }
            else {
              echo "<script type='text/javascript'>alert('Username or password is incorrect')</script>";
            }

          }
          else {
            echo "<script type='text/javascript'>alert('The field Username and Password must be not empty');</script>";
          }
        }

        return $this->render('default/login_register.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {

        if($request->request->get('register'))
        {
          $firstname = Hash::escape($request->request->get('firstname'));
          $lastname = Hash::escape($request->request->get('lastname'));
          $username = Hash::escape($request->request->get('username'));
          $password = Hash::escape($request->request->get('password'));
          $repeatpassword = Hash::escape($request->request->get('repeatpassword'));

          if(Validate::validString($firstname, 3, 15))
          {

            if(Validate::validString($lastname, 3, 15))
            {

              if(Validate::validValues($username, 5, 40))
              {

                if(Validate::validValues($password, 6, 120))
                {

                  if(Validate::validMatch($password, $repeatpassword))
                  {

                    $em = $this->getDoctrine()->getRepository('AppBundle:Users')->findBy(
                      array('username' => $username)
                    );

                    if($em)
                    {
                      echo "<script type='text/javascript'>alert('That username is alredy exist');</script>";
                    }
                    else {

                      $salt = Hash::createSalt(10);
                      $hash_password = Hash::makeHash($password, $salt);

                      $user = new Users;

                      $em_user = $this->getDoctrine()->getManager();

                      $user->setFirstName($firstname);
                      $user->setLastName($lastname);
                      $user->setUsername($username);
                      $user->setPassword($hash_password);
                      $user->setSalt($salt);

                      $em_user->persist($user);
                      $em_user->flush();
                    }

                  }
                  else {
                    echo "<script type='text/javascript'>alert('The passwords don't match  Please check it ');</script>";
                  }

                }
                else {
                  echo "<script type='text/javascript'>alert('The Password is not correct! Please check it ');</script>";
                }

              }
              else {
                echo "<script type='text/javascript'>alert('The Username is not correct! Please check it ');</script>";
              }

            }
            else {
              echo "<script type='text/javascript'>alert('The Last Name is not correct! Please check it ');</script>";
            }

          }
          else {
            echo "<script type='text/javascript'>alert('The First Name is not correct! Please check it ');</script>";
          }
        }

        return $this->render('default/login_register.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }




}
