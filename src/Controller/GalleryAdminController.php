<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 18/04/18
 * Time: 10:17
 */

namespace Controller;

use Model\PictureManager;

class GalleryAdminController extends AbstractController
{
    private const MIME_AUTHORIZED = ['image/png', 'image/gif', 'image/jpeg'];
    private const DIRECTORY = 'gallery/';

    public function index()
    {
        session_start();
        $pictureManager = new PictureManager();
        $pictures = $pictureManager->selectAll();
        $notification = $_SESSION['notification'] ?? null;
        session_destroy();
        return $this->twig->render('admin/gallery.html.twig',
            ['pictures'=>$pictures,'notification'=>$notification]);
    }

    public function insert()
    {
        session_start();
        if(isset($_POST['submit'])) {
            if(in_array($_FILES['file']['type'],self::MIME_AUTHORIZED)) {
                $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $extension;
                $filePath = "assets/images/" . self::DIRECTORY . $filename;
                move_uploaded_file($_FILES['file']['tmp_name'], '../public/' . $filePath);
                $pictureManager = new PictureManager();
                $pictureManager->insert([
                    'path'=>$filePath,
                    'alt'=>$_POST['alt'],
                ]);
            } else {
                $notification = ['type'=>'danger', 'message'=>"Vous devez choisir une image [ png, jpeg, gif ]"];
            }
        }
        $_SESSION['notification']=$notification;
        header('Location:/admin/gallery');
        exit;
    }

    public function delete() {
        session_start();
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            $pictureManager = new PictureManager();
            $picture = $pictureManager->selectOneById($id);
            if (empty($picture)) {
                $notification = ['type' => 'danger', 'message' => "L'image n'existe pas"];
            } else {
                unlink('../public/' . $picture->getPath());
                $pictureManager->delete($id);
                $notification = ['type' => 'success', 'message' => "Suppression de l'image réussi"];
            }
            $_SESSION['notification'] = $notification;
            header('Location:/admin/gallery');
            exit;
        }
    }
}