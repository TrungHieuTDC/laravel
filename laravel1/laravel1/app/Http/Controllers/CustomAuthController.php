<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

//session_start();
//session_destroy();
//Unknow
class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function viewHello($name,$year,Request $request){
        $url = $request->input();
        return view('auth.hello1')->with('name',$name)->with('year',$year)->with('url',$url);
        
        
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
       // var_dump(($credentials['email'] == 'admin@gmail.com') && Auth::attempt($credentials));
        if (($credentials['email'] == 'admin@gmail.com') && Auth::attempt($credentials)) {
            $_SESSION['id_user'] = Auth::user()->id;
            return redirect('/admin/category');
        }else if(!($credentials['email'] == 'admin@gmail.com')&& Auth::attempt($credentials)){
            $_SESSION['id_user'] = Auth::user()->id;
            return redirect('/auth/home-1');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function customer_Login(Request $request, $id){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $_SESSION['user_name'] = $request->email;
                $_SESSION['password'] = $request -> password;
            return redirect('/auth/detail/'.$id);
                
        }
        

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'sdt' => ['required', 'regex:/^\d{10,11}$/'],
            'image' =>'required',
        ]);
        if ($validate->fails()) {
            echo ("<script>alert('Nhap sai cac truong vui long nhap lai') </script>");
            return view('auth.registration');
        }else{
            // $data = $request->all();
            // $check = $this->create($data,$request);
            $check = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request ->email,
                'sdt' => $request->sdt,
                'image' =>$request->image,
                'password' =>Hash::make($request ->password)
            ]);

            return redirect("/login")->withSuccess('You have signed-in');
        }
    }
    
    public function create(array $data, Request $request)
    {   
        $validate = Validator::make($request->all(),[
            'name'=> 'required:max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|min:8',
        ]);

        if ($validate->fails()) {
            return view('auth.registration');
        }else{
            if ($request->has('image')){
                $file = $request-> image;
                $fileName = $file->getClientoriginalName();
                $file->move(public_path('images'),$fileName);
             }
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'sdt' => $data['sdt'],
                'image' => $fileName,
                'password' => Hash::make($data['password'])
            ]);
        }
    }

    public function dashboard()
    {
        if(Auth::check()){ 
            Session::put("user",Auth::id());        
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function checkAuth($email,$password) {
        $data = DB::table('authors')->where('email', '=',$email)->andwhere('password','=',$password)->get();
        return $data;
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        unset($_SESSION['user_name']);
        unset($_SESSION['password']);
        return Redirect('login');
    }

    // lay nguoi dùng theo id
    public function viewUser($id) {
       if(count(DB::table("users")->select()->where("id","=",$id)->get()) == 0){
            return view("auth.404");
       }
       else{
        $user = DB::table("users")->select()->where("id","=",$id)->get();
        return view('viewuser')->with("user",$user);
       }
    }

    public function getUserID($id){
        $data = DB::table("users")->select()->where("id","=",$id)->get();
        return $data;
    }

    // lấy tất cả người dùng
    public function viewAll() {
        $user = DB::table("users")->select()->get();
        return view('viewAll')->with("user",$user);
    }



    
}