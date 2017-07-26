<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Gallery extends Model
{
    public static $imagePath = 'storage/catalog/gallery/';

    protected $table = 'gallery';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'catalogId',
        'image',
        'sort',
        'disabled'
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

            $dir .= $this->catalogId . '/';

            if (!is_dir($dir)) {
                mkdir($dir);
                chmod($dir, 0777);
            }

            $file->move($dir, $filename);

            $this->image = self::$imagePath . $this->catalogId . '/' . $filename;

            $this->save();
        }
    }
}
