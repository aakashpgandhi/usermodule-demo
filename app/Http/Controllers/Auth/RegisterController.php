<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Vendor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:vendor');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // start by juhi
    public function showVendorRegisterForm()
    {
        return view('vendor.auth.vendorRegister', ['url' => 'vendor']);
    }
    public function avatar($files){
        $avatarMedia =$files;
        $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
        $photoName = time() .'_'.$strippedName;
        try {
            Storage::disk('local')->put('/public/uploads/vendor/avatar/'.$photoName, file_get_contents($avatarMedia));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $photoName;
    }
    public function document($files){
        $avatarMedia =$files;
        $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
        $photoName = time() .'_'.$strippedName;
        try {
            Storage::disk('local')->put('/public/uploads/vendor/document/'.$photoName, file_get_contents($avatarMedia));
        } catch (\Throwable $th) {
        }
        return $photoName;
    }
    public function uploadVendorAvatar(UploadedFile $file)
    {
        $strippedName = str_replace(' ', '', $file->getClientOriginalName());
        $avatarMedia =$file;
        $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
        $photoName = time() .'_'.$strippedName;
        try {
           $data =  Storage::disk('local')->put('/public/uploads/vendor/profile/'.$photoName, file_get_contents($avatarMedia));
        } catch (\Throwable $th) {
        }
        return $photoName;
    }

    public function uploadVendorDocument(UploadedFile $file)
    {
        $strippedName = str_replace(' ', '', $file->getClientOriginalName());
        $avatarMedia =$file;
        $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
        $photoName = time() .'_'.$strippedName;
        try {
            Storage::disk('local')->put('/public/uploads/vendor/document/'.$photoName, file_get_contents($avatarMedia));
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $photoName;
    }
    protected function createVendor(Request $request)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        $request->validate([
            'name'                      => ['required', 'string', 'max:255'],
            'avatar'                    => ['required','image','mimes:jpeg,png,jpg,gif'],
            'business_registration_document' => ['required','image','mimes:jpeg,png,jpg,gif'],
            'phone_number'              => ['required', 'numeric','unique:vendors,phone_number'],
            'email'                     => ['required', 'string', 'email', 'max:255', 'unique:vendors,business_email'],
            'password'                  => ['required', 'string', 'min:8', 'confirmed'],
            'business_store_address'    => ['required', 'string'],
            'business_headquarters_address' => ['required', 'string'],
            'website'                   => ['required', 'regex:' . $regex,],
            'abn_acn'                   => ['required', 'string'],
        ]);
        $saveImage = null;
        $registrationDocument = null;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $saveImage = $this->uploadVendorAvatar($file);

        }
        if($request->hasFile('business_registration_document')){
            $file = $request->file('business_registration_document');          
            $registrationDocument = $this->uploadVendorDocument($file);
        }

        $vendor = [
            'business_name'             => $request['name'],
            'business_email'            => $request['email'],
            'phone_number'              => $request['phone_number'],
            'store_address'             => $request['business_store_address'],
            'headquarters_address'      => $request['business_headquarters_address'],
            'website'                   => $request['website'],
            'abn_no'                    => $request['abn_acn'],
            'vendor_avatar'             => $saveImage,
            'registration_document'     => $registrationDocument,
            'password'                  => Hash::make($request['password']),
        ];        
        if(Vendor::create($vendor))
        {    
            $output = array("status"=>true, "message"=>"Vendor Created Successfully" ,'url' => route('login.vendor'));
            echo json_encode($output);
            return;
        }else{          
            $output = array("status"=>false, "error"=>"Somthing Want Wrong");
            echo json_encode($output);
            return;
        }
       
    }
    // end by juhi
}
