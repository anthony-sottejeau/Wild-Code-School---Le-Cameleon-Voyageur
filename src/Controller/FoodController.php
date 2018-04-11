<?php
/**
 * Created by PhpStorm.
 * User: louise
 * Date: 10/04/18
 * Time: 15:55
 */

namespace Controller;

use Model\AbstractManager;
use Model\FoodManager;

class FoodController extends AbstractController
{
    /**
     * Display item listing
     * @return string
     */
    public function index()
    {
        $foodManager = new FoodManager();
        $foods = $foodManager->selectAllFood();
        $foodCategories = [];
        foreach ($foods as $key=>$value){
            $foodCategories[$value->categoryName][]=$value;
        }
        return $this->twig->render('food/list.html.twig', ['foodCategories'=>$foodCategories]);
    }
}
