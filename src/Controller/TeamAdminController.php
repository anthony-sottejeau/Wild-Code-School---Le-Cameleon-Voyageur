<?php
/**
 * Created by PhpStorm.
 * User: ziadoof
 * Date: 19/04/18
 * Time: 16:15
 */

namespace Controller;

use Model\TeamManager;


class TeamAdminController extends AbstractController
{/**
 * Display item listing
 * @return string
 */
    public function index()
    {
        session_start();
        $teamManager = new TeamManager();
        $infos = $teamManager->selectWithLimit(0,2);
        $notification = $_SESSION['notification'] ?? null;
        session_destroy();
        return $this->twig->render('admin/team.html.twig', ['teams'=>$infos,'notification'=>$notification]);
    }
    public function edit()
    {
        session_start();
        $teamManager = new TeamManager();
        if (!empty($_POST))
        {
                foreach ($_POST as $key => $value)
                {
                        $cleanPost[$key] = trim($value);
                }
                try
                {
                    foreach ($cleanPost as $key => $value)
                    {
                        $teamManager->update($cleanPost['id'], [$key => $cleanPost[$key]]);
                    }
                }
                catch (\Exception $e)
                {
                    $notification = ['type'=>'danger','message'=>$e->getMessage()];
                }
             }
        else
        {
            $notification = ['type' => 'danger', 'message' => 'Les coordonnées ne sont pas valides'];
        }
        header('location:/admin/team');
        exit();
    }
}
