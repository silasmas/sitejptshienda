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
class PasswordResetLinkController extends Controller
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
     * Display the password reset link request view.
     */
    public function create(): View
    {
        // Select all countries API URL
        $url_country = $this::$apiURL . '/api/country';

        try {
            // Select all countries API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify' => false
            ]);
            $country = json_decode($response_country->getBody(), false);

            return view('auth.forgot-password', [
                'countries' => $country->data,
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return view('auth.login', [
                'response_error' => json_decode($e->getResponse()->getBody()->getContents(), false)
            ]);
        }
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): View
    {
        // inputs
        $inputs = [
            'phone' => $request->phone_code . $request->phone_number
        ];
        // Password reset API URL
        $url_password_reset = $this::$apiURL . '/api/password_reset/search_by_phone/' . $inputs['phone'];

        try {
            // Password reset API response
            $response_password_reset = $this::$client->request('GET', $url_password_reset, [
                'headers' => $this::$headers,
                'verify' => false
            ]);
            $password_reset = json_decode($response_password_reset->getBody(), false);

            return view('auth.check-token', [
                'phone' => $password_reset->data->phone,
                'password' => $password_reset->data->former_password,
                'token' => $password_reset->data->token,
                'redirect' => 'password_reset'
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return view('auth.forgot-password', [
                'response_error' => json_decode($e->getResponse()->getBody()->getContents(), false)
            ]);
        }
    }
}
