<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Slider extends Model
{
    public static $imagePath = 'storage/slider/';

    protected $table = 'slider';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'sort', 'disabled'
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
}
