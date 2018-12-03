<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
class CheckProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$admin_id=\Auth::user()->admin_id;
    	$checkproduct=DB::table('user_checkouts')->where('adminid',$admin_id)->select('name','quantity','price')->get();

    	return $checkproduct;
    }
}
