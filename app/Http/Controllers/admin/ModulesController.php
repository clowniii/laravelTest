<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin\Modules;

class ModulesController extends CurdController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Modules();
        $this->view = 'admin.system.modules';
    }


}
