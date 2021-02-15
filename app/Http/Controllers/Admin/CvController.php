<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Cv;
use Auth;
use PDF;
use DB;

class CvController extends Controller
{

 public function index(){

      
      $cvs  = Cv::all();
      return view('admin.cv')->with('cv',$cvs);
    }
  public function delete(Request $request ,$id)
      {
           DB::table('cvs')->where('id', '=', $id)->delete();
           DB::table('education')->where('cv_id', '=', $id)->delete();
           DB::table('experience')->where('cv_id', '=', $id)->delete();
          return redirect('/home')->with('success','Data have been deleted sussesfully');

      }
      public function preview($id)  {
            //$cv_details =array();
            $cv_details['personal_info']  = Cv::findOrFail($id);
            $cv_details['education'] = DB::table('education')->where('cv_id',$id)->get();

         return view('cv-preview')->with('cv',$cv_details);
        }

        public function generatePDF($id)
            {
            $cv['personal_info']  = Cv::findOrFail($id);
            $cv['education'] = DB::table('education')->where('cv_id',$id)->get();

                $pdf = PDF::loadView('cv-preview-pdf',compact('cv'));
              return $pdf->download('cv.pdf');
            }

      public function save(Request $request)
      {
           $obj = new Cv();
           $obj->user_id= Auth::id();
           $obj->name= Auth::user()->name;
           $obj->email= Auth::user()->email;
           $obj->job_category_id=  $request->input('job_category_id');
           $obj->resume_name= $request->input('resume_name');
           $obj->resume_language_id= $request->input('resume_language_id');
           $obj->resume_templet_id=  $request->input('resume_templet_id');
           $obj->experience_level_id= $request->input('experience_level_id');

           $obj->save();

           return redirect()
           ->action( 'CvController@edit', ['id' =>$obj->id])
           ->with('success','Data have been save sussesfully');


      }
      public function edit($id)
      {
           $cv  = Cv::findOrFail($id);
         return view('cv-edit')->with('cv',$cv);

      }
      public function edit_info(Request $request ,$id)
      {
           $obj =  Cv::findOrFail($id);
           $obj->name=  $request->input('name');
           $obj->email= $request->input('email');
           $obj->job_tittle= $request->input('job_tittle');
           $obj->nationality=  $request->input('nationality');
           $obj->dob= $request->input('dob');
           $obj->marital_status= $request->input('marital_status');
           $obj->mobile_number=  $request->input('mobile_number');
           $obj->address= $request->input('address');
           $obj->ulr= $request->input('ulr');
           $obj->update();
          return redirect('/edit-cv/'.$id)->with('success','Data have been updated sussesfully');

      }

      public function edit_summary(Request $request ,$id)
      {
         $obj =  Cv::findOrFail($id);
         if($request->has('submit')){
                  $obj->summary=  $request->input('summary');
                  $obj->update();
                  return redirect('/edit-summary/'.$id)->with('success','Data have been updated sussesfully');
            }
           return view('cv-edit-summary')->with('cv',$obj);
      }

    public function experience(Request $request ,$id)
       {
           $education= DB::table('experience')->where('cv_id',$id)->get();
           return view('cv-experience')->with('experience',$education);
      }
      public function save_experience(Request $request)
      {

         if($request->has('submit')){
                 $id = DB::table('experience')->insert([
                'cv_id' => $request->input('cv_id'),
                'position_or_job_title' => $request->input('position_or_job_title'),
                'company_name' => $request->input('company_name'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'city_country' => $request->input('city_country'),
                'responsibilities' => $request->input('responsibilities'),
                  ]);
                 return redirect('/experience/'.$request->input('cv_id'))->with('success','Data have been save sussesfully');
                }
              return redirect('/home');

      }
      public function edit_experience(Request $request ,$id)
      {
        $cv= DB::table('experience')->where('id',$id)->first();
       if($request->has('submit')){
              DB::table('experience')
                  ->where('id', $id)
                  ->update([
                    'position_or_job_title' => $request->input('position_or_job_title'),
                    'company_name' => $request->input('company_name'),
                    'start_date' => $request->input('start_date'),
                    'end_date' => $request->input('end_date'),
                    'city_country' => $request->input('city_country'),
                    'responsibilities' => $request->input('responsibilities'),
                ]);
            return redirect('/experience/'.$request->input('cv_id'))->with('success','Data have been updated sussesfully');
            }
           return view('cv-experience-edit')->with('cv',$cv);
      }
      public function delete_experience(Request $request ,$id)
      {
           DB::table('experience')->where('id', '=', $id)->delete();
          return redirect('/experience/'.$request->input('cv_id'))->with('success','Data have been deleted sussesfully');

      }

      public function education(Request $request ,$id)
         {
             $education= DB::table('education')->where('cv_id',$id)->get();
             return view('cv-education')->with('education',$education);
        }
        public function save_education(Request $request)
        {

           if($request->has('submit')){
                   $id = DB::table('education')->insert([
                  'cv_id' => $request->input('cv_id'),
                  'field_of_study' => $request->input('field_of_study'),
                  'school_university' => $request->input('school_university'),
                  'start_date' => $request->input('start_date'),
                  'end_date' => $request->input('end_date'),
                  'city_country' => $request->input('city_country'),
                  'description' => $request->input('description'),
                    ]);
                   return redirect('/education/'.$request->input('cv_id'))->with('success','Data have been save sussesfully');
                  }
                return redirect('/home');

        }
        public function edit_education(Request $request ,$id)
        {
          $cv= DB::table('education')->where('id',$id)->first();
         if($request->has('submit')){
                DB::table('education')
                    ->where('id', $id)
                    ->update([
                      'field_of_study' => $request->input('field_of_study'),
                      'school_university' => $request->input('school_university'),
                      'start_date' => $request->input('start_date'),
                      'end_date' => $request->input('end_date'),
                      'city_country' => $request->input('city_country'),
                      'description' => $request->input('description'),
                  ]);
              return redirect('/education/'.$request->input('cv_id'))->with('success','Data have been updated sussesfully');
              }
             return view('cv-edit-education')->with('cv',$cv);
        }
        public function delete_education(Request $request ,$id)
        {
             DB::table('education')->where('id', '=', $id)->delete();
            return redirect('/education/'.$request->input('cv_id'))->with('success','Data have been deleted sussesfully');

        }
}
