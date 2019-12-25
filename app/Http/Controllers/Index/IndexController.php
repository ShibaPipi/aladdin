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
        dd(Schema::getColumnListing('purchases'));
    }
}
