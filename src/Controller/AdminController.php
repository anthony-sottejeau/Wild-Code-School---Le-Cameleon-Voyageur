<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;


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
        return $this->twig->render('admin/index.html.twig');
    }
}
