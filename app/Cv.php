<?php

namespace App;
use App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
  protected $table ='cvs';
  protected $fillable =['user_id','job_category_id','resume_name','resume_language_id','resume_templet_id','experience_level_id'];

  public function name_by_id($table ,$id ,$text='name')
    {
      $row = DB::table($table)->where('id',$id)->first();
      $locale=App::getLocale();
      $name = $text.'_'.$locale;
      $column= $row->$name;
     return $column;

  }

}
