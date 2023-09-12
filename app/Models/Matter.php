<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class Matter extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }


    protected $fillable = ['customer_id', 'user_id', 'expected_order_date', 'status', 'category', 'product_name', 'order_date', 'delivery_date'];



    const STATUS = [
        1 => ['label' => 'アプローチ'],
        2 => ['label' => '面会'],
        3 => ['label' => 'デモ'],
        4 => ['label' => '最終面会'],
    ];

    const STATUSLIST = [
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

    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getStatuslistLabelAttribute()
    {
        $statuslist = $this->attributes['status'];

        if (!isset(self::STATUSLIST[$statuslist])) {
            return '';
        }

        return self::STATUSLIST[$statuslist]['label'];
    }

    public function getCategoryLabelAttribute()
    {
        $category = $this->attributes['category'];

        if (!isset(self::CATEGORY[$category])) {
            return '';
        }

        return self::CATEGORY[$category]['label'];
    }


    public static function getMatterList()
    {
        return Matter::with('customer')->whereIn('status', [self::STATUS_APPROACH, self::STATUS_MEETING, self::STATUS_DEMO, self::STATUS_FINAL_MEETING])->where('user_id', Auth::user()->id)->get();
    }
    public static function getOrderList()
    {
        return Matter::with('customer')->where('status', self::STATUS_ORDER)->get();
    }
    public static function getDeliveryList()
    {
        return Matter::with('customer')->where('status', self::STATUS_DELIVER)->get();
    }

    public static function getDelivery($matter)
    {
        return Matter::with('customer')->where([
            ['id', '=', $matter->id],
            ['status', '=', self::STATUS_DELIVER]
        ])->get();
    }

    public static function getApproachList()
    {
        return Matter::with('customer')->where('status', self::STATUS_APPROACH)->where('user_id', Auth::user()->id)->get();
    }


    public static function getApproach($matter)
    {
        return Matter::with('customer')->where([
            ['id', '=', $matter->id],
            ['status', '=', self::STATUS_APPROACH],
            ['user_id', '=', Auth::user()->id],
        ])->get();
    }

    public static function getMeetingList()
    {
        return Matter::with('customer')->where('status', self::STATUS_MEETING)->where('user_id', Auth::user()->id)->get();
    }


    public static function getMeeting($matter)
    {
        return Matter::with('customer')->where([
            ['id', '=', $matter->id],
            ['status', '=', self::STATUS_MEETING],
            ['user_id', '=', Auth::user()->id],
        ])->get();
    }

    public static function getDemoList()
    {
        return Matter::with('customer')->where('status', self::STATUS_DEMO)->where('user_id', Auth::user()->id)->get();
    }


    public static function getDemo($matter)
    {
        return Matter::with('customer')->where([
            ['id', '=', $matter->id],
            ['status', '=', self::STATUS_DEMO],
            ['user_id', '=', Auth::user()->id],
        ])->get();
    }

    public static function getFinalMeetingList()
    {
        return Matter::with('customer')->where('status', self::STATUS_FINAL_MEETING)->where('user_id', Auth::user()->id)->get();
    }


    public static function getFinalMeeting($matter)
    {
        return Matter::with('customer')->where([
            ['id', '=', $matter->id],
            ['status', '=', self::STATUS_FINAL_MEETING],
            ['user_id', '=', Auth::user()->id],
        ])->get();
    }
}
