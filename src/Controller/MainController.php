<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;
use Model\ConceptManager;

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
        $concept = $this->getConcept();
        return $this->twig->render('main/index.html.twig', ['concept'=>$concept]);
    }

    public function getConcept() : array //Concue par damien aidé de anthony
    {
        $conceptManager = new ConceptManager();
        $concept = $conceptManager->selectAll();
        return $concept;
    }
}
