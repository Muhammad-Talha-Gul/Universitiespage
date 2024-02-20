<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Cookie\CookieJar;
use App\Model\Orders;
use App\Model\OrderDetail;
use App\Model\OrderNotes;
use App\Model\Notifications;
use App\Model\Posts;
use App\Model\PlanMaster;
use Auth;
use Cookie;
use Validator;
use URL;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Model\Preferences;
use App\Model\University;
use App\Model\Consultant;
use App\Model\ApplicationForm;
use App\Model\Course;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Crypt;
/*Stripe Details Class*/
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;
use Mail;

class CartController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //parent::__construct();
        
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        // $this->_api_context = new ApiContext(new OAuthTokenCredential(getContactMeta()['paypal']['client_id'], getContactMeta()['paypal']['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
        // dd($paypal_conf);
        /*$paypal_conf['client_id'] = 'mycustom';
        $paypal_conf['secret'] = 'mycustom';
        dd($paypal_conf);*/
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */

    public function addToCart(Request $request)
    {
        $in_array = false; $k = 0; $qty = (int)$request->qty; $price = (!empty(getProduct($request->product_id)['discounted_price']))? getProduct($request->product_id)['discounted_price'] : getProduct($request->product_id)['price'];
        $check = Posts::where('id', $request->product_id)->first()->quantity;
        if($check < $qty){
            $resp['status'] = 'error';
            $resp['msg'] = 'Limited Stock';
            return response($resp);
        }
        $arr = [
            ['product'=>$request->product_id,'qty'=>$qty,'price'=>$price,'total'=>$price*$qty]
        ]; $count = 1;
        $products = serialize($arr);
        if(!empty(Cookie::get('products'))) {
            $products = Cookie::get('products');
            $p_array = unserialize($products);
            foreach ($p_array as $key => $value) {
                if($value['product']==$request->product_id) { $in_array = true; $k = $key; }
            }
            if($in_array) {
                $p_array[$k]['qty'] = $p_array[$k]['qty']+$qty;
                $p_array[$k]['total'] = $p_array[$k]['price']*$p_array[$k]['qty'];
            } else {
                array_push($p_array, ['product'=>$request->product_id,'qty'=>$qty,'price'=>$price,'total'=>$price*$qty]);
            }
            $products = serialize($p_array);
            $count = count($p_array);
        }
        $resp['status'] = 'added';
        $resp['count'] = $count;
        return response($resp)->cookie(
            'products', $products, 2628000
        );
    }

    public function updateCart(Request $request)
    {
        $in_array = false; $k = 0; $qty = (int)$request->qty; $price = getProduct($request->product_id)['price']; $sub = 0;
        $check = Posts::where('id', $request->product_id)->first()->quantity;
        if($check < $qty){
            $resp['status'] = 'error';
            $resp['msg'] = 'Limited Stock';
            return response($resp);
        }
        $resp = [];
        if(!empty(Cookie::get('products'))) {
            $products = Cookie::get('products');
            $p_array = unserialize($products);
            foreach ($p_array as $key => $value) {
                if($value['product']==$request->product_id) { $in_array = true; $k = $key; }
            }
            if($in_array) {
                $p_array[$k]['qty'] = $qty;
                $p_array[$k]['total'] = $price*$qty;
                $sub = $price*$qty;
            }
            $products = serialize($p_array);
        }
        $resp['status'] = 'updated';
        $resp['sub'] = number_format($sub);
        return response($resp)->cookie(
            'products', $products, 2628000
        );
    }

    public function getCartTotal()
    {
        return number_format(cartTotal());
    }

    public function deleteCartItem(Request $request) 
    {
        if(!empty(Cookie::get('products'))) {
            $p_array = unserialize(Cookie::get('products'));
            foreach($p_array as $key => $value) {
                if($value['product']==$request->product_id) {
                    unset($p_array[$key]);
                    $products = serialize($p_array);
                    $resp['status'] = 'deleted';
                    $resp['count'] = count($p_array);
                    return response($resp)->cookie(
                        'products', $products, 2628000
                    );
                }
            }
        }
    }

    public function deleteCart(Request $request) 
    {
        $ids = $request->ids;
        $arr = [];
        if(!empty(Cookie::get('products'))) {
            $p_array = unserialize(Cookie::get('products'));
            foreach($p_array as $key => $value) {
                if(in_array($value['product'], $ids)) {
                    $arr[] = ['id'=>$value['product'],'price'=>$value['price'],'qty'=>$value['qty'],'total'=>$value['total']];
                    unset($p_array[$key]);
                }
            }
            $products = serialize($p_array);
            $session = serialize($arr);
            $resp['status'] = 'deleted';
            return response($resp)
                    ->withCookie(cookie()->forever('products', $products))
                    ->withCookie(cookie()->forever('forundo', $session));
        }
    }

    public function undoCart()
    {
        if(!empty(Cookie::get('forundo'))) {
            $forundo = unserialize(Cookie::get('forundo'));
            $products = Cookie::get('products');
            if(!empty(Cookie::get('products'))) {
                $p_array = unserialize($products);
                foreach($forundo as $key => $value) {
                    array_push($p_array, ['product'=>$value['id'],'qty'=>$value['qty'],'price'=>$value['price'],'total'=>$value['total']]);
                }
            }
            $products = serialize($p_array);
            Cookie::queue(Cookie::forget('forundo'));
            return response('done')->cookie(
                'products', $products, 2628000
            );
        }
    }

    public function buyNow(Request $request)
    {
        //Cookie::queue(Cookie::forget('products'));
        $in_array = false; $k = 0; $qty = ($request->has('qty'))?(int)$request->qty:1; $price = (!empty(getProduct($request->product_id)['discounted_price']))? getProduct($request->product_id)['discounted_price'] : getProduct($request->product_id)['price'];
        $check = Posts::where('id', $request->product_id)->first()->quantity;
        if($check < $qty){
            $resp['status'] = 'error';
            $resp['msg'] = 'Limited Stock';
            return response($resp);
        }
        $arr = [
            ['product'=>$request->product_id,'qty'=>$qty,'price'=>$price,'total'=>$price*$qty]
        ]; $count = 0;
        $products = serialize($arr);
        if(!empty(Cookie::get('products'))) {
            $products = Cookie::get('products');
            $p_array = unserialize($products);
            foreach ($p_array as $key => $value) {
                if($value['product']==$request->product_id) { $in_array = true; $k = $key; }
            }
            if($in_array) {
                $p_array[$k]['qty'] = $p_array[$k]['qty']+$qty;
                $p_array[$k]['total'] = $p_array[$k]['price']*$p_array[$k]['qty'];
            } else {
                array_push($p_array, ['product'=>$request->product_id,'qty'=>$qty,'price'=>$price,'total'=>$price*$qty]);
            }
            $products = serialize($p_array);
            $count = count($p_array);
        }
        $resp['status'] = 'added';
        $resp['count'] = $count;
        return response($resp)->cookie(
            'products', $products, 2628000
        );
    }

    public function getCart()
    {
        //Cookie::queue(Cookie::forget('products'));
        return unserialize(Cookie::get('products'));
    }

    public function ajax_cart()
    {
        return view('includes.frontend.cart')->render();
    }

    public function checkout()
    {
        return redirect('dashboard/payment');
        // $data = getCart();
        // return view('frontend.checkout',['data'=>$data]);
    }

    public function proceed_checkout(Request $request)
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        $rand = mt_rand(100000, 999999);
        $user_id = Auth::user()->id;
        $course_id = $request->course;
        $type = (isset($request->type))??'application';
        $order_name = $type.'_'.$rand.'_'.$user_id;
        $type = $request->type;
        $plan = PlanMaster::find(1);
        if($type == 'application'){
            $app_fee = (Course::find($course_id)->application_fee)??0;
            $ser_fee = (serviceFee())??0;
            $price = (int)$app_fee+ (int)$ser_fee;
        }else{
            if($request->type == 'standard'){
                $price = $plan->standard_price;
                $desc = $plan->standard;
                $months = $plan->standard_months;
            }elseif ($request->type == 'premium'){
                $price = $plan->premium_price;
                $desc = $plan->premium;
                $months = $plan->premium_months;
            }elseif ($request->type == 'enterprise'){
                $price = $plan->enterprise_price;
                $desc = $plan->enterprise;
                $months = $plan->enterprise_months;
            }
        }

        if($request->payment=='paypal')
        {
            // dd($request->application_id);

            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();

            $item_1->setName($order_name) /** item name **/
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($price); /** unit price **/

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($price);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription($desc);

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('payment_status')) /** Specify return URL **/
                ->setCancelUrl(URL::route('payment_cancel'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
                /** dd($payment->create($this->_api_context));exit; **/
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    \Session::put('error','Connection timeout');
                    return Redirect::route('checkout');
                    /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                    /** $err_data = json_decode($ex->getData(), true); **/
                    /** exit; **/
                } else {
                    \Session::put('error','Some error occur, sorry for inconvenient');
                    return Redirect::route('checkout');
                    /** die('Some error occur, sorry for inconvenient'); **/
                }
            }

            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            /** add payment ID to session **/
            Session::put('paypal_payment_id', $payment->getId());
            Session::put('type', $type);
            if($type == 'application'){
                Session::put('course_id', $course_id);
                Session::put('application_id', $request->application_id);
            }else{
                Session::put('months', $months);
            }
            // $request['session'] = $payment->getId();
            /*if(!empty($products)) {
                foreach($products as $key => $value) {
                    OrderDetail::create([
                        'order_id'=>$neworder['id'],
                        'product_id'=>$value['product_id'],
                        'type'=>$value['type'],
                        'price'=>$value['price'],
                    ]);
                }
            }*/
            if(isset($redirect_url)) {
                /** redirect to paypal **/
                return Redirect::away($redirect_url);
            }

            \Session::put('error','Unknown error occurred');

            if($type == 'application'){
                return redirect('apply-for-course/'.$course_id.'?check=payment');
            }else{
                return redirect('dashboard/student');
            }
            
            // return Redirect::route('checkout');
        }elseif($request->payment=='stripe'){
            $type = $request->type;
            $plan = PlanMaster::find(1);
            return view('frontend.stripe',compact('type', 'plan'));
        }
    }

    public function payment_cancel(){
        \Session::flash('error', 'payment_error');
        return redirect('dashboard');
    }

    public function proceed_checkout_2(Request $request)
    {
        // if(Auth::check()){
        //     $request['user_id'] = Auth::user()->id;
        //     Auth::user()->update([ 'address'=>$request->shipping['address'],'city'=>$request->shipping['city'],'postal'=>$request->shipping['postal'] ]);         
        // } else {
        //     $user = User::where('email',$request->user['email'])->first();
        //     if(count($user)>0) {
        //         $request['user_id'] = $user['id'];            
        //     } else {
        //         $key = Crypt::encryptString($request->user['email']);
        //         $userdata = $request->user;  $userdata['user_type'] = "customer";
        //         $userdata['country'] = "Pakistan"; $userdata['city'] = $request->shipping['city'];
        //         $userdata['address'] = $request->shipping['address']; $userdata['postal'] = $request->shipping['postal'];
        //         $userdata['is_active'] = 0; $userdata['is_verified'] = 0; $userdata['password'] = bcrypt(str_random(10));
        //         $newuser = User::create($userdata);
        //         $maildata = ['key'=>$key];
        //         $to = $request->user['email']; $name = $request->user['first_name'].' '.$request->user['last_name'];
        //         Mail::send('emails.verification', $maildata, function ($m) use($to, $name) {
        //             $m->from('noreply@webnet.com.pk', 'Webnet Pakistan');
        //             $m->to($to,$name)->subject('Please Verify your email');
        //         });
        //         $request['user_id'] = $newuser['id'];
        //     }
        // }
        // $request['order_no'] = rand(1000, 999999);
        // $request['payment_type'] = $request->payment;
        // $request['shipping_meta'] = json_encode($request->shipping);
        // $request['payment'] = $request->payment;
        // $request['order_status'] = 'pending';
        // $products = $request->items;

        // if($request->payment=='paypal')
        // {
        //     $payer = new Payer();
        //     $payer->setPaymentMethod('paypal');

        //     $item_1 = new Item();

        //     $item_1->setName('Order_'.$request['order_no']) /** item name **/
        //         ->setCurrency('USD')
        //         ->setQuantity(1)
        //         ->setPrice($request->order_total_amount); /** unit price **/

        //     $item_list = new ItemList();
        //     $item_list->setItems(array($item_1));

        //     $amount = new Amount();
        //     $amount->setCurrency('USD')
        //         ->setTotal($request->order_total_amount);

        //     $transaction = new Transaction();
        //     $transaction->setAmount($amount)
        //         ->setItemList($item_list)
        //         ->setDescription('Your transaction description');

        //     $redirect_urls = new RedirectUrls();
        //     $redirect_urls->setReturnUrl(URL::route('payment_status')) /** Specify return URL **/
        //         ->setCancelUrl(URL::route('payment_cancel'));

        //     $payment = new Payment();
        //     $payment->setIntent('Sale')
        //         ->setPayer($payer)
        //         ->setRedirectUrls($redirect_urls)
        //         ->setTransactions(array($transaction));
        //         /** dd($payment->create($this->_api_context));exit; **/
        //     try {
        //         $payment->create($this->_api_context);
        //     } catch (\PayPal\Exception\PPConnectionException $ex) {
        //         if (\Config::get('app.debug')) {
        //             \Session::put('error','Connection timeout');
        //             return Redirect::route('checkout');
        //             /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
        //             /** $err_data = json_decode($ex->getData(), true); **/
        //             /** exit; **/
        //         } else {
        //             \Session::put('error','Some error occur, sorry for inconvenient');
        //             return Redirect::route('checkout');
        //             /** die('Some error occur, sorry for inconvenient'); **/
        //         }
        //     }

        //     foreach($payment->getLinks() as $link) {
        //         if($link->getRel() == 'approval_url') {
        //             $redirect_url = $link->getHref();
        //             break;
        //         }
        //     }

        //     /** add payment ID to session **/
        //     Session::put('paypal_payment_id', $payment->getId());
        //     $request['session'] = $payment->getId();
        //     $neworder = Orders::create($request->all());
        //     /*if(!empty($products)) {
        //         foreach($products as $key => $value) {
        //             OrderDetail::create([
        //                 'order_id'=>$neworder['id'],
        //                 'product_id'=>$value['product_id'],
        //                 'type'=>$value['type'],
        //                 'price'=>$value['price'],
        //             ]);
        //         }
        //     }*/
        //     if(isset($redirect_url)) {
        //         /** redirect to paypal **/
        //         return Redirect::away($redirect_url);
        //     }

        //     \Session::put('error','Unknown error occurred');
        //     return Redirect::route('checkout');
        // }
        // // elseif($request->payment=='stripe')
        // // {
        // //     $neworder = Orders::create($request->all());
        // //     if(!empty($products)) {
        // //         foreach($products as $key => $value) {
        // //             OrderDetail::create([
        // //                 'order_id'=>$neworder['id'],
        // //                 'product_id'=>$value['product_id'],
        // //                 'type'=>$value['type'],
        // //                 'price'=>$value['price'],
        // //             ]);
        // //         }
        // //     }

        // //     $validator = Validator::make($request->all(), [
        // //         'card_no' => 'required',
        // //         'ccExpiryMonth' => 'required',
        // //         'ccExpiryYear' => 'required',
        // //         'cvvNumber' => 'required',
        // //         'order_total_amount' => 'required',
        // //     ]);
        // //     $input = $request->all();
        // //     if ($validator->passes()) {  
        // //         $input = array_except($input,array('_token'));            
        // //         $stripe = Stripe::make('sk_test_7rbO1C6cyK1GDxk1GvxXO0LB');
        // //         try {
        // //             $token = $stripe->tokens()->create([
        // //                 'card' => [
        // //                     'number'    => $request->card_no,
        // //                     'exp_month' => $request->ccExpiryMonth,
        // //                     'exp_year'  => $request->ccExpiryYear,
        // //                     'cvc'       => $request->cvvNumber,
        // //                 ],
        // //             ]);
        // //             if (!isset($token['id'])) {
        // //                 \Session::put('error','The Stripe Token was not generated correctly');
        // //                 return redirect()->route('checkout');
        // //             }
        // //             $charge = $stripe->charges()->create([
        // //                 'card' => $token['id'],
        // //                 'currency' => 'PKR',
        // //                 'amount'   => $request->order_total_amount,
        // //                 'description' => 'Add in wallet',
        // //             ]);
        // //             Orders::find($neworder['id'])->update(['payment_info'=>$charge['id']]);
        // //             if($charge['status'] == 'succeeded') {
        // //                 Cookie::queue(Cookie::forget('products'));
        // //                 /**
        // //                 * Write Here Your Database insert logic.
        // //                 */
        // //                 Orders::find($neworder['id'])->update(['order_status'=>1]);
        // //                 if(empty(Auth::user()->talentlms_id)) {
        // //                     $talentID = addTalentLMSUser(Auth::user());
        // //                     foreach(json_decode($neworder['products'],true)['product_id'] as $value)
        // //                     {
        // //                         assignCourse($talentID['id'],getAttr($value,'course_id'));
                                
        // //                     }
        // //                     User::find(Auth::user()->id)->update(['talentlms_id'=>$talentID['id']]);
        // //                 } 
        // //                 else {
        // //                     foreach(json_decode($neworder['products'],true)['product_id'] as $value)
        // //                     {
        // //                         assignCourse(Auth::user()->talentlms_id,getAttr($value,'course_id'));
                                
        // //                     }
        // //                 }
        // //                 \Session::flash('success','Payment Succesully Paid');
        // //                 return redirect()->route('successPage');
        // //             } else {
        // //                 \Session::put('error','Payment Faild');
        // //                 return redirect()->route('checkout');
        // //             }
        // //         } catch (Exception $e) {
        // //             \Session::put('error',$e->getMessage());
        // //             return redirect()->route('checkout');
        // //         } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
        // //             \Session::put('error',$e->getMessage());
        // //             return redirect()->route('checkout');
        // //         } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
        // //             \Session::put('error',$e->getMessage());
        // //             return redirect()->route('checkout');
        // //         }
        // //     }
        // //     \Session::put('error','All fields are required!!');
        // //     return redirect()->route('checkout');
        // // }
        // elseif($request->payment=='cod' || $request->payment=='stripe' || $request->payment=='bank')
        // {
        //     $neworder = Orders::create($request->all());
        //     $items = [];
        //     if(!empty($products)) {
        //         foreach($products['product_id'] as $key => $value) {
        //             OrderDetail::create([
        //                 'order_id'=>$neworder['id'],
        //                 'product_id'=>$value,
        //                 'qty'=>$products['qty'][$key],
        //                 'price'=>$products['price'][$key],
        //             ]);
        //             subQuantity($value,$products['qty'][$key]);
        //             $items[] = ['title'=>getProduct($value)['title'],'qty'=>$products['qty'][$key],'price'=>getProduct($value)['price'],'total'=>$products['price'][$key]];
        //         }
        //     }
        //     OrderNotes::create([
        //         'order_id'=>$neworder['id'],
        //         'user_id'=>$neworder['user_id'],
        //         'type'=>'created',
        //     ]);
        //     $userinfo = User::find($neworder['user_id']);
        //     $formail = [];
        //     $formail['customer'] = $userinfo;
        //     $formail['shipping'] = json_decode($neworder['shipping_meta'],true);
        //     $formail['order'] = $neworder;
        //     $formail['items'] = $items;

        //     Mail::send('emails.order_confirmation', $formail , function ($m) use($userinfo) {
        //         $m->from('noreply@webnet.com.pk', 'Webnet Pakistan');
        //         $m->to($userinfo['email'],$userinfo['first_name'])->subject('Order Confirmation');
        //     });
        //     Cookie::queue(Cookie::forget('products'));
        //     \Session::flash('success','Checkout');
        //     //checkStock();
        //     Notifications::create([
        //         'type'=>'order',
        //         'order_id'=>$neworder['id'],
        //         'meta'=>'new order',
        //         'is_read'=>0,
        //     ]);
        //     return view('frontend.order_created',['order_no'=>$neworder['order_no']]);
        // }
    }    


    public function paymentInfo()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $type = Session::get('type');
        if($type == 'application'){
            $course_id = Session::get('course_id');
            $application_id = Session::get('application_id');
        }else{
            $months = Session::get('months');
        }
       
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        Session::forget('type');
        if($type == 'application'){
            Session::forget('application_id');
            Session::forget('course_id');
        }else{
            Session::forget('months');
        }
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error','Payment failed');
            if($type == 'application'){
                return redirect('apply-for-course/'.$course_id.'?check=payment');
            }else{
                return redirect('dashboard/student');
            }
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        //dd($result->getTransactions());exit; /** DEBUG RESULT, remove it later **/
        $payer_info = json_decode($result->getPayer()->getPayerInfo(),true);
        // $order->update(['payment_info'=>$payer_info['email']]);
       
        //var_dump($result->getPayer()->getPayerInfo()); die();
        if ($result->getState() == 'approved') { 
            // Cookie::queue(Cookie::forget('products'));
            // /** it's all right **/
            // /** Here Write your database logic like that insert record or value in database if you want **/
            // $order->update(['order_status'=>1]);
            // if(empty(Auth::user()->talentlms_id)) {
            //     $talentID = addTalentLMSUser(Auth::user());
            //     User::find(Auth::user()->id)->update(['talentlms_id'=>$talentID['id']]);
            // } else {
            //     $talentID = talentLMSUser(Auth::user()->talentlms_id);
            // }
            // foreach(json_decode($order['products'],true)['product_id'] as $value)
            // {
            //     assignCourse($talentID['id'],getAttr($value,'course_id'));
                
            // }
            \Session::flash('success','Payment success');
            if($type == 'application'){
                $app = ApplicationForm::where('application_id', $application_id)->first();
                $app->application_fee = 1;
                $app->save();
                return redirect('apply-for-course/'.$course_id.'?check=payment');
            }else{
                if(auth()->user()->user_type=='consultant'){
                    $expiry = date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now()->addMonths($months)));
                    auth()->user()->consultant->update(['package'=>$type, 'expiry'=>$expiry]);
                }elseif(auth()->user()->user_type=='university'){
                    $expiry = date('Y-m-d H:i:s',strtotime(\Carbon\Carbon::now()->addMonths($months)));
                    auth()->user()->university_detail->update(['package'=>$type, 'expiry'=>$expiry]);
                }
                Session::flash('type', $type);
                Session::flash('months', $months);
                return Redirect::route('successPage');
            }
        }
        \Session::put('error','Payment failed');

        if($type == 'application'){
            return redirect('apply-for-course/'.$course_id.'?check=payment');
        }else{
            return redirect('dashboard');
        }
    }
}
