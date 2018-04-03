<?php
/**
 * Created by PhpStorm.
 * User: wilder22
 * Date: 29/03/18
 * Time: 16:44
 */

namespace Controller;


class TeamController extends AbstractController
{
    public function show() {
        return $this->twig->render('main/index.html.twig', ['team' => 'team']);
    }
}