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
        return $this->twig->render('main/index.html.twig', ['header'=> $header]);
    }

    public function getHeader()
    {
        $headerManager = new HeaderManager();
        $header = $headerManager->selectAll();
        return $header;
    }
}
