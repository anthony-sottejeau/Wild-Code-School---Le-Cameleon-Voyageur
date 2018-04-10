<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;
use Model\CompanyManager;

/**
 * Class ItemController
 */
class MainController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function index()
    {
        $company = $this->getCompany();
        return $this->twig->render('main/index.html.twig', ['company'=>$company]);
    }

    public function getCompany() : array //Concue par damien aidé de anthony
    {
        $companyManager = new CompanyManager();
        $company = $companyManager->selectAll();
        return $company;
    }
}
