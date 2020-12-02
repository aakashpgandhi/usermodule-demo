<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\VendorContract;
use Auth;
use App\Models\Vendor;
use App\Http\Requests\Admin\Vendor\VendorProfile;

class DashboardController extends Controller
{
    //
    private $vendorService;

    public function __construct(VendorContract $vendorService)
    {
        $this->vendorService = $vendorService;

    }
    public function index()
    {

        return view('vendor');
    }
    public function profile(Request $request)
    {
        $id = Auth::guard('vendor')->user()->id;
        if($id){
            $vendor = vendor::where('id',$id)->first();
            return view('vendor.auth.profile', compact('vendor'));
        }

    }
    public function profileSave(VendorProfile $request)
    {

        $vendor['data'] = $this->vendorService->profile($request->except(['_token', '_method']));
        $vendor['status'] = true;
        $vendor['message'] = 'Vendor Profile Updated Successfully';
        $vendor['url'] = redirect('profile/vendor');
        return $vendor;
    }

}
