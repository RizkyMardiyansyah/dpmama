<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\template;
use App\Models\subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Mail\ExampleMail;
use App\Mail\orderMail;
use Illuminate\Support\Facades\Mail;

class DomainController extends Controller
{
    public function index(Request $request)
{   
    $templates = Template::all();
    
      
    if ($request->ajax()) {
        return response()->json([
            'templates' => $templates->items(),
        ]);
    }

    $subs= subscription::all();

    
        return view('home', compact('templates'));
    
}

public function success($order, Request $request)
    {   
        $pesanan = order::where('id', $order)->first();
        
    
        
            return view('finish', compact('pesanan'));
        
    }



    public function store(Request $request)
    {
        $data = $request;
       
        $order = Order::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'orders' => str_replace(['"', "'"], '', $request->input('order_detail')),

            'total_payment' => $data['total_payment'] ?? 0,
        ]);

        try {
            return redirect()->route('success', ['order' => $order->id]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    
}
