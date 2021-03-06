<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Order;
use App\PaymentType;
use App\Post;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    
    public function index()
    {
        $payments = Payment::orderBy('updated_at', 'DESC')->paginate(10);
        return view ('payments.index', compact('payments'));

     }
     public function create()
     {
        $orders = Order::all()->where('user_id', '=', auth()->user()->id);
        $paymentTypes = PaymentType::all();
        return view('payments.create', compact('paymentTypes', 'orders'));
     }
     public function show($paymentId)
     {
        $payment = Payment::find($paymentId);
        return view('payments.show', compact('payment'));
     }
     public function edit($paymentId)
     {
        $orders = Order::all()->where('user_id', '=', auth()->user()->id);
        $payment = Payment::find($paymentId);
        $paymentTypes = PaymentType::all();
        return view('payments.edit',compact('payment', 'paymentTypes', 'orders'));

     }
     public function store()
     {
         //validate the form 
        $validated_fields = request()->validate([
            'payment_type_id' => 'required',
            'payment_amount' => 'required',
            'order_id' => 'required'
            ]);
        
        $payment = Payment::create($validated_fields);    

        return redirect ('/users/'.auth()->user()->id); 

     }
     
    public function update(Payment $payment){
        //validate
        $validated_fields = request()->validate([
            'payment_type_id' => 'required',
            'payment_amount' => 'required',
            'order_id' => 'required'
            ]);
        
            $payment->update($validated_fields);

        return redirect ('/payments/'.$payment->id); 
    }

    public function delete($paymentId){
        $payment = Payment::find($paymentId);
        return view('payments.delete', compact('payment'));
    }

    public function destroy(Payment $payment){
        $payment->delete();
        return redirect('/payments');
    }

}
