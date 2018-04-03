<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Place;
use Model\PlacesManager;

/**
 * Class ItemController
 *
 */
class PlacesController extends AbstractController
{
    /**
     * Display item listing
     * @return string
     */
    public function index()
    {
        $placesManager = new PlacesManager();
        $places = $placesManager->selectAll();
        return $this->twig->render('main/places.html.twig', ['places'=>$places]);
    }
}
