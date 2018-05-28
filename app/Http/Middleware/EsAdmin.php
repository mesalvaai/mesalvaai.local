<?php

namespace App\Http\Middleware;

use Closure;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null($request->route('admin'))) {
            //outras formas de redirect
            //return back(); //Lleva a la pagina anterior
            //return redirect()->action('FrutasController@pera')->withInput(); //Controlador e action e parametro com withInput
            return redirect('frutaria/pera')->with('erro', 'Redirigido a pera por caso de nao recebir parametro admin por a url');
        }
        return $next($request);
    }
}
