<?php

class DashBoardController
{

    public function index()
    {
        $view = 'dashboard';

        require_once PATH_VIEW_ADMIN_MAIN;
    }
}
