<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\section;
use Illuminate\Http\Request;
use Usernotnull\Toast\Toast;
use Usernotnull\Toast\ToastManager;

class SectionController extends Controller
{
    // get all sections
    public function index()
    {
        $sections = Section::all();
        return view('admin.section.index',compact('sections'));

    }
    // save section
    public function store(Request $request)
    {
        try {
            // validated name
            $validated = $request->validate([
                'name' =>'required|max:255'
            ]);
            // add new section
            section::create([
                'name'        => $request->name,
                'description' => $request->desc
            ]);

            flash()->success('Operation completed successfully.');
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }
    // update section
    public function update(Request $request)
    {
        try {
            // validated name
            $validated = $request->validate([
                'name' =>'required|max:255'
            ]);
            // update section
            $section = section::findOrFail($request->id);

            $section->update([
                'name'        => $request->name,
                'description' => $request->desc
            ]);

            flash()->success('Operation completed successfully.');
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }

    // delete section
    public function destroy(Request $request)
    {
        try {
            $section = section::findOrFail($request->id)->delete();
            flash()->success('Operation completed successfully.');
            return redirect()->back();
        } catch (\Throwable $th) {
            flash()->error('An error has occurred please try again later.');
            return redirect()->back();
        }
    }
}
