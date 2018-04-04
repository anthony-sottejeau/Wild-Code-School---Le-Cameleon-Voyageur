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
use Model\PlaceManager;

/**
 * Class ItemController
 *
 */
class PlaceController extends AbstractController
{
    /**
     * Display item listing
     * @return string
     */
    public function index()
    {
        $placesManager = new PlaceManager();
        $places = $placesManager->selectAll();
        return $this->twig->render('places/list.html.twig', ['places'=>$places]);
    }
}
