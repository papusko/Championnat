<?php
// src/AppBundle/Controller/DefaultController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;

class AccueilController extends Controller
{
    

        
    /**     *
     * @Route("/", name="accueil")
     */
    public function listeAction()
    {
          return $this->render('base.html.twig');
        
        
        
    }


    


    
}
?>