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

        $editstudent = DB::statement("UPDATE studenttbl SET  fname=?, mname=?, lname=?, gender=?, phone=?, email=?, password=? where stuid=?",[$request->fname,$request->mname,$request->lname,$request->gender,$request->phone,$request->email,$request->password,$request->stuid]);
        return $editstudent;
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
       
        $value = Session::get('username');
        // echo $value;
        $userinfo = DB::select("SELECT * FROM studenttbl WHERE email = ? OR phone = ?",[$value,$value]);
        $id = $userinfo[0]->stuid;
        // echo $id;
        
        $fetchstudent['data'] = DB::select("SELECT * FROM studenttbl WHERE stuid=?",[$id]);

        

       
        return $fetchstudent;
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
