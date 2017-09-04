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

        if (request()->ajax()) {
            $elements = Element::orderBy('category_id')->paginate($pagination);
            $view = view('partials.element',compact('elements'))->render();
            return response()->json(['html'=>$view]);
        }

        $firstPage = 1;
        Paginator::currentPageResolver(function () use ($category, $pagination, &$firstPage) {
            $firstElement = Element::where('category_id',$category)->first();
            if(!is_null($firstElement)){
            $all = Element::orderBy('category_id')->get();

            $i = 1;
            foreach ($all as $item){
                if($item->id == $firstElement->id){
                    break;
                }
                if($i == $pagination){
                    $firstPage++;
                    $i=1;
                }
                $i++;
            }
            }
            return $firstPage;
        });
        $elements = Element::orderBy('category_id')->paginate($pagination);
        
        return view('elements',compact('elements', 'firstPage','lastPage'));
    }

    public function gallery($id)
    {
        $pagination = 8;

        if (request()->ajax()) {
            $elements = Element::orderBy('category_id')->paginate($pagination);
            $view = view('partials.element_gallery',compact('elements'))->render();
            return response()->json(['html'=>$view]);
        }

        $firstPage = 1;
        Paginator::currentPageResolver(function () use ($id, $pagination, &$firstPage) {

            $all = Element::orderBy('category_id')->get();

            $i = 1;
            foreach ($all as $item){
                if($item->id == $id){
                    break;
                }
                if($i == $pagination){
                    $firstPage++;
                    $i=1;
                }
                $i++;
            }

            return $firstPage;
        });
        $elements = Element::orderBy('category_id')->paginate($pagination);

        return view('gallery',compact('elements', 'firstPage','lastPage'));
    }
}
