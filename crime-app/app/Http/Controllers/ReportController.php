<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'description' => 'required|string|max:1000',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'severity_scale' => ['required', Rule::in(['low', 'medium', 'high'])],
        ]);

        // Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = 'images/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        // Insert into database
        Report::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'date' => $request->date,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'severity_scale' => $request->severity_scale,
            'image' => $imageName, // nullable if no file uploaded
        ]);

        return redirect()->route('reports.index')->with('success', 'Report added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return view('reports.edit')->with('report', $report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'description' => 'required|string|max:1000',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'severity_scale' => [
                'required',
                Rule::in(['low', 'medium', 'high']),
            ],
        ]);

        if($request-> hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $report->update([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'date' => $request->date,
            'image' => $imageName ?? $report->image,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'severity_scale' => $request->severity_scale,
        ]);

        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }
}
