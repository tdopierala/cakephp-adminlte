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


}
