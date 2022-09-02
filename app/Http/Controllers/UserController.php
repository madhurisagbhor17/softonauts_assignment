<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function addStudent(Request $request)
    {
        

        $addstudent = DB::statement("INSERT INTO studenttbl(fname, mname, lname, gender, phone, email,password) VALUES (?,?,?,?,?,?,?)",[$request->fname, $request->mname, $request->lname, $request->gender, $request->phone,$request->email, $request->password]);

        
        $id = DB::getPdo()->lastInsertId(); 

        foreach ($request->subject as $value)
        {
            $addsub = DB::statement("INSERT INTO subusermaptbl(stuid, subid) VALUES (?,?)",[$id,$value]);
        }
 
            if($addstudent==1 && $addsub==1 )
            {
                echo "form added successfully";
                // print "item added";
            }
            else
            {
            echo"item not added";
            }
    }


   

    public function editStudent(Request $request)
    {
        
        $edit = DB::select("SELECT * FROM studenttbl WHERE stuid=?",[$request->stuid]);
        $fname = $edit[0]->fname;
        $mname = $edit[0]->mname;
        $lname = $edit[0]->lname;
        $gender = $edit[0]->gender;
        $phone = $edit[0]->phone;
        $email = $edit[0]->email;
        $password = $edit[0]->password;
        // $subject = $edit[0]->subject;
        
        // echo $fname;
        return view('edit',compact('fname','mname','lname','gender','phone','email','password'));
    } 

    public function deleteStudent(Request $request)
    {
        $deleteStudent = DB::statement("DELETE FROM studenttbl WHERE stuid=?",[$request->stuid]);
        echo "deleted sucessfully";
        return redirect('/user');
    }

    public function userLogin(Request $request)
    {
        $id = $request->post('username');
        $pass = $request->post('password');

        $userlogin = DB::select("SELECT * FROM studenttbl WHERE (email =? OR phone=?) AND password =?",[$id,$id,$pass]);
       
        if(count($userlogin))
        {
           Session::put('username',$id);
           return redirect('/user');
        
       
        }
        else
        {
            Session::put('error',$id);
            return redirect('/');

            echo "not login";
        }

        

    }

    public function userInfo()
    {
        $value = Session::get('username');
        // echo $value;
        
        $userinfo = DB::select("SELECT * FROM studenttbl WHERE email = ? OR phone = ?",[$value,$value]);
        $username ="";
        // print_r($userinfo);
        if(count($userinfo)){
            $username = $userinfo[0]->fname." ".$userinfo[0]->lname;
            // return view('user',compact('userinfo'));

            
            return ($username);
        }
        else{
            return $username;
        }
        
    }

    

    public function fetchStudent(Request $request)
    {
       
        $fetchallstudent['data'] = DB::select("SELECT * FROM studenttbl");
        return $fetchallstudent;

        // $value = Session::get('username');
        // $userinfo = DB::select("SELECT * FROM studenttbl WHERE email = ? OR phone = ?",[$value,$value]);
        // $id = $userinfo[0]->stuid;
        // $fetchstudent['data'] = DB::select("SELECT * FROM studenttbl WHERE stuid=?",[$id]);
        // return $fetchstudent;


        $subject = DB::select("select subid from subusermaptbl");
        
        $string = '';

        foreach($subject as $a)
        {    
            foreach($a as $b)
            {
                $string .= $b.',';
            }
        }
        
        print_r($string);

        

        



        
        

        


    




    } 

   

    public function userLogout()
    {
        Session::forget('username');
        return redirect('/');
    }

    public function fetchSub(Request $request)
    {
        $fetchsub['data'] = DB::select("SELECT * FROM subjecttbl");
        return $fetchsub;
    }
    
    
}
