<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;
use Model\SpotlightManager; //ds

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
        $spotlight = $this->getSpotlight();//ds
        return $this->twig->render('main/index.html.twig', ['spotlight'=>$spotlight]);//ds
    }

    public function getSpotlight() : array //ds
    {
        $spotlightManager = new SpotlightManager();
        $spotlight = $spotlightManager->selectAll();
        return $spotlight;
    }
}
