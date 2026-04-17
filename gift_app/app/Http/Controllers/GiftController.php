<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gift;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::all();
        return view('gifts.index', compact('gifts'));
    }

    public function create()
    {
        return view('gifts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|min:3|max:50",
            "url" => "nullable|url:http,https",
            "details" => "nullable|string",
            "price" => "required|decimal:0,2"
        ]);

        Gift::create($data);

        return redirect()->route('index');
    }

    public function show(string $id)
    {
        $gift = Gift::findOrFail($id);

        return view('gifts.show', compact('gift'));
    }

    public function edit(string $id)
    {
        $gift = Gift::findOrFail($id);

        return view('gifts.edit', compact('gift'));
    }

    public function update(Request $request, string $id)
    {
        $gift = Gift::findOrFail($id);

        $data = $request->validate([
            "name" => "required|string|min:3|max:50",
            "url" => "nullable|url:http,https",
            "details" => "nullable|string",
            "price" => "required|decimal:0,2"
        ]);

        $gift->update($data);

        return redirect()->route('index');
    }

    public function destroy(string $id)
    {
        $gift = Gift::findOrFail($id);

        $gift->delete();

        return redirect()->route('index');
    }
}
