<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }

    public function store(Request $request){
        
        Student::create([
            'name'  => $request->name,
            'email'  => $request->email,
            'cell'  => $request->cell,
            'uname'  => $request->uname,
            'gender'  => $request->gender,
            'edu'  => $request->edu,
        ]);
        return true;
    }

    public function allStudents(){
       $all_data =  Student::all();

        // echo $all_data ->name;

       // return Student::all();    

       $user_data = '';
       $init = 1;
       foreach($all_data as $data){
           $user_data .= '<tr>';
           $user_data .= '<td> ' . $init++ .'</td>';
           $user_data .= '<td> ' . $data->name . ' </td>';
           $user_data .= '<td> ' . $data->email . ' </td>';
           $user_data .= '<td> ' . $data->cell . ' </td>';
           $user_data .= '<td> ' . $data->uname . ' </td>';
           $user_data .= '<td> ' . $data->gender . ' </td>';
           $user_data .= '<td> ' . $data->edu . ' </td>';
           $user_data .= '<td><a href="#" id="edit_stu_btn" edit_id="'. $data -> id .'" class="btn btn-sm btn-warning">Edit</a> <a id="delete_stu_btn" href="#" delete_id="'. $data -> id .'" class="btn btn-sm btn-danger">Delete</a></td>';
           $user_data .= '</tr>';
       }
       return $user_data;
    }

    public function edit($id){
        $stu_data = Student::find($id);


        $gender = '
            <label for="">Gender</label>
            <input name="gender" class="" '. ($stu_data->gender == "Male" ? 'checked' : ' ') .' type="radio" id="MaleEdit" value="Male"> <label for="MaleEdit">Male</label>
            <input name="gender" class="" '. ($stu_data->gender == "Female" ? 'checked' : ' ').' type="radio" id="FemaleEdit" value="Female"> <label for="FemaleEdit">Female</label>
        
        '; 


        $edu = '
            <option  ' . ($stu_data -> edu == '' ? 'selected' : '') .' value="">-select-</option>
            <option ' . ($stu_data -> edu == 'JSC' ? 'selected' : '') .' value="JSC">JSC</option>
            <option ' . ($stu_data -> edu == 'SSC' ? 'selected' : '') .' value="SSC">SSC</option>
        ';


        return [
            'id' => $stu_data-> id,
            'name' => $stu_data -> name,
            'email' => $stu_data -> email,
            'cell' => $stu_data -> cell,
            'uname' => $stu_data -> uname,
            'gender' => $gender,
            'edu'   => $edu

        ];
    }

    public function update(Request $request){
        $id = $request -> update_id;

        $update_data = Student::find($id);

        $update_data -> name = $request ->name;
        $update_data -> email = $request ->email;
        $update_data -> cell = $request ->cell;
        $update_data -> uname = $request ->uname;
        $update_data -> gender = $request ->gender;
        $update_data -> edu = $request ->edu;
        $update_data ->update();

        return true;
    }


    public function deleteStudent($id){

        $delete_stu = Student::find($id);
        $delete_stu -> delete();

        return true;

    }
}
