<?php

namespace App\Services;

use App\Repositories\SubcatRepository;
use App\Services\Traits\Createsubcat;

class SubcatService{

    use Createsubcat;
    public $subcat;
    public function __construct(SubcatRepository $sub){
            $this->subcatrepo = $sub;
    }

  
}