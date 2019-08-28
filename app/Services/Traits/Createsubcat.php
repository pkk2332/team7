<?php 

namespace App\Services\Traits;
/**
 * 
 */
trait Createsubcat
{
    public function createsub($data) {
        $subcategory = $this->subcatrepo->createone($data);
        return $subcategory;
    }
}
