<?php

namespace App\Controller;

class AdminlteController extends AppController
{

    public function dashboard(){
        $this->viewBuilder()->setLayout('adminlte');

    }

    
}
