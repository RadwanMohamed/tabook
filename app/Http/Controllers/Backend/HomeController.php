<?php

namespace App\Http\Controllers\Backend;

use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->data['orderspermonth']=$this->ordersNumberperMonth(date("Y"));
        $this->recentDelegates();
        $this->setData();
    }

    public function index()
    {

        return view("backend.home.index", $this->data);
    }

    public function setData()
    {
        $date = date('Y-m-d');
        $this->data["completedOrders"] = Order::where("status", Order::DONE)->whereRaw("date(`created_at`) = '$date'")->count();
        $this->data["unCompletedOrders"] = Order::where("status", Order::NEW)->whereRaw("date(`created_at`) = '$date'")->count();
        $this->data["activatedUsers"] = User::where("status", User::ACTIVE)->count();
        $this->data["unactivatedUsers"] = User::where("status", "<>", User::ACTIVE)->count();
    }

    private function recentDelegates()
    {
        $this->data['delegates'] = User::where("role",User::DELEGATE)->orderBy("created_at",'desc')->limit(4)->get();

    }

//
//    public function staticsYear($year)
//    {
//
//        $orders =  $this->ordersNumberperMonth($year);
//        $users = User::whereRaw('year(`created_at`)=?',"$year")->count();
//        $messages = Contact::whereRaw('year(`created_at`)=?',"$year")->count();
//        $types    = Type::whereRaw('year(`created_at`)=?',"$year")->count();
//        $latestusers = User::whereRaw('year(`created_at`)=?',"$year")->orderBy('created_at', 'desc')->take(8)->get();
//        $latestbuildings = Building::whereRaw('year(`created_at`)=?',"$year")->orderBy('created_at','desc')->take(7)->get();
//        $latestmessages = Contact::whereRaw('year(`created_at`)=?',"$year")->orderBy('created_at','desc')->take(10)->get();
//        return view("admin.home.index",compact('users','buildings','messages','types','latestusers','latestbuildings','latestmessages','buar'));
//
//    }

    private function ordersNumberperMonth($year)
    {
        $orderCount = [];
        $buar = [];

        $orders_count = Order::select('id','created_at')->whereRaw('year(`created_at`)=?',"$year")->get()->groupBy(function($date){
            return Carbon::parse($date->created_at)->format('m');
        });

        foreach ($orders_count as $key => $value)
        {
            $orderCount[(int)$key] = count($value);
        }
        for ($i=1;$i<=12;$i++)
        {
            if(!empty($orderCount[$i]))
                $buar[$i] = $orderCount[$i];
            else
                $buar[$i] = 0;
        }

        return $buar;

    }
}
