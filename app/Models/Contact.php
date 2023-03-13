<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
    ];

    public static function doSearch($fullname, $email,$gender,$start,$end)
    {
        $query = Contact::query();
        if (!empty($fullname)) {
            $query->where('fullname', 'like binary', "%{$fullname}%");
        }
        if (!empty($email)) {
            $query->where('email', 'like binary', "%{$email}%");
        }
        if ($gender == 1 || $gender == 2) {
            $query->where('gender', 'like binary', "%{$gender}%");
        }
        
        if (isset($start) && isset($end)) {
            $query->whereBetween('created_at',[$start,$end]);
        }
        
        $results = $query->paginate(10);
        return $results;
    }
}
