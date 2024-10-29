<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        try {
            if($user->is_admin === 1) {
                // Store the image and set the path
                if ($request->hasFile('image_path')) {
                    $data['image_path'] = $request->file('image_path')->store('images', 'public');
                }
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

        // Save to the database

        Banner::create($data);

        return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $user = Auth::user();

        try {
            if($user->is_admin === 1) {
                $data = $request->validate([
                    'title' => 'required|string|max:255',
                    'description' => 'required|string',
                    'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                    'button_text' => 'required|string|max:255',
                    'button_link' => 'required|string|max:255',
                ]);

                if ($request->hasFile('image_path')) {
                    $data['image_path'] = $request->file('image_path')->store('images', 'public');
                }

                $banner->update($data);

                return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
            }

    } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }
}
