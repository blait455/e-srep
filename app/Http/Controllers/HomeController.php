<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Post;
use App\Slider;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with('reviews')->limit(3)->get()->sortBy(function($data)
        {
            return $data->reviews->count();
        });

        $posts = Post::orderBy('id', 'desc')->limit(3)->get();
        $sliders = Slider::orderBy('id', 'desc')->limit(5)->get();
        $categories = Category::inRandomOrder()->take(3)->get();

        $data = [
            'products' => $products,
            'posts' => $posts,
            'sliders' => $sliders,
            'categories' => $categories,

        ];
        return view('index')->with($data);
    }

    /** Contactus view */
    public function contact(){
        return view('contact');
    }


    /** Return view to upload file */
    public function uploadFile(){
        return view('welcome');
    }

    /** Example of File Upload */
    public function uploadFilePost(Request $request){
        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);
        $request->fileToUpload->store('logos');
        return back()->with('success','You have successfully upload image.');
    }


    
}
