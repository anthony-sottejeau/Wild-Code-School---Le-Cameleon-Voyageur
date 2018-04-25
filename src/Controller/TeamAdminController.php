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
        $infos1 = $teamManager->selectFirstWithLimit();
        $infos2 = $teamManager->selectFirstWithLimit(1,2);
        $notification = $_SESSION['notification'] ?? null;
        session_destroy();
        return $this->twig->render('admin/team.html.twig', ['team1'=>$infos1,'team2'=>$infos2,'notification'=>$notification]);
    }

    public function edit()
    {
        session_start();
        $teamManager = new TeamManager();
        if (!empty($_POST))
        {
            if ($_POST['personne'] == 'personne1')
            {
                foreach ($_POST as $key => $value)
                {
                    if($key!="personne")
                    {
                        $cleanPost[$key] = trim($value);
                    }
                }
                try
                {
                    foreach ($cleanPost as $key => $value)
                    {
                        $teamManager->update(1, [$key => $cleanPost[$key]]);
                    }
                }
                catch (\Exception $e)
                {
                    $notification = ['type'=>'danger','message'=>$e->getMessage()];
                }
             }
            }
            if ($_POST['personne'] == 'personne2')
            {
                foreach ($_POST as $key => $value)
                {
                    if($key!="personne")
                    {
                        $cleanPost[$key] = trim($value);
                    }
                }
                try {
                    foreach ($cleanPost as $key => $value)
                    {
                        $teamManager->update(2, [$key => $cleanPost[$key]]);
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
