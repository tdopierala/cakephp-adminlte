<?php

namespace App\Controller;

class AdminlteController extends AppController
{
    public function index(){
        //$this->setAction('dashboard', [1]);
        return $this->redirect(['action' => 'dashboard', 1]);
    }

    public function dashboard(){

        $param = isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : 0;

        switch($param){
            case 1: $page = "dashboard1"; break;
            case 2: $page = "dashboard2"; break;

            default: $page = "dashboard1";
        }
        
        $this->viewBuilder()->setLayout('adminlte');
        $this->set([
            'env' => $this->request->env('REQUEST_URI'),
            'request' => $this->request
        ]);

        $this->render($page);
    }

    public function layout(){

        $param = isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : 0;

        switch($param){
            case 'top-nav':     $page = "layout_topnav"; break;
            case 'boxed':       $page = "layout_boxed"; break;
            case 'fixed':       $page = "layout_fixed"; break;
            case 'collapsed-sidebar': $page = "layout_collapsedsidebar"; break;

            default: $page = "layout_topnav";
        }
        
        $this->viewBuilder()->setLayout('adminlte');
        $this->set([
            'env' => $this->request->env('REQUEST_URI'),
            'request' => $this->request
        ]);

        $this->render($page);
    }

    public function widgets(){

        $this->viewBuilder()->setLayout('adminlte');
        $this->set([
            'env' => $this->request->env('REQUEST_URI'),
            'request' => $this->request
        ]);

    }

    public function charts(){

        $param = isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : 0;

        switch($param){
            case 'chartjs':     $page = "chart_chartjs"; break;
            case 'morris':       $page = "chart_morris"; break;
            case 'flot':       $page = "chart_flot"; break;
            case 'inline': $page = "chart_inline"; break;

            default: $page = "chart_chartjs";
        }
        
        $this->viewBuilder()->setLayout('adminlte');
        $this->set([
            'env' => $this->request->env('REQUEST_URI'),
            'request' => $this->request
        ]);

        $this->render($page);
    }

    public function uielements(){

        $param = isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : 0;

        switch($param){
            case 'general':     $page = "ui_general"; break;
            case 'advanced':       $page = "ui_advanced"; break;
            case 'editors':       $page = "ui_editors"; break;

            default: $page = "ui_general";
        }
        
        $this->viewBuilder()->setLayout('adminlte');
        $this->set([
            'env' => $this->request->env('REQUEST_URI'),
            'request' => $this->request
        ]);

        $this->render($page);
    }


}
