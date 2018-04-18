<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\AlertManager;

/**
 * Class ItemController
 *
 */
class HeaderAdminController extends AbstractController
{
    /**
     * Display item listing
     * @return string
     */
    public function index()
    {
        session_start();
        $alertManager = new AlertManager();
        $alert = $alertManager->selectFirst();
        $notification = $_SESSION['notification'] ?? null;
        session_destroy();
        return $this->twig->render('admin/header.html.twig',
            ['alert' => $alert,'notification'=>$notification]);
    }

    public function editAlert()
    {
        session_start();
        $alertManager = new AlertManager();
        if (!empty($_POST)) {
            $message = trim($_POST['alert']);
            if (isset($_POST['activated'])){
                $activated = true;
            } else {
                $activated = false;
            }
            $notification = ['type'=>'success','message'=>'L\'enregistrement s\'est bien effectué'];

            if (strlen($message) < 100) {
                try {
                    $alertManager->update(1, [
                        'alert'=>$message,
                        'activated' => $activated
                    ]);
                } catch (\Exception $e) {
                    $notification = ['type'=>'danger','message'=>$e->getMessage()];
                }
            } else {
                $notification = ['type' => 'danger', 'message' => 'Le message ne doit pas depasser 100 caractères'];
            }
            $_SESSION['notification']=$notification;
        }
        header('location:/admin/header');
        exit();
    }
}
