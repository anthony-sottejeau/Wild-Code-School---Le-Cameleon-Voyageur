<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\PlaceManager;

/**
 * Class ItemController
 *
 */
class AdminController extends AbstractController
{
    /**
     * Display item listing
     * @return string
     */
    public function index()
    {
        $infos = $this->getAdminInfos();
        return $this->twig->render('admin/index.html.twig',['places'=>$infos['places']]);
    }

    public function placeUpdate()
    {
        $placeManager = new PlaceManager();
        $notification = ['type'=>'success','message'=>'L\'enregistrement s\'est bien effectué'];
        $places = $placeManager->selectAll();
        foreach($places as $day) {
            if (($_POST[$day->getDay().'-adress-12'] != $day->adress_day)
                ||($_POST[$day->getDay().'-adress-19'] != $day->adress_evening)
                ||($_POST[$day->getDay().'-coord-12'] != $day->coord_day)
                ||($_POST[$day->getDay().'-coord-19'] != $day->coord_evening)){
                try {
                    $placeManager->update(['id'=>$day->getId()],[
                        'adress_day'=>$_POST[$day->getDay().'-adress-12'],
                        'coord_day'=>$_POST[$day->getDay().'-coord-12'],
                        'adress_evening'=>$_POST[$day->getDay().'-adress-19'],
                        'coord_evening'=>$_POST[$day->getDay().'-coord-19'],
                        ]);
                }catch (\Exception $e) {
                    $notification = ['type'=>'danger','message'=>$e->getMessage()];
                }
            }

        }
        $infos = $this->getAdminInfos();
        return $this->twig->render('admin/index.html.twig',[
            'notification'=>$notification,
            'places'=>$infos['places'],
        ]);

    }

    /**
     * @return array
     * Recuperation de toutes les infos en base pour l'affichage général
     */
    public function getAdminInfos() :array
    {
        $placeManager = new PlaceManager();
        $places = $placeManager->selectAll();
        return (['places'=>$places]);
    }
}
