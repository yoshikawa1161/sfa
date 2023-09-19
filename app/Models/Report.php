<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Report extends Model
{
    use HasFactory;

    public function matter()
    {
        return $this->belongsTo('App\Models\Matter');
    }

    protected $fillable = ['matter_id', 'start', 'end', 'status', 'category', 'product_name', 'description'];

    const STATUS = [
        1 => ['label' => 'アプローチ'],
        2 => ['label' => '面会'],
        3 => ['label' => 'デモ'],
        4 => ['label' => '最終面会'],
        5 => ['label' => '受注確定'],
        6 => ['label' => '納入'],

    ];


    const STATUS_APPROACH = 1;
    const STATUS_MEETING = 2;
    const STATUS_DEMO = 3;
    const STATUS_FINAL_MEETING = 4;
    const STATUS_ORDER = 5;
    const STATUS_DELIVER = 6;

    const CATEGORY = [
        1 => ['label' => '自社更新'],
        2 => ['label' => '他者更新'],
        3 => ['label' => '新規'],
    ];


    public static function getCustomerName()
    {
        $user_id = Auth::user()->id;
        $result = DB::select("select reports.id,customers.name as title,reports.start,reports.end from matters INNER JOIN reports ON reports.matter_id=matters.id INNER JOIN customers ON matters.customer_id=customers.id  WHERE matters.user_id='" . $user_id . "'");
        return $result;
    }


    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getCategoryLabelAttribute()
    {
        $category = $this->attributes['category'];

        if (!isset(self::CATEGORY[$category])) {
            return '';
        }

        return self::CATEGORY[$category]['label'];
    }
}
