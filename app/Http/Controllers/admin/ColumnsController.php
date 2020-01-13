<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Core\CurdController;
use App\Model\Admin\Columns;

class ColumnsController extends CurdController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Columns();
        $this->view = 'admin.system.columns';
    }
}
