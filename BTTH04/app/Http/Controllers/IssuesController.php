<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues1= Issue::with('computer')->paginate(10);
        $recordCount = Issue::count();
        $HighCount = Issue::where('urgency', 'High')->count();
        $MediumCount = Issue::where('urgency', 'Medium')->count();
        $LowCount = Issue::where('urgency', 'Low')->count();
        return view('issues.index', compact('issues1','recordCount','HighCount','MediumCount','LowCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $issues2= Issue::with('computer')->get();

        return view('issues.create', compact('issues2'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Issues Inserted!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $issues1 = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issues1', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);
        $issues1 = Issue::find($id);

        // Cập nhật thông tin
        $issues1->update($request->all());

        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Issues Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $issues = Issue::findOrFail($id);
        $issues->delete();

        return redirect()->route('issues.index')->with('success', 'Issues deleted!');
    }
}
