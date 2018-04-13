<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\SpotlightManager;
use Model\TeamManager;
use Model\GalleryManager;
use Model\AlertManager;
use Model\SliderManager;


class MainController extends AbstractController
{
    /**
     * Display item listing
     *
     * @return string
     */

    public function index()
    { 
        $spotlightManager = new SpotlightManager();
        $spotlight = $spotlightManager->selectFirst();
        $teamManager = new TeamManager();
        $team = $teamManager->selectAll();
        $galleryManager = new GalleryManager();
        $gallery = $galleryManager->selectLimitDesc(6);
        $alertManager = new AlertManager();
        $alert = $alertManager->selectFirst();
        $sliderManager = new SliderManager();
        $slider = $sliderManager->selectAll();
        return $this->twig->render('main/index.html.twig', [
                'alert' => $alert, 
                'slider' => $slider, 
                'spotlight'=>$spotlight, 
                'team' => $team, 
                'gallery'=>$gallery
             ]
        );
    }
}
