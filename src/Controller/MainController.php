<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

/**
 * Class ItemController
 *
 */
class MainController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function index()
    {
        return $this->getAlert();
        return $this->twig->render('main/index.html.twig');
    }

    public function getAlert()
   {
       $alertManager = new AlertManager();
       $alert = $alertManager->selectAll();
       return $alert;
     }
}
