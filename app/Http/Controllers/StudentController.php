<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Student_qualification;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(5);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $students = Student::all()->toArray();
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_id' => 'required',
            'mobile' => 'required|between:10 ,12 ',
            'dob' => 'required',
            'gender' => 'required',
            'hobbies' => 'required',
            'address' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'courses' => 'required',
        ], [
            'first_name.required' => 'name please...',
            'last_name.required' => 'please fill the LastName',
            // 'email_id.ema' => 'valided',
            // 'mobile.required' => 'valided'
        ]);

        $data = $request->all();
        // dd($data);
        $data['hobbies'] = implode(',', $data['hobbies']);
        // dd($data['hobbies']);
        $student = Student::create($data);
        // dd($student);

        $stId = $student->id;
        // dd($stId);
        $_examination = $request->examination;
        // dd($_examination);
        $_board = $request->board;
        // dd($_board);
        $_percentage = $request->percentage;
        $_passing_of_year = $request->passing_of_year;
        // dd($_passing_of_year);

        foreach ($_examination as $key => $_exam) {

            Student_qualification::create([
                "examination" => $_exam,
                "board" => $_board[$key],
                "percentage" => $_percentage[$key],
                "passing_of_year" => $_passing_of_year[$key],
                "student_id" => $stId
            ]);
        }
        return redirect()->route('student.index')->withSuccess('datainserted...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $student = Student::find($id);
        // $data['hobbies']=implode(',',$data['hobbies']);
        // $stul = Student_qualification::where('student_id', $id)->get();
        // dd($stul);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Student $student)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_id' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'hobbies' => 'required',
            'address' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            'courses' => 'required',
        ], [
            'first_name.required' => 'name please...',
            'last_name.required' => 'please fill the LastName',
            'email_id.ema' => 'valided',
            // 'mobile.required' => 'valided'
        ]);

        $data = $request->except('_token','_method');

        // $_fist = $request->first_name;
        // $_last = $request->last_name;
        // $_dob = $request->dob;
        // $_email = $request->email_id;
        // $_mobile = $request->mobile;
        // $_gender = $request->gender;
        // $add = $request->address;
        // $ct = $request->city;
        // $pin = $request->pin_code;
        // $st = $request->state;
        // $coun = $request->country;
        // $cours = $request->courses;
        // $hobb = $request->hobbies;
        // $data = [
        //     "first_name" => $_fist,
        //     "last_name" => $_last,
        //     "dob" => $_dob,
        //     "email_id" => $_email,
        //     "mobile" => $_mobile,
        //     "gender" => $_gender,
        //     "address" => $add,
        //     "city" => $ct,
        //     "pin_code" => $pin,
        //     "state" => $st,
        //     "country" => $coun,
        //     "hobbies" =>$hobb,
        //     "courses" => $cours
        // ];
        $data['hobbies'] = implode(',', $data['hobbies']);
    
        $student->update($data);

        $stId = $request->stuId;
        $_exam = $request->examination;
        $_board = $request->board;
        $_perc = $request->percentage;
        $_poy = $request->passing_of_year;
        // dd($_exam);

        foreach ($_exam as $key => $_exami) {
            $_stid = $stId[$key];
            Student_qualification::where('id', $_stid)->update([
                "examination" => $_exami,
                "board" => $_board[$key],
                "percentage" => $_perc[$key],
                "passing_of_year" => $_poy[$key],
                // "student_id" => $stId

            ]);
        }

        return redirect()->route('student.index')->withSuccess('datainserted...');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        return redirect()->route('student.index')->withSuccess('data deleted...');

    }
}