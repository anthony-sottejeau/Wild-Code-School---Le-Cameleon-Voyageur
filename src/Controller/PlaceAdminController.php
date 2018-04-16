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
class PlaceAdminController extends AbstractController
{
    /**
     * Display item listing
     * @return string
     */
    public function index()
    {
        $infos = $this->getAdminInfos();
        return $this->twig->render('admin/index.html.twig',['places'=>$infos['places'],'active'=>'lieux']);
    }

    public function update()
    {
        foreach($_POST as $key => $value) {
            $cleanPost[$key] = trim($value);
        }
        $placeManager = new PlaceManager();
        $notification = ['type'=>'success','message'=>'L\'enregistrement s\'est bien effectué'];
        if (preg_match('/-?[0-9]+.[0-9]+,\s?-?[0-9]+.[0-9]+/',$cleanPost['coord-12'])&&
            preg_match('/-?[0-9]+.[0-9]+,\s?-?[0-9]+.[0-9]+/',$cleanPost['coord-19'])){
            try {
                $placeManager->update($cleanPost['id'],[
                    'adress_day'=>$cleanPost['adress-12'],
                    'coord_day'=>$cleanPost['coord-12'],
                    'adress_evening'=>$cleanPost['adress-19'],
                    'coord_evening'=>$cleanPost['coord-19'],
                ]);
            }catch (\Exception $e) {
                $notification = ['type'=>'danger','message'=>$e->getMessage()];
            }
        } else {
            $notification = ['type'=>'danger','Les coordonnées ne sont pas valides'];
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
