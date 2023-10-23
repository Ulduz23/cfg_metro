<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Http\Resources\BannerResource;
use App\Models\Banner\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    private $path = 'images/';

    public function list()
    {
        $this->authorize('list', new Banner);

        return view('banner.list');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BannerResource::collection(Banner::paginate(10));
    }

    public function create()
    {
        $this->authorize('create', new Banner);
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request, Banner $banner)
    {
        $this->authorize('store', $banner);

        $data = $request->all();

        $data['image'] = $request->image->store(
            $this->path,
            $banner->getDiskName()
        );

        return new BannerResource(Banner::create($data));
    }

    public function view(Banner $banner)
    {
        $this->authorize('view', $banner);

        return view('banner.view', [
            'banner' => $banner
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return new BannerResource($banner);
    }

    public function edit(Banner $banner)
    {
        $this->authorize('edit', $banner);
        return view('banner.edit', [
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $this->authorize('update', $banner);

        $imageNamePieces = explode('/', $banner->image);
        $imageName = end($imageNamePieces);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->storeAs(
                $this->path,
                $imageName,
                $banner->getDiskName()
            );
        }

        $banner->update($data);

        return redirect(route('banner.view', [
            'banner' => $banner->id
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $this->authorize('destroy', $banner);

        Storage::disk($this->disk)->delete($banner->image);

        $banner->delete();

        return redirect(route('banner.list'));
    }
}
