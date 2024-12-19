<?php

namespace App\Http\Controllers;

use App\Models\issue;
use App\Models\computer;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10);
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $issues = issue::all();
        $computers = computer::all();
        return view('issues.create', compact('issues','computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'id' => 'required|max:255',
        //     'computer_name' => 'required|max:255',
        //     'model' => 'required|max:255',
        //     'reported_by' => 'required|max:100',
        //     'reported_date' => 'required|date',
        //     'urgency' => 'required',
        //     'status' => 'required',
        // ]);

        issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Đồ án đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issues = issue::findOrFail($id);
        $computers = computer::all();
        return view('issues.edit', compact('issues','computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',            
            'reported_by' => 'required|max:100',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);
    
        // Tìm đối tượng Thesis cần cập nhật
        $issues = issue::find($id);
        
        // Cập nhật thông tin
        $issues->update($request->all());
    
        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Đồ án được cập nhật thành công');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issues = issue::findOrFail($id);
        $issues->delete();

        return redirect()->route('issues.index')->with('success', 'Đồ án đã được xóa thành công!');
    }
}
