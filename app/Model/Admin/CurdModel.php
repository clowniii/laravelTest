<?php

namespace App\Model\Admin;


class CurdModel extends BaseModel
{
    public function show()
    {
        $data = $this->orderBy('sort_id','desc')->get();
        return $data;
    }
}
