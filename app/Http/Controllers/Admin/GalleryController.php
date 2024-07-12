<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::with(['travel_package'])->get();

        return view('pages.admin.gallery.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $travel_package = TravelPackage::all();
        return view('pages.admin.gallery.create', [
            'travel_packages' => $travel_package
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');

        Gallery::create($data);
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Gallery::findOrFail($id);
        $travel_package = TravelPackage::all();

        return view('pages.admin.gallery.edit', [
            'item' => $item,
            'travel_packages' => $travel_package
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, string $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');

        $item = Gallery::findOrFail($id);
        $item->update($data);

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();
        return redirect()->route('gallery.index');
        
    }
}
