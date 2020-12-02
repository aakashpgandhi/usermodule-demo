<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\VendorDataTable;
use App\Models\Vendor;
use App\Contracts\VendorContract;
use App\Http\Requests\Admin\Vendor\StoreVendorRequest;
use App\Http\Requests\Admin\Vendor\UpdateVendorRequest;
use App\Http\Requests\Admin\Vendor\VendorProfile;
use Auth;
class VendorController extends Controller
{
    private $vendorService;

    public function __construct(VendorContract $vendorService)
    {
        $this->vendorService = $vendorService;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VendorDataTable $vendordataTable)
    {
        return $vendordataTable->render('admin.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorRequest $request)
    {
        $this->vendorService->create($request->all());

        return redirect()->route('admin.vendor.index')->with('success' ,'Vendor added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        return view('admin.vendor.view', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('admin.vendor.create', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorRequest $request, $id)
    {
        $this->vendorService->update($request->except(['_token', '_method']), $id);

        return redirect()->route('admin.vendor.index')->with('success', 'vendor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->vendorService->delete($id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function is_active(Request $request)
    {
        $vendor['data'] = $this->vendorService->is_active($request->except(['_token', '_method']));
        $vendor['status'] = true;
        $vendor['message'] = 'Vendor Status Change Successfully';
        $vendor['url'] = redirect('vendor');
        return  $vendor;
    }

    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();
        return parent::sendResponse([]);
    }


}
