<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Stub;

class DemoController extends Controller
{
    public function index(){
        
        $students = Student::all();
        return view('welcome', compact('students'));


    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'age'   => 'required|integer|min:1|max:150',
        ]);

        Student::create($validateData);

        
        return redirect('/')->with('success', 'Student has been added');
    }

    public function edit($id){
        
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id){

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email,' . $id,
            'age' => 'required|integer|min:1|max:150',
        ]);

        Student::whereId($id)->update($validateData);

        return redirect('/')->with('success', 'Student has been updated');
    }

    public function delete($id){

        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('/')->with('success', 'Student has been Deleted');
    }

    
}
