<?php

namespace App\Http\Controllers\Admin;


use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Transaction::with([
            'details' => function($query) {
            $query->whereNull('deleted_at');
        }, 'travel_package', 'user'
        ])->get();

        return view('pages.admin.transaction.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('pages.admin.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        Transaction::create($data);
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Transaction::with([
            'details', 'travel_package', 'user'
        ])->findOrFail($id);

        return view('pages.admin.transaction.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, string $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = Transaction::findOrFail($id);
        $item->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();
        return redirect()->route('transaction.index');
        
    }
}
