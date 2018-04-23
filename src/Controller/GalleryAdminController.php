<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 18/04/18
 * Time: 10:17
 */

namespace Controller;

use Model\PictureManager;
use Structures\File;
use Structures\Notification;

class GalleryAdminController extends AbstractController
{
    public function index()
    {
        $notification = (new notification())->getNotification('notification');
        $pictureManager = new PictureManager();
        $pictures = $pictureManager->selectAll();
        return $this->twig->render('admin/gallery.html.twig',
            ['pictures'=>$pictures, 'notification' => $notification]);
    }

    public function insert()
    {
        if(isset($_POST['submit'])) {
            $file = new File('gallery', new PictureManager());
            $file->add($_FILES);
        }
        header('Location:/admin/gallery');
        exit;
    }

    public function delete()
    {
        if(isset($_POST['id'])) {
            $file = new File('gallery', new PictureManager());
            $file->delete($_POST['id']);
            header('Location:/admin/gallery');
            exit;
        }
    }
}