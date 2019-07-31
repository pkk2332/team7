<?php

namespace App\Services;

use App\Repositories\SubcatRepository;

class SubcatService{

    public $subcat;
   public function __construct(SubcatRepository $sub){
            $this->subcatrepo = $sub;
    }

    public function createsub($data) {
        $subcategory = $this->subcatrepo->createone($data);
        return $subcategory;
    }
}