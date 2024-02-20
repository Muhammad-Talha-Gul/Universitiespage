<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
           error_reporting(0);

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $mailer = json_decode(DB::table('preferences')->find(1)->mailer,true); 
        $config = array(
            'driver'     => 'smtp',
            'host'       => $mailer['host'],
            'port'       => $mailer['port'],
            'encryption' => $mailer['encryption'],
            'username'   => $mailer['username'],
            'password'   => $mailer['password'],
            'sendmail'   => '/usr/sbin/sendmail -bs',
            'pretend'    => false,
        );
        Config::set('mail', $config);
        // $analytics_data = DB::table('preferences')->find(1);
        // $analytics = [
        //     'view_id'=>$analytics_data->analytics_view,
        //     'service_account_credentials_json'=>public_path("/uploads/docs/".$analytics_data->analytics_file),
        //     'cache_lifetime_in_minutes' => 60 * 24,
        //     'cache' => [
        //         'store' => 'file',
        //     ],
        // ];
        // Config::set('analytics', $analytics);

        $meta = json_decode(DB::table('preferences')->find(1)->contact_meta, true);
        // config('broadcasting.connections.pusher.key', $meta['pusher']['key']);
        // config('broadcasting.connections.pusher.secret', $meta['pusher']['secret']);
        // config('broadcasting.connections.pusher.app_id', $meta['pusher']['app_id']);
        // config('broadcasting.connections.pusher.options.cluster', $meta['pusher']['cluster']);

        $pusher = [
            'default' => env('BROADCAST_DRIVER', 'pusher'),
            'connections' => [
                'pusher' => [
                    'driver' => 'pusher',
                    'key' => $meta['pusher']['key'],
                    'secret' => $meta['pusher']['secret'],
                    'app_id' => $meta['pusher']['app_id'],
                    'options' => [
                        'cluster' => $meta['pusher']['cluster'],
                        'encrypted' => true,
                    ],
                ],
                'redis' => [
                    'driver' => 'redis',
                    'connection' => 'default',
                ],
                'log' => [
                    'driver' => 'log',
                ],
                'null' => [
                    'driver' => 'null',
                ],
            ],
        ];
        Config::set('broadcasting', $pusher);

        // config('paypal.client_id', $meta['paypal']['client_id']);
        // config('paypal.secret', $meta['paypal']['secret']);
        // $paypal = array(
        //     'client_id' => $meta['paypal']['client_id'],
        //     'secret' => $meta['paypal']['secret'],
        //     'settings' => array(
        //         'mode' => 'live',
        //         'http.ConnectionTimeOut' => 1000,
        //         'log.LogEnabled' => true,
        //         'log.FileName' => storage_path() . '/logs/paypal.log',
        //         'log.LogLevel' => 'FINE',
        //     ),
        // );
        // Config::set('paypal', $paypal);

       
    }
}
