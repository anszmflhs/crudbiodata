<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::all();
        return view('welcome', compact('biodatas'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'photo' => 'image|max:1024',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|unique:biodatas',
        ]);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $filePath = 'uploads/biodata/' . $fileName;

            $file->storeAs('public', $filePath);

            $validatedData['photo'] = $filePath;
        }

        Biodata::create($validatedData);

        return redirect()->route('biodata.index')->with('success', 'New Post Created!');
    }
    public function edit($id)
    {
        $biodata = Biodata::find($id);
        // dd($biodata);
        return view('edit', compact('biodata'));
    }
    public function update(Request $request, Biodata $biodata, $id)
    {
        // dd($request->all());
        $validatedData = $request->only([
            'name' =>$request->input('name'),
            'photo' =>$request->input('photo'),
            'address' =>$request->input('address'),
            'phone' =>$request->input('phone'),
            'email' =>$request->input('email'),
        ]);
        $biodata = $biodata::where('id', $id)->firstorFail();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $filePath = 'uploads/biodata/' . $fileName;

            $file->storeAs('public', $filePath);
            $validatedData['photo'] = $filePath;

            if ($biodata->photo) {
                Storage::delete('public/' . $biodata->photo);
            }
        }

        $biodata->update($validatedData);
        // dd($validatedData);

        return redirect()->route('biodata.index')->with('success', 'Biodata Updated Successfully');
    }

    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);

        if ($biodata->photo) {
            $photoPath = public_path('storage/' . $biodata->photo);

            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $biodata->delete();

        return redirect('/');
    }
}
