<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Http\Resources\SlideResource;
use App\Models\Slide\Slide;

class SlideController extends Controller
{
    private $path = 'slides/';

    public function list(Slide $slide)
    {
        $this->authorize('list', $slide);

        return view('slide.list', [
            'slide' => $slide->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SlideResource::collection(Slide::paginate(10));
    }

    public function create()
    {
        $this->authorize('create', new Slide);

        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlideRequest $request, Slide $slide)
    {
        $this->authorize('store', $slide);

        $data = $request->all();

        $data['image'] = $request->image->store(
            $this->path,
            $slide->getDiskName()
        );

        return new SlideResource(Slide::create($data));
    }

    public function edit(Slide $slide)
    {
        $this->authorize('edit', $slide);

        return view('slide.edit', [
            'slide' => $slide
        ]);
    }

    public function view(Slide $slide)
    {
        $this->authorize('view', $slide);

        return view('slide.view');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        return new SlideResource($slide);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $this->authorize('update', $slide);

        $imageNamePieces = explode('/', $slide->image);
        $imageName = end($imageNamePieces);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->storeAs(
                $this->path,
                $imageName,
                $slide->getDiskName()
            );
        }

        $slide->update($data);

        return redirect(route('slide.view', [
            'slide' => $slide->id
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        $this->authorize('destroy', $slide);

        $slide->delete();

        return redirect(route('slide.list'));
    }
}
