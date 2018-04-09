<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\TeamManager;

class MainController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */

    public function index()
    {
        $teamManager = new TeamManager();
        $team = $teamManager->selectAll();
        return $this->twig->render('main/index.html.twig', ['Team'=>$team]);
    }
}
