<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::all();
        return view('staff.chapters.index', compact('chapters'));
    }

    public function store(ChapterRequest $request)
    {
        try {
            $validated_data = $request->validated();
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        Chapter::create($validated_data);

        return redirect()->back()->with('success', 'Chapter successfully added!');
    }

    public function update(ChapterRequest $request, $id)
    {
        try {
            $validated_data = $request->validated();
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        $chapter = Chapter::findOrFail($id);
        $chapter->update($validated_data);

        return redirect()->back()->with('success', 'Chapter successfully updated!');
    }

    public function destroy($id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->delete();

        return redirect()->back()->with('success', 'Chapter successfully deleted!');
    }
}
