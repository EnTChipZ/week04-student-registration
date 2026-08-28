<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the registered students.
     */
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student registration.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student registration in database.
     */
    public function store(Request $request)
    {
        // 1. Validate the user input
        $validatedData = $request->validate([
            'student_id'      => 'required|unique:students,student_id',
            'first_name'      => 'required|string|max:100',
            'middle_name'     => 'nullable|string|max:100',
            'last_name'       => 'required|string|max:100',
            'email'           => 'required|email|unique:students,email',
            'mobile_number'   => 'required|numeric',
            'date_of_birth'   => 'required|date',
            'gender'          => 'required|string',
            'program'         => 'required|string',
            'year_level'      => 'required|string',
            'address'         => 'required|string',
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 2. Handle File Upload
        if ($request->hasFile('profile_picture')) {
            try {
                // Save file in storage/app/public/profile_pictures
                $path = $request->file('profile_picture')->store('profile_pictures', 'public');
                if (!$path) {
                    throw new \Exception('Failed to store uploaded file.');
                }
                $validatedData['profile_picture'] = $path;
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->with('error', 'Image upload failed: ' . $e->getMessage());
            }
        }

        // 3. Store Student Record in MySQL
        $student = Student::create($validatedData);

        // 4. Redirect with a success flash message
        return redirect()
            ->route('students.show', $student->id)
            ->with('success', 'Student registered successfully!');
    }

    /**
     * Display the specified student profile.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }
}
