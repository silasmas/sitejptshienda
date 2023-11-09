<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Redirect;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class RegisteredUserController extends Controller
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
            'X-localization' => !empty(Session::get('locale')) ? Session::get('locale') : App::getLocale()
        ];
        // Client used for accessing API
        $this::$client = new Client();
    }

    /**
     * Display the registration view.
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        // Select country API URL
        $url_country = $this::$apiURL . '/api/country';

        try {
            // Select country API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify'  => false
            ]);
            $country = json_decode($response_country->getBody(), false);

            return view('auth.register', [
                'countries' => $country->data
            ]);

        } catch (ClientException $e) {
            // If API returns some error, get it,
            // return to the page and display its message
            return view('auth.register', [
                'response_error' => json_decode($e->getResponse()->getBody()->getContents(), false)
            ]);
        }
    }

    /**
     * Display the registration view.
     * 
     * @return \Illuminate\View\View
     */
    public function edit(): View
    {
        // Select country API URL
        $url_country = $this::$apiURL . '/api/country';

        try {
            // Select country API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify'  => false
            ]);
            $country = json_decode($response_country->getBody(), false);

            return view('auth.register', [
                'countries' => $country->data
            ]);

        } catch (ClientException $e) {
            // If API returns some error, get it,
            // return to the page and display its message
            return view('auth.register', [
                'response_error' => json_decode($e->getResponse()->getBody()->getContents(), false)
            ]);
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        // Register new user API URL
        $url_user = $this::$apiURL . '/api/user';
        $phone = $request->select_country . $request->phone_number_new_member;
        $inputs = [
            'firstname' => $request->register_firstname,
            'lastname' => $request->register_lastname,
            'phone' => $phone,
            'status_id' => 4,
            'role_id' => 5
        ];

        try {
            // Register new user API response
            $response_user = $this::$client->request('POST', $url_user, [
                'headers' => $this::$headers,
                'form_params' => $inputs,
                'verify'  => false
            ]);
            $user = json_decode($response_user->getBody(), false);

            return view('auth.check-token', [
                'phone' => $user->data->password_reset->phone,
                'password' => $user->data->password_reset->former_password,
                'token' => $user->data->password_reset->token
            ]);

        } catch (ClientException $e) {
            // If API returns some error, get it,
            // return to the page and display its message
            return view('auth.register', [
                'inputs' => $inputs,
                'response_error' => json_decode($e->getResponse()->getBody()->getContents(), false)
            ]);
        }
    }

    /**
     * Check matching token.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function sendToken(Request $request)
    {
        // Log in API URL
        $url_login = $this::$apiURL . '/api/user/login';
        $given_token = $request->check_digit_1 . $request->check_digit_2 . $request->check_digit_3 . $request->check_digit_4 . $request->check_digit_5 . $request->check_digit_6 . $request->check_digit_7;
        $phone = $request->phone;
        $password = $request->password;
        $token = $request->token;

        if ($given_token == $request->token) {
            try {
                // Log in API response
                $response_login = $this::$client->request('POST', $url_login, [
                    'headers' => $this::$headers,
                    'form_params' => [
                        'username' => $phone,
                        'password' => $password
                    ],
                    'verify'  => false
                ]);
                $user = json_decode($response_login->getBody(), false);

                if (isset($request->redirect) AND $request->redirect == 'password_reset') {
                    return view('auth.reset-password', [
                        'user_id' => $user->data->id,
                        'former_password' => $password
                    ]);

                } else {
                    if (Auth::attempt(['phone' => $user->data->phone, 'password' => $password])) {
                        $request->session()->regenerate();

                        return Redirect::route('account');
                    }
                }

            } catch (ClientException $e) {
                // If API returns some error, get it,
                // return to the page and display its message
                return view('auth.check-token', [
                    'error_message' => json_decode($e->getResponse()->getBody()->getContents(), false),
                    'phone' => $phone,
                    'password' => $password,
                    'token' => $token
                ]);
            }

        } else {
            if (isset($request->redirect) AND $request->redirect == 'password_reset') {
                return view('auth.check-token', [
                    'redirect' => $request->redirect,
                    'error_message' => __('auth.token_error'),
                    'phone' => $phone,
                    'password' => $password,
                    'token' => $token
                ]);

            } else {
                return view('auth.check-token', [
                    'error_message' => __('auth.token_error'),
                    'phone' => $phone,
                    'password' => $password,
                    'token' => $token
                ]);
            }
        }
    }
}
