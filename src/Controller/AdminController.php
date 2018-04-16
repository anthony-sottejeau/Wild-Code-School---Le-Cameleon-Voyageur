<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\PlaceManager;

/**
 * Class ItemController
 *
 */
class AdminController extends AbstractController
{
    /**
     * Display item listing
     * @return string
     */
    public function index()
    {
        $infos = $this->getAdminInfos();
        return $this->twig->render('admin/index.html.twig',['places'=>$infos['places']]);
    }


    /**
     * @return array
     * Recuperation de toutes les infos en base pour l'affichage général
     */
    public function getAdminInfos() :array
    {
        $placeManager = new PlaceManager();
        $places = $placeManager->selectAll();
        return (['places'=>$places]);
    }
}
