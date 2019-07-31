<?php
namespace App\Repositories;
use App\SubCategory;

class SubcatRepository {
    public $subcat;
    public function __construct(SubCategory $subCategory)
    {
        $this->model= $subCategory;
    }

    public function createone($data){
      return $this->model->create([
            'name' => $data->name,
            'category_id' => $data->category_id
        ]);
        
    }
}