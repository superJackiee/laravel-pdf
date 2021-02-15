<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;
class BannerController extends Controller
{
    public function index(){

     $banner = Banner::all();
     return view('admin.banner')->with('banner', $banner);

    }
    public function save(Request $request)
    {

      $fileName=  $this->upload_img($request);
       //return back()->with('success','Image Upload successful')->with('imageName',$input['imagename']);

        //  return back()->with('success','You have successfully upload file.')->with('file',$fileName);

         $pageobj = new Banner();
         $pageobj->title=  $request->input('title');
         $pageobj->image=   $fileName;
         $pageobj->description= $request->input('description');
         $pageobj->save();
        return redirect('/banner')->with('success','Data have been save sussesfully');

    }

    public function edit($id)
    {
         $banner  = Banner::findOrFail($id);
          return view('admin.banner-edit')->with('banner',$banner);

    }
    public function save_edit(Request $request ,$id)
    {
         $obj =  Banner::findOrFail($id);
         $obj->title=  $request->input('title');
         $obj->description= $request->input('description');
          if ($request->hasFile('image')) {
                $fileName=  $this->upload_img($request);
                $obj->image= $fileName;
                 if(\File::exists(public_path('thumbnail/'.$request->input('old_image')))){
                    \File::delete(public_path('thumbnail/'.$request->input('old_image')));
                  }

              }
        $obj->update();
        return redirect('/banner')->with('success','Data have been updated sussesfully');

    }

    public function delete($id)
    {
         $obj =  Banner::findOrFail($id);
         $obj->delete();
        return redirect('/banner')->with('success','Data have been deleted sussesfully');

    }

    public function upload_img($request)
    {
      $request->validate([
        'image' => 'required|mimes:jpg,jpeg,png|max:2048',
    ]);

    $fileName = time().'.'.$request->image->extension();
  //  $request->image->move(public_path('uploads'), $fileName);
  $image = $request->file('image');
 $input['imagename'] = time().'.'.$image->extension();

 $destinationPath = public_path('/thumbnail');
 $img = Image::make($image->path());
 $img->resize(1040,550, function ($constraint) {
 $constraint->aspectRatio();
 })->save($destinationPath.'/'.$input['imagename']);

 $destinationPath = public_path('/images');
 $image->move($destinationPath, $input['imagename']);

 return $fileName;
    }
}
