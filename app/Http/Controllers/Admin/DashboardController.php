<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Supply;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSupplies = Supply::get()->count();
        $onlineOrder = Order::where('type', 'online')->where('status', 'processed')->count();
        $walkinOrder = Order::where('type', 'walk_in')->where('status', 'processed')->count();
        $transactions = Transaction::get()->count();

        $orders = Order::where('status', 'processed')->get();
        $sales = Order::whereStatus('processed')->sum('total');
        $totalSalesByMonth = $this->getAllSalesByMonths();


        // foreach ($orders as $order) {
        //     $sales = $sales + $order->total;
        // }

        $registeredCustomer = User::role('customer')->get()->count();
        return view('users.admin.dashboard', compact(['totalSupplies', 'onlineOrder', 'walkinOrder', 'totalSalesByMonth', 'registeredCustomer', 'transactions', 'sales']));
    }


    public function getAllSalesByMonths()
    {

        $allMonths = range(1, 12);

        $data = [];



        foreach ($allMonths as $month) {
            $monthName = date("F", mktime(0, 0, 0, $month, 1)); // Get month name

           $orderSales = Order::whereStatus('processed')->whereMonth('created_at', $month)->sum('total');


            $data[$monthName] = $orderSales ?? 0;
        }

        return $data;
    }
}
