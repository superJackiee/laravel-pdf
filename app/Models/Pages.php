<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Pages extends Model
{
    //
    protected $table ='pages';
    protected $fillable =['title_en','title_ar','subtitle','description_en','description_ar'];


    public function TextTrans($text)
      {
    $locale=App::getLocale();
    $column=$text.'_'.$locale;

    return $this->{$column};
    }
}
