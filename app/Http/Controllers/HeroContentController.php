<?php

namespace App\Http\Controllers;

use App\Models\HeroContent;
use Illuminate\Http\Request;

class HeroContentController extends Controller
{
    public function index() {

        $heroContent = HeroContent::first();
        return view('hero.index', compact(['heroContent']));
    }

    public function store(Request $request) {

        // dd($request->all());

        $content = HeroContent::first();

        $request->validate([
            'description' => 'required',
            'leftImage' => 'image|mimes:jpeg,png,jpg,gif',
            'centerImage' => 'image|mimes:jpeg,png,jpg,gif',
            'rightImage' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $contentArray = [
            'description' => $request->description,
            'leftImage' => $request->hasFile('leftImage') ? $request->file('leftImage')->store('hero', 'public') : $content->leftImage,
            'centerImage' => $request->hasFile('centerImage') ? $request->file('centerImage')->store('hero', 'public') : $content->centerImage,
            'rightImage' => $request->hasFile('rightImage') ? $request->file('rightImage')->store('hero', 'public') : $content->rightImage,
        ];

        if (!$content) {
            $created = HeroContent::create($contentArray);
            if (!$created) {
                return back()->with('error', 'Hero Content not saved!');
            }
        } else {
            $updated = $content->update($contentArray);
            if (!$updated) {
                return back()->with('error', 'Hero Content not saved!');
            }
        }
        return back()->with('success', 'Hero Content Updated!');

    }

    public function edit($id) {
        $heroContent = HeroContent::find($id);
        return view('hero.edit', compact('heroContent'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'description' => 'required',
            'leftImage' => 'required',
            'centerImage' => 'required',
            'rightImage' => 'required',
        ]);

        $heroContent = HeroContent::find($id);
        $heroContent->description = $request->get('description');
        $heroContent->leftImage = $request->get('leftImage');
        $heroContent->centerImage = $request->get('centerImage');
        $heroContent->rightImage = $request->get('rightImage');
        $heroContent->save();

        return redirect('/hero')->with('success', 'Hero Content updated!');
    }
}
