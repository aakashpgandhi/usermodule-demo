<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Vendor;
use App\Models\Store;
use App\Models\Admin;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd("hi");
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:vendor')->except('logout');
        $this->middleware('guest:store')->except('logout');

    }

    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        $checkStatus = Admin::where('email', $request->email)->first();

        if($checkStatus){
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return redirect()->intended('/admin/home');
            }
        }
        else{
            return redirect()->back()->with('error', 'This Email Id Does not Exist');   
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    // start here from my side
    public function showVendorLoginForm()
    {
        return view('vendor.auth.login');
    }

    public function vendorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
            
        $checkStatus = Vendor::where('business_email', $request->email)->first();

        if($checkStatus){
            if($checkStatus['is_active'] == 0){
                return back()->with('error', 'Your Account Is In-active Please Contact To Admin'); 
            }else{            
                if (Auth::guard('vendor')->attempt(['business_email' => $request->email, 'password' => $request->password], $request->get('remember'))) { 
            
                    return redirect()->intended('/vendor/home');                    
                  
                }else{
                    return redirect()->back()->with('error', 'Oops Password Is Wrong');
                }
            }
            return back()->withInput($request->only('email', 'remember'));
        }else{
            return redirect()->back()->with('error', 'This Email Id Does not Exist');   
        }
    }
    // end here from my side
    // start here from my side
    public function showStoreLoginForm()
    {
        return view('store.auth.login');
    }

    public function storeLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        $checkStatus = Store::where('store_email', $request->email)->first();

        if($checkStatus){  
            if (Auth::guard('store')->attempt(['store_email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                return redirect()->intended('/store/home');
            }else{
                return redirect()->back()->with('error', 'Oops Password Is Wrong'); 
            }
        }else{
            return redirect()->back()->with('error', 'This Email Id Does not Exist');   
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    // end here from my side
}
