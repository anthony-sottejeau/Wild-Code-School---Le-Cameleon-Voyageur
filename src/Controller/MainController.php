<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\TeamMateManager;


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
        $teamMates = $this->getTeam();
        return $this->twig->render('main/index.html.twig', ['TeamMate'=>$teamMates]);
    }

    public function getTeam()
    {
        $teamManager = new TeamMateManager();
        $teamMates = $teamManager->selectAll();

        return $teamMates;
    }
}
