<?php

namespace App\Http\Controllers\Back;

use App\Catalog;
use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Validator;

class GalleryController extends Controller
{
    public function index($id)
    {
        return view('back.gallery.index')->with([
            'catalog' => Catalog::with('gallery')->where('id', $id)->first()
        ]);
    }

    public function add($id)
    {
        return view('back.gallery.add')->with([
            'catalog' => Catalog::find($id)
        ]);
    }

    public function store(Request $request, $id)
    {
        $catalog = Catalog::find($id);

        $gallery = new Gallery();
        $gallery->disabled = 0;
        $gallery->catalogId = $catalog->id;
        $gallery->sort = 1;

        if ($gallery->save()) {

            $gallery->checkAndSaveThumbnail($request);

            return redirect()->route('gallery.index', $catalog->id)->with(['message' => 'Image successfully added!']);
        } else {
            return redirect()
                ->back()
                ->withErrors(['message' => 'Undefined error']);
        }

    }

    public function destroy($id)
    {
        $model = Gallery::find($id);

        if ($model) {
            $catalogId = $model->catalogId;
            $model->delete();
        }

        return redirect()->route('gallery.index', $catalogId)->with(['message' => 'Image deleted!']);
    }
}
