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
        $infos1 = $teamManager->selectOneById(1);
        $infos2 = $teamManager->selectOneById(2);
        $notification = $_SESSION['notification'] ?? null;
        session_destroy();
        return $this->twig->render('admin/team.html.twig', ['team1'=>$infos1,'team2'=>$infos2,'notification'=>$notification]);
    }

    public function edit()
    {
        session_start();
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $cleanPost[$key] = trim($value);
                if(!empty($cleanPost[$key])){
                    $allPost[$key]=$value;
                }
            }
            $teamManager = new TeamManager();
            $extension1 = pathinfo($_FILES['picture1']['name'], PATHINFO_EXTENSION);
            $extension2 = pathinfo($_FILES['picture2']['name'], PATHINFO_EXTENSION);
            $filename1 = uniqid() . '.' . $extension1;
            $filename2 = uniqid() . '.' . $extension2;
            $photos =['image/png', 'image/gif', 'image/jpeg','image/jpg'];
            $filePath = "../public/assets/images/";
            $notification = ['type'=>'success','message'=>'L\'enregistrement s\'est bien effectué'];
            if (!empty($allPost)) {
                try {
                    switch($allPost)
                    {
                        case (isset($allPost['name1'])):
                            $teamManager->update(1, [
                                'name'=>$allPost['name1']]);
                        case (isset($allPost['pictureDescription1'])):
                            $teamManager->update(1, [
                                'pictureDescription'=>$allPost['pictureDescription1']]);
                        case (isset($allPost['description1'])):
                            $teamManager->update(1, [
                                'description'=>$allPost['description1']]);
                        case (isset($allPost['name2'])):
                            $teamManager->update(2, [
                                'name'=>$allPost['name2']]);
                        case (isset($allPost['pictureDescription2'])):
                            $teamManager->update(2, [
                                'pictureDescription'=>$allPost['pictureDescription2']]);
                        case (isset($allPost['description2'])):
                            $teamManager->update(2, [
                                'description'=>$allPost['description2']]);
                    }
                    if($_FILES['picture1']["error"]==0){
                        if(in_array($_FILES['picture1']['type'],$photos)) {
                            move_uploaded_file($_FILES['picture1']['tmp_name'],$filePath.$filename1);
                            $teamManager->update(1,['picture'=>'/assets/images/'.$filename1]);
                        }
                        else {
                            $notification = ['type'=>'danger', 'message'=>"Vous devez choisir une image [ png, jpeg, gif ]"];
                        }
                    }
                    if($_FILES['picture2']["error"]==0){
                        if(in_array($_FILES['picture2']['type'],$photos)){
                            move_uploaded_file($_FILES['picture2']['tmp_name'],$filePath.$filename2);
                            $teamManager->update(2,['picture'=>'/assets/images/'.$filename2]);
                        }
                        else {
                            $notification = ['type'=>'danger', 'message'=>"Vous devez choisir une image [ png, jpeg, gif ]"];
                        }
                    }
                } catch (\Exception $e) {
                    $notification = ['type'=>'danger','message'=>$e->getMessage()];
                }
            } else {

                $notification = ['type' => 'danger', 'message' => 'Les coordonnées ne sont pas valides'];
            }
            $_SESSION['notification']=$notification;
        }

        header('location:/admin/team');
        exit();
    }
}
