<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Campaign;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('sites.home');
    }

    public function home()
    {
        //$campanhas = Campaign::where('status', 1)->paginate();
        $campanhas = Campaign::where('published', 1)->paginate(4);
        return view('sites.site', compact('campanhas', 'progress'));
    }

    public function test()
    {
        // rebuilding-stillatcom
        echo Str::slug('Reàáâãäåābuilding stillat.com');
        // rebuilding-stillatcom
        echo Str::slug('Rebuilding stillat.com');

        // customizing-the-laravel-artisan-application
        echo Str::slug(' Customizing The Laravel Artisan Application ');

        // laravel_artisan_config_command_the_configclear_command
        echo Str::slug(
                'Laravel Artisan Config Command: The config:clear Command',
                '_'
            );

        // laravel_artisan_config_command_the_configclear_command
        echo Str::slug(
                'Laravel Artisan Config Command: The config:clear Command',
                '_',
                'en'
            );
        echo "<hr>";
        echo $random = rand(5, 99);
        echo "<hr>";
        echo $random = str_random(2);
        echo "<hr>";
        echo $random = Str::random(10);
        echo "<hr>";
        $collection = collect([1, 2, 3, 4, 5]);
        echo $collection->random();
        echo "<hr>";
        $string='1.500.050,00'; 
        $number = str_replace(',','.',str_replace('.','',$string)); 
        echo $number;
        echo "<hr>";
        //echo $replaced = str_replace_array(',', '.', str_replace_array('.','',$string));
        echo "<hr>";
        echo $replaced = str_replace_first(',', '.', str_replace_first('.','',$string));
        echo "<hr>";
        echo "<hr>";
        echo number_format($number,2,',','.');
        //dd('');
        $campings = Campaign::get();
        return view('sites.tests.tinymce', compact('campings'));
    }

     public function mimos()
    {
        return view('sites.mimos');
    }

    public function campanha($slug = null)
    {
        //$campanha = Campaign::where('slug', $slug)->first();
        if ($slug == null) {
            abort(404, 'A url não existe');
        } else {
            $campanha = Campaign::where('slug', $slug)->first();
            if ($campanha) {
                return view('sites.campanha', compact('slug', 'campanha'));
            } else {
                abort(404, 'A url não existe');
            }
        } 
    }

    public function donate($slug)
    {
        if ($slug == null) {
            abort(404, 'A url não existe');
        } else {
            $campanha = Campaign::where('slug', $slug)->first();
            if ($campanha) {
                return view('sites.donations.create', compact('slug', 'campanha'));
            } else {
                abort(404, 'A url não existe');
            }
        }
        
    }

    public function donateProcess(Request $request)
    {
        dd($request);
    }
}
