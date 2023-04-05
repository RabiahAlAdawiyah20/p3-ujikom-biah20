<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{transaksi,PageSettings};

class FrontController extends Controller
{

  //Index
  public function index()
  {
    $setpage = PageSettings::first();

    return view('frontend.index', compact('setpage'));
  }
  public function tk()
  {
    return view('frontend.tk');
  }
  public function banner()
  {
    return view('frontend.banner');
  }
  public function contact()
  {
    return view('frontend.contact');
  }


  //Search
  public function search(Request $request)
  {
      $search = transaksi::where('invoice', $request->search_status);
      if ($search->count() == 0) {
          $return = 0;
        }else{
          $return = $search->first();
        }
        return $return;
  }
}
