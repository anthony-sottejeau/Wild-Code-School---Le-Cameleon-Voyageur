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
 *
 */
class CompanyAdminController extends AbstractController
{
    /**
     * Display item listing
     * @return string
     */
    public function index()
    {
        $companyManager = new CompanyManager();
        $info = $companyManager->selectFirst();
        return $this->twig->render('admin/company.html.twig', ['company' => $info]);
    }

    public function edit()
    {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $cleanPost[$key] = trim($value);
            }
            $companyManager = new CompanyManager();
            if (preg_match('`^0[1-79]([-. ]?[0-9]{2}){4}$`', $cleanPost['phone']) &&
                filter_var($cleanPost['facebook'], FILTER_VALIDATE_URL) &&
                filter_var($cleanPost['tweeter'], FILTER_VALIDATE_URL) &&
                filter_var($cleanPost['instagram'], FILTER_VALIDATE_URL)) {
                $companyManager->update($cleanPost['id'], [
                    'phone' => $cleanPost['phone'],
                    'facebook' => $cleanPost['facebook'],
                    'tweeter' => $cleanPost['tweeter'],
                    'instagram' => $cleanPost['instagram'],
                    'mentions_legales' => $cleanPost['mentions_legales'],
                ]);

            }

        }
        header('location:/admin/company');
        exit();
    }
}