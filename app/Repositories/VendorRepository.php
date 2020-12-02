<?php
namespace App\Repositories;

use App\Contracts\VendorContract;
use App\Models\Vendor;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class VendorRepository implements VendorContract
{
    public function get(int $id)
    {
        return Vendor::withCount('subscription')->findOrFail($id);
    }

    public function list(int $limit=null)
    {
        $vendorList=new Vendor();
        $vendorList=$vendorList->withCount('subscription','storesDetail')->where('is_active',1);
        if($limit){
            $vendorList=$vendorList->limit($limit);
        }
        $vendorList=$vendorList->get();
        return $vendorList;
    }

    public function listApi(int $limit=null)
    {
        $vendorList=new Vendor();
        $vendorList=$vendorList->withCount('subscription','storesDetail')->join('stores','stores.vendor_id','vendors.id')->where('is_active',1);
        if($limit){
            $vendorList=$vendorList->limit($limit);
        }
        $vendorList=$vendorList->get();
        return $vendorList;
    }

    public function create($data)
    {
        if(isset($data['vendor_avatar']))
            $data['vendor_avatar'] = $this->uploadVendorAvatar($data['vendor_avatar']);

        if(isset($data['registration_document']))
            $data['registration_document'] = $this->uploadVendorDocument($data['registration_document']);

        return Vendor::create($data);
    }

    public function update($data, $vendor_id)
    {
        $vendor = $this->get($vendor_id);
        $dataSave['business_name'] = $data['business_name'];
        if(isset($data['vendor_avatar'])){
            $dataSave['vendor_avatar'] = $this->uploadVendorAvatar($data['vendor_avatar']);
        }
        $dataSave['business_email'] = $data['business_email'];
        $dataSave['phone_number'] = $data['phone_number'];
        $dataSave['abn_no'] = $data['abn_no'];
        $dataSave['website'] = $data['website'];
        $dataSave['headquarters_address'] = $data['headquarters_address'];
        $dataSave['store_address'] = $data['store_address'];
        if(isset($data['registration_document'])){
            $dataSave['registration_document'] = $this->uploadVendorDocument($data['registration_document']);
        }
        $vendor->update($dataSave);
       return ;
    }


    public function delete($id)
    {
        $vendor = $this->get($id);
        return $vendor->delete();
    }
    public function is_active($data)
    {
        $vendor = $this->get($data['id']);
        $dataSave['is_active'] = $data['status'];
        $vendor->update($dataSave);
    }

    public function uploadVendorAvatar(UploadedFile $file)
    {
        $strippedName = str_replace(' ', '', $file->getClientOriginalName());
        $avatarMedia =$file;
        $strippedName = str_replace(' ', '', $avatarMedia->getClientOriginalName());
        $photoName = time() .'_'.$strippedName;
        try {
            Storage::disk('local')->put('/public/uploads/vendor/profile/'.$photoName, file_get_contents($avatarMedia));
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
        }
        return $photoName;
    }

    public function profile($data){

        $vendor = $this->get($data['vendor_id']);
        $dataSave['business_name'] = $data['business_name'];
        if(isset($data['vendor_avatar'])){
            $dataSave['vendor_avatar'] = $this->uploadVendorAvatar($data['vendor_avatar']);
        }
        $dataSave['business_email'] = $data['business_email'];
        $dataSave['phone_number'] = $data['phone_number'];
        $dataSave['abn_no'] = $data['abn_no'];
        $dataSave['website'] = $data['website'];
        $dataSave['headquarters_address'] = $data['headquarters_address'];
        $dataSave['store_address'] = $data['store_address'];
        if(isset($data['registration_document'])){
            $dataSave['registration_document'] = $this->uploadVendorDocument($data['registration_document']);
        }
        $vendor->update($dataSave);

       return ;
    }

    public function isUserSubscribed($user_id,$id){
        $user_subscribed=DB::table('vendor_subscription')->where('user_id',$user_id)->where('vendor_id',$id)->first();
        if(!empty($user_subscribed)){
            return 1;
        }else{
            return 0;
        }
    }
}

