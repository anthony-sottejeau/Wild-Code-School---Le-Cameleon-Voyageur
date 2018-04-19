<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use http\Exception;
use Model\AlertManager;
use Structures\Notification;
use Structures\Session;

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
        $notification = (new notification())->getNotification('notification');
        $alertManager = new AlertManager();
        $alert = $alertManager->selectFirst();
        return $this->twig->render('admin/header.html.twig',
            ['alert' => $alert,'notification' => $notification]);
    }

    public function editAlert()
    {
        $alertManager = new AlertManager();
        if (!empty($_POST)) {
            $message = trim($_POST['alert']);
            $activated = isset($_POST['activated']);
            $notification = new Notification();
            $notification->setNotification('success', 'L\'enregistrement s\'est bien déroulé');
            try {
                if (strlen($message) > 100) {
                    throw new \Exception('Le message ne doit pas dépasser 100 caractères.');
                }
                $alertManager->update(1, [
                    'alert'=>$message,
                    'activated' => $activated
                ]);
            } catch (\Exception $e) {
                $notification->setNotification('danger', $e->getMessage());
            }
        }
        header('location:/admin/header');
        exit();
    }
}
