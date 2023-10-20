<?php

namespace App\Http\Controllers;

use App\Models\Gallery\Gallery;
use App\Http\Resources\GalleryResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;

class GalleryController extends Controller
{
    public $disk = 'uploads';
    public $imagesPath = 'gallery';

    public function __construct()
    {
        $this->middleware('verify.accept.only.json.request')->only([
            'index',
            'show'
        ]);
    }

    public function list()
    {
        $this->authorize('list', new Gallery);

        return view('gallery.list');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new GalleryResource(Gallery::paginate(10));
    }

    public function create()
    {
        $this->authorize('create', new Gallery);

        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {
        $this->authorize('create', new Gallery());

        $data = $request->all();

        $data['image'] = $request->image->store($this->imagesPath, $this->disk);

        return new GalleryResource(Gallery::create($data));
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return new GalleryResource($gallery);
    }

    public function view(Gallery $gallery)
    {
        $this->authorize('view', $gallery);

        return view('gallery.view');
    }

    public function edit(Gallery $gallery)
    {
        $this->authorize('edit', $gallery);

        return view('gallery.update', [
            'gallery' => $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $this->authorize('update', new Gallery);

        $imageNamePieces = explode('/', $gallery->image);
        $imageName = end($imageNamePieces);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->storeAs(
                $this->imagesPath,
                $imageName,
                $this->disk
            );
        }

        $gallery->update($data);

        return redirect(route('gallery.show', [
            'gallery' => $gallery->id
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $this->authorize('destroy', $gallery);

        $gallery->delete();

        return redirect(route('gallery.index'));
    }
}
