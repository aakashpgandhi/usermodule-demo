<?php

namespace App\Http\Requests\Admin\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'business_name'         =>  'required',
            'business_email'        =>  'required|email|unique:vendors,business_email,NULL,id,deleted_at,NULL',
            'phone_number'          =>  'required|numeric|unique:vendors,phone_number,NULL,id,deleted_at,NULL',
            'abn_no'                =>  'required',
            'vendor_avatar'         =>  'required|image|mimes:jpeg,png,jpg',
            'registration_document' =>  'required|image|mimes:jpeg,png,jpg',
            'website'               =>  'required',
            'headquarters_address'  =>  'required',
            'store_address'         =>  'required',
        ];
    }
}
