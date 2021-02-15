<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use DB;
use Image;
class SettingController extends Controller
{
   public function jobcategory(){
       $rowdata = DB::table('job_category')->get();
      return view('admin.jobcategory')->with('rowdata',  $rowdata);
    }
    public function add_jobcategory(Request $request){
       if($request->has('submit')){
                       $id = DB::table('job_category')->insert([
                      'name_en' => $request->input('name_en'),
                      'name_ar' => $request->input('name_ar'),
                        ]);
                       return redirect('/job-category')->with('success','Data have been save sussesfully');
                   }
                    return redirect('/dashbord');
    }
    public function edit_jobcategory(Request $request ,$id){
      $data= DB::table('job_category')->where('id',$id)->first();
     if($request->has('submit')){
            DB::table('job_category')->where('id', $id)->update([
                  'name_en' => $request->input('name_en'),
                  'name_ar' => $request->input('name_ar'),
              ]);
          return redirect('/job-category')->with('success','Data have been updated sussesfully');
          }
         return view('admin.jobcategory-edit')->with('data',$data);
    }
    public function delete_jobcategory($id){
         DB::table('job_category')->where('id', '=', $id)->delete();
        return redirect('/job-category')->with('success','Data have been deleted sussesfully');
    }

    public function experience_level(){
         $rowdata = DB::table('experience_level')->get();
       return view('admin.experience-level')->with('rowdata', $rowdata);
     }
     public function add_experience_level(Request $request){
        if($request->has('submit')){
                        $id = DB::table('experience_level')->insert([
                       'name_en' => $request->input('name_en'),
                       'name_ar' => $request->input('name_ar'),
                         ]);
                        return redirect('/experience-level')->with('success','Data have been save sussesfully');
                    }
                     return redirect('/dashbord');
     }
     public function edit_experience_level(Request $request ,$id){
       $data= DB::table('experience_level')->where('id',$id)->first();
      if($request->has('submit')){
             DB::table('experience_level')->where('id', $id)->update([
                   'name_en' => $request->input('name_en'),
                   'name_ar' => $request->input('name_ar'),
               ]);
           return redirect('/experience-level')->with('success','Data have been updated sussesfully');
           }
          return view('admin.experience-level-edit')->with('data',$data);
     }
     public function delete_experience_level($id){
          DB::table('experience_level')->where('id', '=', $id)->delete();
         return redirect('/experience-level')->with('success','Data have been deleted sussesfully');
     }

     public function resume_templet(){
          $rowdata = DB::table('resume_templet')->get();
        return view('admin.resume-templet')->with('rowdata', $rowdata);
      }
      public function add_resume_templet(Request $request){
         if($request->has('submit')){
                        $fileName=  $this->upload_img($request);
                         $id = DB::table('resume_templet')->insert([
                        'name_en' => $request->input('name_en'),
                        'name_ar' => $request->input('name_ar'),
                        'code' => $request->input('code'),
                          'image' =>   $fileName,
                          ]);
                         return redirect('/resume-templet')->with('success','Data have been save sussesfully');
                     }
                      return redirect('/dashbord');
      }
      public function edit_resume_templet(Request $request ,$id){
        $data= DB::table('resume_templet')->where('id',$id)->first();
       if($request->has('submit')){
            $fileName =$request->input('old_image');
         if ($request->hasFile('image')) {
               $fileName=  $this->upload_img($request);

                if(\File::exists(public_path('thumbnail/'.$request->input('old_image')))){
                   \File::delete(public_path('thumbnail/'.$request->input('old_image')));
                 }

             }

              DB::table('resume_templet')->where('id', $id)->update([
                    'name_en' => $request->input('name_en'),
                    'name_ar' => $request->input('name_ar'),
                    'code' => $request->input('code'),
                    'image' =>   $fileName,
                ]);
            return redirect('/resume-templet')->with('success','Data have been updated sussesfully');
            }
           return view('admin.resume-templet-edit')->with('data',$data);
      }
      public function delete_resume_templet($id){
           DB::table('resume_templet')->where('id', '=', $id)->delete();
          return redirect('/resume-templet')->with('success','Data have been deleted sussesfully');
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
