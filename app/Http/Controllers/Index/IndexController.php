<?php


namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Support\Facades\Schema;

class IndexController extends Controller
{
    public function index()
    {
//        phpinfo();
        $arr = Schema::getColumnListing('shipments');
        $str = '';
        $str .= "[";
        foreach ($arr as $val) {
            $str.="'${val}',\n";
        }
        $str .= "]";
        echo $str;
    }
}
