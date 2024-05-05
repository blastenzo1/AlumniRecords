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
        $chapters = Chapter::paginate(1);
        return view('staff.chapters.index', compact('chapters'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $chapters = Chapter::where('name', 'like', '%' . $query . '%')
            ->orWhere('representation', 'like', '%' . $query . '%')
            ->paginate(10);

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
