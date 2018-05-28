<?php  
namespace App\Http\Controllers;

/**
 * Test Controller
 */
class TestController extends Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }
    public function index()
    {
    	$title = 'Nosso titulo de teste';
    	return view('teste', ['title' => $title]);
    }
}
?>