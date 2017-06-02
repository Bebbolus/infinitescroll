<?php

namespace App\Http\Controllers;


use App\Category;
use App\Element;
use Illuminate\Pagination\Paginator;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('welcome',compact('categories'));
    }

    public function elements($category)
    {
        $pagination = 8;
        //TODO: fare 2 variabili distinte nella scroll javscript: una per il top e una per il bottom
        /*
         * 1) alla fine dello scroll si fermerebbe se tornasse " " ma probabilmente torna un errore da controllare con un dd()
         * di quello che torna all'ultima pagina, per ora ho risolto inviando l'ultima pagina nel blade e saltando il controllo
         * se raggiunge questa
         *
         * 2) on top; continua ad appendere....
         */

        if (request()->ajax()) {
            $elements = Element::paginate($pagination);
            $view = view('partials.element',compact('elements'))->render();
            return response()->json(['html'=>$view]);
        }

        $firstPage = 2;

        Paginator::currentPageResolver(function () use ($firstPage) {
            return $firstPage;
        });
        $elements = Element::paginate($pagination);
        return view('elements',compact('elements', 'firstPage','lastPage'));
    }
}
