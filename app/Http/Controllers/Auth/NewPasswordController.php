<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class NewPasswordController extends Controller
{
    public static $apiURL;
    public static $headers;
    public static $client;

    public function __construct()
    {
        // API URL
        // $this::$apiURL = 'https://jptshienda.dev:1443';
        $this::$apiURL = 'https://api.jptshienda.cd';
        // Headers for API
        $this::$headers = [
            'Authorization' => 'Bearer IQmxemeH2oYJ7Rsp3yx97S8GEsCVEQdtNaWuh88dfYp66P0HJS8g2xVqEeCnFImCaWKyn733o7jOtzxwB5INSU5W26Bw63QruvZl',
            'Accept' => 'application/json',
            'X-localization' => !empty(Session::get('locale')) ? Session::get('locale') : App::getLocale(),
        ];
        // Client used for accessing API
        $this::$client = new Client();
    }

    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['former_password' => $request->former_password]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): View
    {
        // inputs
        $inputs = [
            'former_password' => $request->register_former_password,
            'new_password' => $request->register_new_password,
            'confirm_new_password' => $request->confirm_new_password
        ];
        // Update password API URL
        $url_update_password = $this::$apiURL . '/api/user/update_password/' . $request->user_id;

        try {
            // Update password API response
            $response_update_password = $this::$client->request('PUT', $url_update_password, [
                'headers' => $this::$headers,
                'form_params' => $inputs,
                'verify' => false
            ]);
            json_decode($response_update_password->getBody(), false);

            return view('auth.login', [
                'success_msg' => __('notifications.update_password_success')
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return view('auth.reset-password', [
                'inputs' => $inputs,
                'user_id' => $request->user_id,
                'former_password' => $request->register_former_password,
                'response_error' => json_decode($e->getResponse()->getBody()->getContents(), false)
            ]);
        }
    }
}
