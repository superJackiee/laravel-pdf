<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use DB;
class PagesController extends Controller
{
  public function index()
   {
     $pages  = Pages::all();

      return view('admin.pages')->with('pages', $pages);
    }

    public function save(Request $request)
    {
         $pageobj = new Pages();
         $pageobj->title=  $request->input('title');
         $pageobj->subtitle= $request->input('subtitle');
         $pageobj->description= $request->input('description');
         $pageobj->save();
        return redirect('/pages')->with('success','Data have been save sussesfully');

    }
    public function edit($id)
    {
         $page  = Pages::findOrFail($id);
       return view('admin.page-edit')->with('page',$page);

    }
    public function save_edit(Request $request ,$id)
    {
         $pageobj =  Pages::findOrFail($id);
         $pageobj->title=  $request->input('title');
         $pageobj->subtitle= $request->input('subtitle');
         $pageobj->description= $request->input('description');
        $pageobj->update();
        return redirect('/pages')->with('success','Data have been updated sussesfully');

    }

    public function delete($id)
    {
         $pageobj =  Pages::findOrFail($id);
         $pageobj->delete();
        return redirect('/pages')->with('success','Data have been deleted sussesfully');

    }
    public function deletecontact($id)
    {
       DB::table('contact')->where('id', '=', $id)->delete();
        return redirect('/manage-contact')->with('success','Data have been deleted sussesfully');

    }


        public function contactlist()  {
             $contactlist= DB::table('contact')->get();
            return view('admin.contactlist')->with('contactlist',$contactlist);
          }
}
