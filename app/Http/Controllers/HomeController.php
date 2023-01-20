<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prod;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $d= Auth::user()->role;
      // dd($d);
        switch (Auth::user()->role){
            case 2:

                return view('product',['user'=>Auth::user()->id]);
                break;
            case 0:

                return view('home.dashboard.index',['user'=>Auth::user()->id]);
                break;
            case 1:

                return view('backend',['user'=>Auth::user()->id]);
                break;
        }

    }

    /**
     * serving product adding page
     *
     * @return Renderable
     */
    public function product($item){
        if(Str::contains( $item,'null')){
            //check for existing null category
            //dd(true);


            $prod= Prod::wherenull('name')->first();
            if($prod){
                return view('home.product.add',['id'=>$prod->id,'prods'=>$prod]);
            }
            else{

                $cats= Category::wherenull('name')->first();
                if($cats){
                  //  return view('home.category.add',['id'=>$cats->id,'cats'=>$cats]);
                    //creat new null category
                    $product=['visibility'=>0,'price'=>0.0,'sale_price'=>0.0,'verified'=>0,'category_id'=>$cats->id,'user_id'=>Auth::user()->id];
                    $prods= Prod::create($product);
                    return view('home.product.add',['id'=>$prods->id,'prods'=>$prods]);
                }
                else{
                    //creat new null category
                    $category=['visibility'=>0];
                    $cats= Category::create($category);
                    $product=['visibility'=>0,'price'=>0.0,'sale_price'=>0.0,'verified'=>0,'category_id'=>$cats->id,'user_id'=>Auth::user()->id];
                    $prods= Prod::create($product);
                    return view('home.product.add',['id'=>$prods->id,'prods'=>$prods]);
                }

            }
        }
        //return view('home.product.add');
    }
    public function productlist(){
        return view('home.product.list');
    }
    public function categorieslist(Request $request){
        dd($request);
        return view('home.category.list');
    }
    public function categories($item){
      // dd($item);
        if(Str::contains( $item,'null')){
            //check for existing null category
            //dd(true);
          $cats= Category::wherenull('name')->first();
          if($cats){
              return view('home.category.add',['id'=>$cats->id,'cats'=>$cats]);
          }
          else{
              //creat new null category
              $category=['visibility'=>0];
              $cats= Category::create($category);
              return view('home.category.add',['id'=>$cats->id,'cats'=>$cats]);
          }
        }
    }

    public function categorySave(Request $request){
        $request->validate([
            "name" => "required",
            "slug" => "required",
            "description" => "required",
            "title" => "required",
            "metaDescription" => "required",
            "visibility" => "required",
            "parentCategory" => "required",
            "image" =>'required'
        ]);

$cat=[
'name'=>$request->name,
'slug'=>$request->slug,
'description'=>$request->description,
'image_name'=>$request->image,
'page_title'=>$request->title,
'meta_description'=>$request->metaDescription,
'parent_category'=>$request->parentCategory,
'visibility'=>$request->visibility
];
$check=Category::where('name',$cat['name'])->first();
if($check) return ['message'=>'Category Already exiest', 'status'=>0];
  $res =      Category::whereId($request->id)->update($cat);
  if($res)
      return ['message'=>'Category Created', 'status'=>$res];
  else return ['message'=>'Category Failed', 'status'=>$res];
    }
}
