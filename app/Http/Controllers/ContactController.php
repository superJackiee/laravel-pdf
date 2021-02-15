<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Pages;
use DB;
use Config;
use App;
class ContactController extends Controller
{
  public function index()  {
         $banners  = Banner::all();
          return view('welcome')->with('banners', $banners);
        }
        public function lang($locale)  {
        App::setLocale($locale);
        //storing the locale in session to get it back in the middleware
        session()->put('locale', $locale);
        return redirect()->back();
              }
    public function  formSubmit(Request $req){
     $validateData=  $req->validate([
         'name'=>'required',
         'email'=>"required|email",

     ]);
     //  print_r($req->input('name'));

     $id = DB::table('contact')->insert([
         'name' => $req->input('name'),
          'email' => $req->input('email'),
          'phone' => $req->input('phone'),
          'message' => $req->input('message')
       ]);
      //  $results = DB::select('select * from contact order by id desc');
     // return view('/contact',['results'=>$results])->with('success','Show is sussfully saved');
     //return view('contact', compact(['results']));
    return redirect('/contact')->with('success','Your recordrs have been sent sussesfully ');

     }
    public function aboutus() {
             $page  = Pages::findOrFail('1');
             return view('page')->with('page',$page);
              }
    public function services()
      {
          $page  = Pages::findOrFail('2');
         return view('page')->with('page',$page);
    }



}
