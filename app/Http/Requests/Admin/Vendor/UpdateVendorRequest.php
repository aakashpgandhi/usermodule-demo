<?php

namespace App\Http\Requests\Admin\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
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
        $rules = [];
        $rules['business_name']         =  'required';
        $rules['business_email']        =  'required|email|unique:vendors,business_email,'.$this->vendor_id.',id,deleted_at,NULL';
        $rules['phone_number']          =  'required|numeric|unique:vendors,phone_number,'.$this->vendor_id.',id,deleted_at,NULL';
        $rules['abn_no']                =  'required';
        $rules['website']               =  'required';
        $rules['headquarters_address']  =  'required';
        $rules['store_address']         =  'required';

        if(isset($this->vendor_avatar)) {
            $rules['vendor_avatar'] = 'required|image|mimes:jpeg,png,jpg';
        }

        if(isset($this->registration_document)) {
            $rules['registration_document'] = 'required|image|mimes:jpeg,png,jpg';
        }

        return $rules;
        
    }
}
