<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Core\CurdController;
use App\Model\Admin\Coltypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColtypesController extends CurdController
{
    public function __construct()
    {
        parent::__construct();
        $this->view = 'admin.system.coltypes';
        $this->model = new Coltypes();
    }
}
