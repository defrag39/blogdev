<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Redirect;
use Carbon\Carbon;
use App\Category;
use App\Blog;

class BlogController extends Controller
{
    public function getpostuser(Request $request){
      $blog = DB::table('blog')
              ->join('category','blog.category','=','category.idcategory')
              ->join('peng12','blog.posterid','=','peng12.idpengguna')
              ->select('blog.*','category.*','peng12.*')
              ->when($request->nama, function ($query) use ($request) {
              $query->where('name', 'like', "%{$request->nama}%");
              });
       $view = $blog->paginate(10);
       $view->appends($request->only('nama'));

       return view('',compact(''));
    }

    public function getall(){
      $blog = DB::table('blog')
              ->join('category','blog.idcategory','=','category.idcategory')
              ->join('peng12','blog.posterid','=','peng12.idpengguna')
              ->select('blog.*','category.*','peng12.*')
              ->paginate(10);

      return view('postlist',compact('blog'));
    }

    public function getwrite(){
      $getcat = Category::all();
      return view('writepost',compact('getcat'));
    }

    public function writeup(Request $request){
      $slugttl = preg_replace('/\s+/', '-', $request->title);
      $tgl = Carbon::now()->format('dmY');
      $insert = ([
        'title' => $request->title,
        'title_coll' => strtolower($slugttl) . "-" . $tgl ,
        'idcategory' => $request->kategori,
        'postbody' => $request->postbody,
        'posterid' => Auth::User()->idpengguna,
              ]);
      //dd($insert);
      Blog::create($insert);
      return redirect('wblog/listpost');
    }

    public function addcat(Request $request){
      $insert = ([
        'categoryname' =>$request->cat
      ]);
      //dd($insert);
      Category::create($insert);
      return redirect('wblog/write');
    }

    public function getpost($id){
      $view = Blog::where('title_coll','=',$id)->first();
      $category = $view->category;
      //dd($view);
      return view('postview',compact('view','category'));
    }

    public function getcat($id){
      $cat = Category::where('categoryname','=',$id)->first();
      //dd($cat);
      $category = Blog::where('idcategory','=',$cat->idcategory)->get();
      //dd($category->category);
      return view('categoryview',compact('category','cat'));
    }

    public function getedit($id){
      $getpost = Blog::where('title_coll','=',$id)->first();
      $getcat = Category::all();
      return view('editpost',compact('getpost','getcat'));
    }

    public function saveedit(Request $request, $id){
      $getit = Blog::where('title_coll','=',$id)->first();
      $getit->title = $request->title;
      $getit->idcategory = $request->kategori;
      $getit->postbody = $request->postbody;
      $getit->save();
      return redirect('posts/'.$getit->title_coll)->with(['succes' => 'Post successfully edited!']);
    }
}
