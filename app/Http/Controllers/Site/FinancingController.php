<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class FinancingController extends Controller
{
    public function index()
    {
    	$_role = 'role_fc';
    	$encrypted = Crypt::encrypt($_role);
      $decrypted = Crypt::decrypt($encrypted);
      return view('sites.financing.index', compact('encrypted', 'decrypted'));
  }

  public function createCamping()
  {
   $_role = 'role_fc';
   $encrypted = Crypt::encrypt($_role);
   $decrypted = Crypt::decrypt($encrypted);
   return view('sites.financing.criar-campanha', compact('encrypted', 'decrypted'));
}
public function createConta()
{    
    $_role = 'role_fc';
    $encrypted = Crypt::encrypt($_role);
    $decrypted = Crypt::decrypt($encrypted);
    return view('sites.financing.criar-conta', compact('encrypted', 'decrypted'));
}
}
