<?php
namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface VendorContract
{
    public function create(array $data);
    public function is_active(array $data);
    public function profile(array $data);
    public function update(array $data, int $id);
    public function delete(int $id);
    public function uploadVendorAvatar(UploadedFile $data);
    public function uploadVendorDocument(UploadedFile $data);
    public function list(int $limit);
    public function listApi(int $limit);
    public function get(int $id);
    public function isUserSubscribed(int $user_id,int $id);
}
