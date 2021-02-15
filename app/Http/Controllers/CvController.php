<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Cv;
use Auth;
use PDF;
use DB;
use App\User;
use Image;

class CvController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

        //$userId = Auth::id();
    }

    public function index(){
      //$data = array();
      $data['job_category'] = DB::table('job_category')->where('status' ,'=','1')->get();
      $data['resume_templet'] = DB::table('resume_templet')->where('status','=','1')->get();
      $data['experience_level'] = DB::table('experience_level')->where('status','=','1')->get();
      $data['skills_level'] = DB::table('skills_level')->where('status','=','1')->get();
      return view('cv')->with('cv',$data);

    }

    public function change_templet(Request $request ,$id)
            {
             $data['cv_cata']   = Cv::findOrFail($id);
             $data['resume_templet'] = DB::table('resume_templet')->where('status','=','1')->get();
             if($request->has('submit')){
                    DB::table('cvs')
                        ->where('id', $id)
                        ->update(['resume_templet_id' => $request->input('resume_templet_id')]);
                  return redirect('/edit-cv/'.$id)->with('success','Data have been updated sussesfully');
                  }
                 return view('resume_templet')->with('cv',$data);
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
			      $cv_details['experience'] = DB::table('experience')->where('cv_id',$id)->get();
            $cv_details['skills'] = DB::table('skills')->where('cv_id',$id)->get();
            $cv_details['languages'] = DB::table('languages')->where('cv_id',$id)->get();
            $cv_details['colors'] = DB::table('colors')->get();
            $cv_details['background_image'] = DB::table('background_image')->get();


         return view('cv-preview')->with('cv',$cv_details);
        }

        public function generatePDF($id)
        {
            $cv['personal_info']  = Cv::findOrFail($id);
            $cv['education'] = DB::table('education')->where('cv_id',$id)->get();
			      $cv['experience'] = DB::table('experience')->where('cv_id',$id)->get();
            $cv['skills'] = DB::table('skills')->where('cv_id',$id)->get();
            $cv['languages'] = DB::table('languages')->where('cv_id',$id)->get();
            $cv['colors'] = DB::table('colors')->get();
            $cv['background_image'] = DB::table('background_image')->get();

           // return view('cv-preview-pdf')->with('cv',$cv);
             $pdf = PDF::loadView('cv-preview-pdf',compact('cv'));
              return $pdf->download('cv.pdf');
            }

            public function update_templet(Request $request,$id)
             {
               DB::table('cvs')
                   ->where('id',$id)
                   ->update([
                     $request->input('input_name') => $request->input('input_val'),
                 ]);
            return response()->json(['success'=>'Got Simple Ajax Request.']);
             }
             public function cv_section_order(Request $request,$id)
              {
           $item=   app('request')->input('item');

         foreach( $item as $key=>$value) {
                DB::table('cv_section')
                    ->where('id',intval($value))
                    ->update([
                      'order_by' => intval($key),
                  ]);

              }
  //mysql_select_db($database_dbconnect, $dbconnect);
  //  mysql_query("UPDATE EmProSect SET EmProSectOrder='".intval($key)."' WHERE idEmProSect='".intval($value)."'", $dbconnect) or die (mysql_error());
//  }

             //return response()->json(['success'=>'Got Simple Ajax Request.']);
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
           $obj->summary='To bring my strong sense of dedication, motivation, and responsibility to [specific company], and to utilize my [skill] qualifications obtained through [name of college or university].';
           $obj->save();
           $cv_id=$obj->id;

          //education
         $section= DB::table('section')->where('id','2')->get();
         $cv_section_id = DB::table('cv_section')->insert(['cv_id' => $cv_id,'section_id' =>'2','name' => $section[0]->name_en,'icon' => $section[0]->icon,'url' =>$section[0]->url,'created_date' => date('Y-m-d')]);
         $id = DB::table('education')->insert(['cv_id' => $cv_id,'field_of_study' =>'Your Field  of study','school_university' =>'Name of unversity or school', 'start_date' => 'Start date','end_date' => 'End date','city_country' => 'City/Country']);
        $id = DB::table('education')->insert(['cv_id' => $cv_id,'field_of_study' =>'Your Field  of study','school_university' => 'Name of unversity or school', 'start_date' => 'Start date',	'end_date' => 'End date','city_country' => 'City/Country']);
        //langauge
       $section= DB::table('section')->where('id','3')->get();
       $cv_section_id = DB::table('cv_section')->insert(['cv_id' => $cv_id,'section_id' =>'3','name' => $section[0]->name_en,'icon' => $section[0]->icon,'url' =>$section[0]->url,'created_date' => date('Y-m-d')]);
       $id = DB::table('languages')->insert(['cv_id' => $cv_id,'name' =>'English','rating' => '3',]);
       $id = DB::table('languages')->insert(['cv_id' => $cv_id,'name' =>'Arabic','rating' => '4',]);
       //skill
      $section= DB::table('section')->where('id','4')->get();
      $cv_section_id = DB::table('cv_section')->insert(['cv_id' => $cv_id,'section_id' =>'4','name' => $section[0]->name_en,'icon' => $section[0]->icon,'url' =>$section[0]->url,'created_date' => date('Y-m-d')]);
      $id = DB::table('skills')->insert(['cv_id' => $cv_id,'name' =>'Name of Skill','rating' => '3',]);
      $id = DB::table('skills')->insert(['cv_id' => $cv_id,'name' =>'Name of Skill','rating' => '4',]);


           return redirect()
           ->action( 'CvController@edit', ['id' =>$cv_id])
           ->with('success','Data have been save sussesfully');


      }
      public function edit(Request $request, $id)
      {
           $cv = Cv::findOrFail($id);
           return view('cv-edit') ->with('cv',$cv);
      }
      public function edit_info(Request $request ,$id)
      {
        // return $request->all();; exit;
      //  $fileName=  $this->upload_img($request);
        $obj =  Cv::findOrFail($id);
        $obj->name=  $request->input('name');
      //  $obj->photo=  $fileName;
         $obj->email= $request->input('email');
        $obj->job_tittle= $request->input('job_tittle');
        $obj->nationality=  $request->input('nationality');
        $obj->dob= $request->input('dob');
        $obj->marital_status= $request->input('marital_status');
        $obj->mobile_number=  $request->input('mobile_number');
        $obj->address= $request->input('address');
        $obj->ulr= $request->input('ulr');
        $query=  $obj->update();

        return redirect('/edit-cv/'.$id)->with('success','Data have been updated sussesfully');

      }

      public function edit_info_ajax(Request $request ,$id)
      {
        // return $request->all();; exit;
      //  $fileName=  $this->upload_img($request);
        $obj =  Cv::findOrFail($id);
        $obj->name=  $request->input('name');
      //  $obj->photo=  $fileName;
        $obj->email= $request->input('email');
        $obj->job_tittle= $request->input('job_tittle');
        $obj->nationality=  $request->input('nationality');
        $obj->dob= $request->input('dob');
        $obj->marital_status= $request->input('marital_status');
        $obj->mobile_number=  $request->input('mobile_number');
        $obj->address= $request->input('address');
        $obj->ulr= $request->input('ulr');
        $query=  $obj->update();

        return redirect('/edit-cv/'.$id)->with('success','Data have been updated sussesfully');

      }

      public function autosave_info_ajax(Request $request ,$id)
      {
        $obj =  Cv::findOrFail($id);
        
        if($request->input('name') !== null){
          $obj->name=  $request->input('name');
        }

        if($request->input('email') !== null){
          $obj->email= $request->input('email');
        }

        if($request->input('job_tittle') !== null){
          $obj->job_tittle= $request->input('job_tittle');
        }

        if($request->input('nationality') !== null){
          $obj->nationality=  $request->input('nationality');
        }

        if($request->input('dob') !== null){
          $obj->dob= $request->input('dob');
        }

        if($request->input('marital_status') !== null){
          $obj->marital_status= $request->input('marital_status');
        }

        if($request->input('mobile_number') !== null){
          $obj->mobile_number=  $request->input('mobile_number');
        }

        if($request->input('address') !== null){
          $obj->address= $request->input('address');
        }

        if($request->input('ulr') !== null){
          $obj->ulr= $request->input('ulr');
        }

        $query=  $obj->update(); 
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

      public function autosave_summary_ajax(Request $request ,$id)
      {
        $obj =  Cv::findOrFail($id);
        if($request->input('summary') !== null){
          $obj->summary=  $request->input('summary');
          $obj->update();
        }
      }

      public function autosave_experience_ajax(Request $request ,$id)
      {
        $id = DB::table('experience')->insert([
          'cv_id' => $id,
          'cv_section_id' => $request->input('cv_section_id'),
          'position_or_job_title' => $request->input('position_or_job_title'),
          'company_name' => $request->input('company_name'),
          'start_date' => $request->input('start_date'),
          'end_date' => $request->input('end_date'),
          'city_country' => $request->input('city_country'),
          'responsibilities' => $request->input('responsibilities'),
        ]);
      }

      public function autoupdate_experience_ajax(Request $request ,$id)
          {
            $update=array();
        
            if($request->input('position_or_job_title') !== null){
              $update['position_or_job_title']=$request->input('position_or_job_title');
            }

            if($request->input('company_name') !== null){
              $update['company_name']=$request->input('company_name');
            }

            if($request->input('start_date') !== null){
              $update['start_date']=$request->input('start_date');
            }

            if($request->input('end_date') !== null){
              $update['end_date']=$request->input('end_date');
            }

            if($request->input('city_country') !== null){
              $update['city_country']=$request->input('city_country');
            }

            if($request->input('responsibilities') !== null){
              $update['responsibilities']=$request->input('responsibilities');
            }

            DB::table('experience')
                    ->where('id', $id)
                    ->update($update);
          }

    public function experience(Request $request ,$id)
       {
             if($request->has('section_id')){
                 $section= DB::table('section')->where('id',$request->input('section_id'))->get();
                   $cv_section_id = DB::table('cv_section')->insert([
                 'cv_id' => $id,
                 'section_id' => $request->input('section_id'),
                 'name' => $section[0]->name_en,
                 'icon' => $section[0]->icon,
                 'url' =>$section[0]->url,
                 'created_date' => date('Y-m-d'),
                   ]);
                   $cv_section_id = DB::getPdo()->lastInsertId();
                 return redirect('/experience/'.$id.'?cv_section_id='.$cv_section_id)->with('success','Data have been save sussesfully');
             }
           $experience= DB::table('experience')->where('cv_id',$id)->get();
           $cv_section= DB::table('cv_section')
           ->where('cv_id',$id)
           ->orderByRaw('name ASC')
           ->get();
          return view('cv-experience')
                     ->with('experience',$experience)
                     ->with('cv_section',$cv_section);

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

      public function skills(Request $request ,$id)
         {

           if($request->has('section_id')){
               $section= DB::table('section')->where('id',$request->input('section_id'))->get();
                $cv_section_id = DB::table('cv_section')->insert([
               'cv_id' => $id,
               'section_id' => $request->input('section_id'),
               'name' => $section[0]->name_en,
               'icon' => $section[0]->icon,
               'url' =>$section[0]->url,
               'created_date' => date('Y-m-d'),
                 ]);
                 $cv_section_id = DB::getPdo()->lastInsertId();
               return redirect('/skills/'.$id.'?cv_section_id='.$cv_section_id)->with('success','Data have been save sussesfully');
           }
             $skills= DB::table('skills')->where('cv_id',$id)->get();
             $cv_section= DB::table('cv_section')
             ->where('cv_id',$id)
             ->orderByRaw('name ASC')
             ->get();
            return view('cv-skills')
                       ->with('skills',$skills)
                       ->with('cv_section',$cv_section);

        }

        public function autosave_skills_ajax(Request $request ,$id)
          {
            $id = DB::table('skills')->insert([
              'cv_id' => $id,
              'name' => $request->input('name'),
              'rating' => $request->input('rating'),
            ]);
          }

          public function autoupdate_skills_ajax(Request $request ,$id)
          {
            $update=array();
        
            if($request->input('name') !== null){
              $update['name']=$request->input('name');
            }

            if($request->input('rating') !== null){
              $update['rating']=$request->input('rating');
            }
           
            DB::table('skills')
                    ->where('id', $id)
                    ->update($update);
          }

        public function save_skills(Request $request)
        {

           if($request->has('submit')){
                   $id = DB::table('skills')->insert([
                  'cv_id' => $request->input('cv_id'),
                  'name' => $request->input('name'),
                  'rating' => $request->input('rating'),

                    ]);
                   return redirect('/skills/'.$request->input('cv_id'))->with('success','Data have been save sussesfully');
                  }
                return redirect('/home');

        }

        public function edit_skills(Request $request ,$id)
        {
          $cv= DB::table('skills')->where('id',$id)->first();
         if($request->has('submit')){
                DB::table('skills')
                    ->where('id', $id)
                    ->update([
                      'name' => $request->input('name'),
                      'rating' => $request->input('rating'),

                  ]);
              return redirect('/skills/'.$request->input('cv_id'))->with('success','Data have been updated sussesfully');
              }
             return view('cv-skills-edit')->with('cv',$cv);
        }

        public function delete_skills(Request $request ,$id)
        {
             DB::table('skills')->where('id', '=', $id)->delete();
            return redirect('/skills/'.$request->input('cv_id'))->with('success','Data have been deleted sussesfully');

        }

        public function languages(Request $request ,$id)
           {
             if($request->has('section_id')){
                 $section= DB::table('section')->where('id',$request->input('section_id'))->get();
                    $cv_section_id = DB::table('cv_section')->insert([
                 'cv_id' => $id,
                 'section_id' => $request->input('section_id'),
                 'name' => $section[0]->name_en,
                 'icon' => $section[0]->icon,
                 'url' =>$section[0]->url,
                 'created_date' => date('Y-m-d'),
                   ]);
                   $cv_section_id = DB::getPdo()->lastInsertId();
                 return redirect('/languages/'.$id.'?cv_section_id='.$cv_section_id)->with('success','Data have been save sussesfully');
             }
               $languages= DB::table('languages')->where('cv_id',$id)->get();
               $cv_section= DB::table('cv_section')
               ->where('cv_id',$id)
               ->orderByRaw('name ASC')
               ->get();
              return view('cv-languages')
                         ->with('languages',$languages)
                         ->with('cv_section',$cv_section);

          }

          public function autosave_languages_ajax(Request $request ,$id)
          {
            $id = DB::table('languages')->insert([
              'cv_id' => $id,
              'name' => $request->input('name'),
              'rating' => $request->input('rating'),
            ]);
          }

          public function autoupdate_languages_ajax(Request $request ,$id)
          {
            $update=array();
        
            if($request->input('name') !== null){
              $update['name']=$request->input('name');
            }

            if($request->input('rating') !== null){
              $update['rating']=$request->input('rating');
            }
           
            DB::table('languages')
                    ->where('id', $id)
                    ->update($update);
          }

          public function save_languages(Request $request)
          {

             if($request->has('submit')){
                     $id = DB::table('languages')->insert([
                    'cv_id' => $request->input('cv_id'),
                    'name' => $request->input('name'),
                    'rating' => $request->input('rating'),

                      ]);
                     return redirect('/languages/'.$request->input('cv_id'))->with('success','Data have been save sussesfully');
                    }
                  return redirect('/home');

          }
          public function edit_languages(Request $request ,$id)
          {
            $cv= DB::table('languages')->where('id',$id)->first();
           if($request->has('submit')){
                  DB::table('languages')
                      ->where('id', $id)
                      ->update([
                        'name' => $request->input('name'),
                        'rating' => $request->input('rating'),

                    ]);
                return redirect('/languages/'.$request->input('cv_id'))->with('success','Data have been updated sussesfully');
                }
               return view('cv-languages-edit')->with('cv',$cv);
          }
          public function delete_languages(Request $request ,$id)
          {
               DB::table('languages')->where('id', '=', $id)->delete();
              return redirect('/languages/'.$request->input('cv_id'))->with('success','Data have been deleted sussesfully');

          }

          public function autosave_education_ajax(Request $request ,$id)
          {
            $id = DB::table('education')->insert([
              'cv_id' => $id,
              'cv_section_id' => $request->input('cv_section_id'),
              'field_of_study' => $request->input('field_of_study'),
              'school_university' => $request->input('school_university'),
              'start_date' => $request->input('start_date'),
              'end_date' => $request->input('end_date'),
              'city_country' => $request->input('city_country'),
              'description' => $request->input('description'),
            ]);
          }

          public function autoupdate_education_ajax(Request $request ,$id)
          {
            $update=array();
        
            if($request->input('field_of_study') !== null){
              $update['field_of_study']=$request->input('field_of_study');
            }

            if($request->input('school_university') !== null){
              $update['school_university']=$request->input('school_university');
            }

            if($request->input('start_date') !== null){
              $update['start_date']=$request->input('start_date');
            }

            if($request->input('end_date') !== null){
              $update['end_date']=$request->input('end_date');
            }

            if($request->input('city_country') !== null){
              $update['city_country']=$request->input('city_country');
            }

            if($request->input('description') !== null){
              $update['description']=$request->input('description');
            }

            DB::table('education')
                    ->where('id', $id)
                    ->update($update);
          }
 
      public function education(Request $request ,$id)
         {
           if($request->has('section_id')){
               $section= DB::table('section')->where('id',$request->input('section_id'))->get();
                  $cv_section_id = DB::table('cv_section')->insert([
               'cv_id' => $id,
               'section_id' => $request->input('section_id'),
               'name' => $section[0]->name_en,
               'icon' => $section[0]->icon,
               'url' =>$section[0]->url,
               'created_date' => date('Y-m-d'),
                 ]);
                 $cv_section_id = DB::getPdo()->lastInsertId();
              return redirect('/education/'.$id.'?cv_section_id='.$cv_section_id)->with('success','Data have been save sussesfully');
           }

              $education= DB::table('education')->where('cv_id',$id)->get();
              $cv_section= DB::table('cv_section')
              ->where('cv_id',$id)
              ->orderByRaw('name ASC')
              ->get();
              return view('cv-education')
                        ->with('education',$education)
                        ->with('cv_section',$cv_section);
        }
        public function save_education(Request $request)
        {
            if($request->has('submit')){
                   $id = DB::table('education')->insert([
                  'cv_id' => $request->input('cv_id'),
                  'cv_section_id' => $request->input('cv_section_id'),
                  'field_of_study' => $request->input('field_of_study'),
                  'school_university' => $request->input('school_university'),
                  'start_date' => $request->input('start_date'),
                  'end_date' => $request->input('end_date'),
                  'city_country' => $request->input('city_country'),
                  'description' => $request->input('description'),
                    ]);
                   return redirect('/education/'.$request->input('cv_id').'?cv_section_id='. $request->input('cv_section_id'))->with('success','Data have been save sussesfully');
                  }
                return redirect('/home');

        }
        public function edit_education(Request $request ,$id)
        {
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
              return redirect('/education/'.$request->input('cv_id').'?cv_section_id='. $request->input('cv_section_id'))->with('success','Data have been updated sussesfully');
              }
                $cv= DB::table('education')->where('id',$id)->first();

             return view('cv-education-edit')->with('cv',$cv);
        }
        public function delete_education(Request $request ,$id)
        {
             DB::table('education')->where('id', '=', $id)->delete();
            return redirect('/education/'.$request->input('cv_id').'?cv_section_id='. $request->input('cv_section_id'))->with('success','Data have been deleted sussesfully');

        }
        public function delete_section(Request $request ,$id)
        {
             DB::table('cv_section')->where('id', '=', $request->input('cv_section_id'))->delete();
             DB::table($request->input('url'))->where('cv_section_id', '=', $request->input('cv_section_id'))
                                    ->where('cv_id', '=', $id)
                                    ->delete();

            return redirect('/edit-cv/'.$id)->with('success','Data have been deleted sussesfully');

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
     $img->resize(300,300, function ($constraint) {
     $constraint->aspectRatio();
     })->save($destinationPath.'/'.$input['imagename']);

     $destinationPath = public_path('/images');
     $image->move($destinationPath, $input['imagename']);

     return $fileName;
        }
}
