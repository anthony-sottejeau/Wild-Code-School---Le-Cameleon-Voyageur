<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\SliderManager;

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
        $sliderManager = new SliderManager();
        $slider = $sliderManager->selectAll();
        return $this->twig->render('main/index.html.twig', ['slider'=> $slider]);
    }

}
