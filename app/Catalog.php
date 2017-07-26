<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Catalog extends Model
{
    public static $imagePath = 'storage/catalog/';

    protected $table = 'catalog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'alias', 'description', 'image', 'disabled'
    ];

    public $timestamps = false;

    public function checkAndSaveThumbnail(Request $request)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $dir = public_path() . '/' . self::$imagePath;
            $filename = $file->getClientOriginalName();

            if (!is_dir($dir)) {
                mkdir($dir);
                chmod($dir, 0777);
            }

            $file->move($dir, $filename);

            $this->image = self::$imagePath . $filename;

            $this->save();
        }
    }

    /**
     * Get the comments for the blog post.
     */
    public function gallery()
    {
        return $this->hasMany('App\Gallery', 'catalogId', 'id');
    }
}
