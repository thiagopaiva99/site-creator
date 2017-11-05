<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Site extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'slug',
        'mysql_password',
        'local_url'
    ];

    public $appends = [
        'size'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'mysql_password' => 'string',
        'local_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'local_url' => 'url'
    ];

    public function getSizeAttribute(){
        $slug = $this->attributes['slug'];

        $size = 0;

        if( File::isDirectory($slug)){
            foreach( File::allFiles(public_path($slug)) as $file){
                $size += $file->getSize();
            }

            return number_format($size / 1048576,2) . ' Mb';
        }else{
            return 'NaN';
        }
    }
}
