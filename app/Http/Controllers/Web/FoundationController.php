<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * @author Xanders
 * @see https://www.linkedin.com/in/xanders-samoth-b2770737/
 */
class FoundationController extends Controller
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

        $this->middleware('auth');
    }

    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Managers list
     *
     * @param  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function managers()
    {
        // Select current user API URL
        $url_user = $this::$apiURL . '/api/user/' . Auth::user()->id;
        // Select all countries API URL
        $url_country = $this::$apiURL . '/api/country';
        // Select all received messages API URL
        $url_message = $this::$apiURL . '/api/message/inbox/' . Auth::user()->id;
        // Select all roles API URL
        $url_roles = $this::$apiURL . '/api/role';
        // Select all users by not role API URL
        $developer_role = 'Manager';
        $url_manager = $this::$apiURL . '/api/user/find_by_role/' . $developer_role;

        try {
            // Select current user API response
            $response_user = $this::$client->request('GET', $url_user, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $user = json_decode($response_user->getBody(), false);
            // Select countries API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $country = json_decode($response_country->getBody(), false);
            // Select all received messages API response
            $response_message = $this::$client->request('GET', $url_message, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $messages = json_decode($response_message->getBody(), false);
            // Select all roles API response
            $response_roles = $this::$client->request('GET', $url_roles, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $roles = json_decode($response_roles->getBody(), false);
            // Select all users by not role API response
            $response_manager = $this::$client->request('GET', $url_manager, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $managers = json_decode($response_manager->getBody(), false);

            return view('dashboard.manager', [
                'current_user' => $user->data,
                'countries' => $country->data,
                'messages' => $messages->data,
                'roles' => $roles->data,
                'managers' => $managers->data,
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return redirect('/')->with('error_message', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * GET: Members list
     *
     * @param  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function members()
    {
        // Select current user API URL
        $url_user = $this::$apiURL . '/api/user/' . Auth::user()->id;
        // Select all countries API URL
        $url_country = $this::$apiURL . '/api/country';
        // Select all received messages API URL
        $url_message = $this::$apiURL . '/api/message/inbox/' . Auth::user()->id;
        // Select all roles API URL
        $url_roles = $this::$apiURL . '/api/role';
        // Select all users by not role API URL
        $developer_role = 'Développeur';
        $url_not_developer = $this::$apiURL . '/api/user/find_by_not_role/' . $developer_role;

        try {
            // Select current user API response
            $response_user = $this::$client->request('GET', $url_user, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $user = json_decode($response_user->getBody(), false);
            // Select countries API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $country = json_decode($response_country->getBody(), false);
            // Select all received messages API response
            $response_message = $this::$client->request('GET', $url_message, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $messages = json_decode($response_message->getBody(), false);
            // Select all roles API response
            $response_roles = $this::$client->request('GET', $url_roles, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $roles = json_decode($response_roles->getBody(), false);
            // Select all users by not role API response
            $response_not_developer = $this::$client->request('GET', $url_not_developer, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $not_developer = json_decode($response_not_developer->getBody(), false);

            return view('dashboard.member', [
                'current_user' => $user->data,
                'countries' => $country->data,
                'messages' => $messages->data,
                'roles' => $roles->data,
                'users_not_developer' => $not_developer->data,
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return redirect('/')->with('error_message', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * GET: About a member
     *
     * @param  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function memberDatas($id)
    {
        // Select current user API URL
        $url_user = $this::$apiURL . '/api/user/' . Auth::user()->id;
        // Select all countries API URL
        $url_country = $this::$apiURL . '/api/country';
        // Select all received messages API URL
        $url_message = $this::$apiURL . '/api/message/inbox/' . Auth::user()->id;
        // Select all roles API URL
        $url_roles = $this::$apiURL . '/api/role';
        // Select a member API URL
        $url_member = $this::$apiURL . '/api/user/' . (isset(request()->member_id) ? request()->member_id : $id);
        // Select address by type and user API URL
        $legal_address_type = 'Adresse légale';
        $residence_type = 'Résidence actuelle';
        $url_legal_address = $this::$apiURL . '/api/address/search/' . $legal_address_type . '/ ' . $id;
        $url_residence = $this::$apiURL . '/api/address/search/' . $residence_type . '/ ' . $id;

        try {
            // Select current user API response
            $response_user = $this::$client->request('GET', $url_user, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $user = json_decode($response_user->getBody(), false);
            // Select countries API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $country = json_decode($response_country->getBody(), false);
            // Select all received messages API response
            $response_message = $this::$client->request('GET', $url_message, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $messages = json_decode($response_message->getBody(), false);
            // Select all roles API response
            $response_roles = $this::$client->request('GET', $url_roles, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $roles = json_decode($response_roles->getBody(), false);
            // Select a member API response
            $response_member = $this::$client->request('GET', $url_member, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $member = json_decode($response_member->getBody(), false);
            // Select address by type and user API response
            $response_legal_address = $this::$client->request('GET', $url_legal_address, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $legal_address = json_decode($response_legal_address->getBody(), false);
            $response_residence = $this::$client->request('GET', $url_residence, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $residence = json_decode($response_residence->getBody(), false);
            $qr_code = QrCode::format('png')->merge($this::$apiURL . '/assets/img/favicon/favicon-32x32.png', 0.2, true)->size(135)->generate($member->data->phone);
            // $qr_code = QrCode::size(135)->generate($member->data->phone);
            $message_membre = Notification::where([["user_id", $member->data->id], ["notif_name", "message"]])->get();

            return view('dashboard.member', [
                'current_user' => $user->data,
                'countries' => $country->data,
                'messages' => $messages->data,
                'roles' => $roles->data,
                'selected_member' => $member->data,
                'legal_address' => $legal_address->data,
                'residence' => $residence->data,
                'qr_code' => $qr_code,
                'message_membre' => $message_membre,
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return redirect('/members')->with('error_message', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * GET: Print card page
     *
     * @param  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function printCard($id)
    {
        // Select a member API URL
        $url_member = $this::$apiURL . '/api/user/' . $id;
        $residence_type = 'Résidence actuelle';
        $url_residence = $this::$apiURL . '/api/address/search/' . $residence_type . '/ ' . $id;

        try {
            // Select a member API response
            $response_member = $this::$client->request('GET', $url_member, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $member = json_decode($response_member->getBody(), false);
            // Select address by type and user API response
            $response_residence = $this::$client->request('GET', $url_residence, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $residence = json_decode($response_residence->getBody(), false);
            $qr_code = QrCode::format('png')->merge($this::$apiURL . '/assets/img/favicon/favicon-32x32.png', 0.2, true)->size(135)->generate($member->data->phone);
            // $qr_code = QrCode::size(135)->generate($member->data->phone);

            return view('dashboard.print_card', [
                'selected_member' => $member->data,
                'residence' => $residence->data,
                'qr_code' => $qr_code,
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return redirect('/account')->with('error_message', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * GET: News/Communique/Event page
     *
     * @param  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function infos()
    {
        // Select current user API URL
        $url_user = $this::$apiURL . '/api/user/' . Auth::user()->id;
        // Select all countries API URL
        $url_country = $this::$apiURL . '/api/country';
        // Select all received messages API URL
        $url_message = $this::$apiURL . '/api/message/inbox/' . Auth::user()->id;
        // Select news by type ID API URL
        $url_news = $this::$apiURL . '/api/news/select_by_type/5';
        $url_communiques = $this::$apiURL . '/api/news/select_by_type/6';
        $url_events = $this::$apiURL . '/api/news/select_by_type/7';

        try {
            // Select current user API response
            $response_user = $this::$client->request('GET', $url_user, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $user = json_decode($response_user->getBody(), false);
            // Select countries API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $country = json_decode($response_country->getBody(), false);
            // Select all received messages API response
            $response_message = $this::$client->request('GET', $url_message, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $messages = json_decode($response_message->getBody(), false);
            // // Select news by type ID API response
            $response_news = $this::$client->request('GET', $url_news, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $news = json_decode($response_news->getBody(), false);
            $response_communiques = $this::$client->request('GET', $url_communiques, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $communiques = json_decode($response_communiques->getBody(), false);
            $response_events = $this::$client->request('GET', $url_events, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $events = json_decode($response_events->getBody(), false);

            return view('dashboard.news', [
                'current_user' => $user->data,
                'countries' => $country->data,
                'messages' => $messages->data,
                'news' => $news->data,
                'communiques' => $communiques->data,
                'events' => $events->data,
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return redirect('/')->with('error_message', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * GET: News/Communique/Event page
     *
     * @param  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function infoEntity($entity)
    {
        // Select current user API URL
        $url_user = $this::$apiURL . '/api/user/' . Auth::user()->id;
        // Select all countries API URL
        $url_country = $this::$apiURL . '/api/country';
        // Select all received messages API URL
        $url_message = $this::$apiURL . '/api/message/inbox/' . Auth::user()->id;
        // Select news by type ID API URL
        $url_news = $this::$apiURL . '/api/news/select_by_type/5';
        $url_communiques = $this::$apiURL . '/api/news/select_by_type/6';
        $url_events = $this::$apiURL . '/api/news/select_by_type/7';

        try {
            // Select current user API response
            $response_user = $this::$client->request('GET', $url_user, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $user = json_decode($response_user->getBody(), false);
            // Select countries API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $country = json_decode($response_country->getBody(), false);
            // Select all received messages API response
            $response_message = $this::$client->request('GET', $url_message, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $messages = json_decode($response_message->getBody(), false);

            if ($entity == 'news') {
                // Select news by type ID API response
                $response_news = $this::$client->request('GET', $url_news, [
                    'headers' => $this::$headers,
                    'verify' => false,
                ]);
                $news = json_decode($response_news->getBody(), false);

                return view('dashboard.news', [
                    'current_user' => $user->data,
                    'countries' => $country->data,
                    'messages' => $messages->data,
                    'entity' => $entity,
                    'entity_id' => 5,
                    'news' => $news->data,
                ]);
            }

            if ($entity == 'communique') {
                $response_communiques = $this::$client->request('GET', $url_communiques, [
                    'headers' => $this::$headers,
                    'verify' => false,
                ]);
                $communiques = json_decode($response_communiques->getBody(), false);

                return view('dashboard.news', [
                    'current_user' => $user->data,
                    'countries' => $country->data,
                    'messages' => $messages->data,
                    'entity' => $entity,
                    'entity_id' => 6,
                    'communiques' => $communiques->data,
                ]);
            }

            if ($entity == 'event') {
                $response_events = $this::$client->request('GET', $url_events, [
                    'headers' => $this::$headers,
                    'verify' => false,
                ]);
                $events = json_decode($response_events->getBody(), false);

                return view('dashboard.news', [
                    'current_user' => $user->data,
                    'countries' => $country->data,
                    'messages' => $messages->data,
                    'entity' => $entity,
                    'entity_id' => 7,
                    'events' => $events->data,
                ]);
            }

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return redirect('/infos')->with('error_message', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * GET: News details page
     *
     * @param  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function infoDatas($entity, $id)
    {
        // Select current user API URL
        $url_user = $this::$apiURL . '/api/user/' . Auth::user()->id;
        // Select all countries API URL
        $url_country = $this::$apiURL . '/api/country';
        // Select all received messages API URL
        $url_message = $this::$apiURL . '/api/message/inbox/' . Auth::user()->id;
        // Select news by ID API URL
        $url_news = $this::$apiURL . '/api/news/' . $id;

        try {
            // Select current user API response
            $response_user = $this::$client->request('GET', $url_user, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $user = json_decode($response_user->getBody(), false);
            // Select countries API response
            $response_country = $this::$client->request('GET', $url_country, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $country = json_decode($response_country->getBody(), false);
            // Select all received messages API response
            $response_message = $this::$client->request('GET', $url_message, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $messages = json_decode($response_message->getBody(), false);
            // Select news by type ID API response
            $response_news = $this::$client->request('GET', $url_news, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $news = json_decode($response_news->getBody(), false);

            return view('dashboard.news', [
                'current_user' => $user->data,
                'countries' => $country->data,
                'messages' => $messages->data,
                'entity' => $entity,
                'entity_id' => $entity == 'news' ? 5 : ($entity == 'communique' ? 6 : ($entity == 'event' ? 7 : null)),
                'news' => $news->data,
            ]);

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return redirect('/infos')->with('error_message', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Update member
     *
     * @param \Illuminate\Http\Request  $request
     * @param int  $id
     * @return \Illuminate\View\View
     */
    public function updateMember(Request $request, $id)
    {
        // Update member API URL
        $url_member = $this::$apiURL . '/api/user/' . $id;
        // Update address API URL
        $url_update_address = $this::$apiURL . '/api/address';

        try {
            // Update member API response
            $response_update_member = $this::$client->request('PUT', $url_member, [
                'headers' => $this::$headers,
                'form_params' => [
                    'id' => $id,
                    'firstname' => $request->register_firstname,
                    'lastname' => $request->register_lastname,
                    'surname' => $request->register_surname,
                    'gender' => $request->register_gender,
                    'birth_city' => $request->register_birth_city,
                    'birth_date' => $request->register_birthdate ? (str_starts_with(app()->getLocale(), 'fr') ? explode('/', $request->register_birthdate)[2] . '-' . explode('/', $request->register_birthdate)[1] . '-' . explode('/', $request->register_birthdate)[0] : explode('/', $request->register_birthdate)[2] . '-' . explode('/', $request->register_birthdate)[0] . '-' . explode('/', $request->register_birthdate)[1]) : null,
                    'nationality' => $request->register_nationality,
                    'p_o_box' => $request->register_p_o_box,
                    'email' => $request->register_email,
                    'phone' => $request->register_phone,
                    'password' => $request->register_password,
                    'confirm_password' => $request->confirm_password,
                ],
                'verify' => false,
            ]);
            $member = json_decode($response_update_member->getBody(), false);

            // Update legal address API response
            if ($request->register_legal_address_address_content_1) {
                $this::$client->request('POST', $url_update_address, [
                    'headers' => $this::$headers,
                    'form_params' => [
                        'address_content' => $request->register_legal_address_address_content_1,
                        'address_content_2' => $request->register_legal_address_address_content_2,
                        'neighborhood' => $request->register_legal_address_neighborhood,
                        'area' => $request->register_legal_address_area,
                        'city' => $request->register_legal_address_city,
                        'type_id' => 3,
                        'country_id' => $request->register_legal_address_country,
                        'user_id' => $member->data->id,
                    ],
                    'verify' => false,
                ]);
            }

            // Update residence API response
            if ($request->register_residence_address_content_1) {
                $this::$client->request('POST', $url_update_address, [
                    'headers' => $this::$headers,
                    'form_params' => [
                        'address_content' => $request->register_residence_address_content_1,
                        'address_content_2' => $request->register_residence_address_content_2,
                        'neighborhood' => $request->register_residence_neighborhood,
                        'area' => $request->register_residence_area,
                        'city' => $request->register_residence_city,
                        'type_id' => 4,
                        'country_id' => $request->register_residence_country,
                        'user_id' => $member->data->id,
                    ],
                    'verify' => false,
                ]);
            }

            return redirect('/members/' . $id)->with('alert_success', __('miscellaneous.data_updated'));

        } catch (ClientException $e) {
            // If the API returns some error, return to the page and display its message
            return redirect('/members/' . $id)->with('error_message', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * POST: Add a new member
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function memberAdd(Request $request)
    {
        // Register new user API URL
        $url_new_user = $this::$apiURL . '/api/user';
        // Select current user API URL
        $url_user = $this::$apiURL . '/api/user/' . Auth::user()->id;
        // Select all received messages API URL
        $url_message = $this::$apiURL . '/api/message/inbox/' . Auth::user()->id;
        $phone = $request->select_country . $request->phone_number_new_member;
        $inputs = [
            'firstname' => $request->register_firstname,
            'lastname' => $request->register_lastname,
            'phone' => $phone,
            'status_id' => 4,
            'role_id' => 4,
        ];

        try {
            // Register new user API response
            $response_new_user = $this::$client->request('POST', $url_new_user, [
                'headers' => $this::$headers,
                'form_params' => $inputs,
                'verify' => false,
            ]);
            $new_user = json_decode($response_new_user->getBody(), false);
            // Select current user API response
            $response_user = $this::$client->request('GET', $url_user, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $user = json_decode($response_user->getBody(), false);
            // Select all received messages API response
            $response_message = $this::$client->request('GET', $url_message, [
                'headers' => $this::$headers,
                'verify' => false,
            ]);
            $messages = json_decode($response_message->getBody(), false);

            return view('dashboard.check_token', [
                'phone' => $new_user->data->password_reset->phone,
                'password' => $new_user->data->password_reset->former_password,
                'token' => $new_user->data->password_reset->token,
                'current_user' => $user->data,
                'messages' => $messages->data,
            ]);

        } catch (ClientException $e) {
            // If API returns some error, get it,
            // return to the page and display its message
            $msg = json_decode($e->getResponse()->getBody()->getContents(), false);
            return back()->with('response_error', $msg->data);
        }
    }

    /**
     * POST: Update Identity document of a member
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateIdentityDoc(Request $request, $id)
    {
        // Register image API URL
        $url_image = $this::$apiURL . '/api/user/add_image/' . $id;

        try {
            // Register image API response
            $this::$client->request('PUT', $url_image, [
                'headers' => $this::$headers,
                'form_params' => [
                    'user_id' => $request->member_id,
                    'image_name' => $request->register_image_name,
                    'image_64_recto' => $request->data_recto,
                    'image_64_verso' => $request->data_verso,
                    'description' => $request->register_description,
                ],
                'verify' => false,
            ]);

            return Redirect::back()->with('alert_success', __('notifications.registered_data'));

        } catch (ClientException $e) {
            return Redirect::back()->with('response_error', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * POST: Check the given token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkToken(Request $request)
    {
        // Log in API URL
        $url_login = $this::$apiURL . '/api/user/login';
        $given_token = $request->check_digit_1 . $request->check_digit_2 . $request->check_digit_3 . $request->check_digit_4 . $request->check_digit_5 . $request->check_digit_6 . $request->check_digit_7;
        $phone = $request->phone;
        $password = $request->password;
        $token = $request->token;
        // Select current user API URL
        $url_user = $this::$apiURL . '/api/user/' . Auth::user()->id;
        // Select all countries API URL
        $url_country = $this::$apiURL . '/api/country';
        // Select all received messages API URL
        $url_message = $this::$apiURL . '/api/message/inbox/' . Auth::user()->id;
        // Select all roles API URL
        $url_roles = $this::$apiURL . '/api/role';

        if ($given_token == $request->token) {
            try {
                // Select current user API response
                $response_user = $this::$client->request('GET', $url_user, [
                    'headers' => $this::$headers,
                    'verify' => false,
                ]);
                $user = json_decode($response_user->getBody(), false);
                // Select countries API response
                $response_country = $this::$client->request('GET', $url_country, [
                    'headers' => $this::$headers,
                    'verify' => false,
                ]);
                $country = json_decode($response_country->getBody(), false);
                // Select all received messages API response
                $response_message = $this::$client->request('GET', $url_message, [
                    'headers' => $this::$headers,
                    'verify' => false,
                ]);
                $messages = json_decode($response_message->getBody(), false);
                // Select all roles API response
                $response_roles = $this::$client->request('GET', $url_roles, [
                    'headers' => $this::$headers,
                    'verify' => false,
                ]);
                $roles = json_decode($response_roles->getBody(), false);
                // Log in API response
                $response_login = $this::$client->request('POST', $url_login, [
                    'headers' => $this::$headers,
                    'form_params' => [
                        'username' => $phone,
                        'password' => $password,
                    ],
                    'verify' => false,
                ]);
                $member = json_decode($response_login->getBody(), false);
                // Select address by type and user API URL
                $legal_address_type = 'Adresse légale';
                $residence_type = 'Résidence actuelle';
                $url_legal_address = $this::$apiURL . '/api/address/search/' . $legal_address_type . '/ ' . $member->data->id;
                $url_residence = $this::$apiURL . '/api/address/search/' . $residence_type . '/ ' . $member->data->id;

                try {
                    // Select address by type and user API response
                    $response_legal_address = $this::$client->request('GET', $url_legal_address, [
                        'headers' => $this::$headers,
                        'verify' => false,
                    ]);
                    $legal_address = json_decode($response_legal_address->getBody(), false);
                    $response_residence = $this::$client->request('GET', $url_residence, [
                        'headers' => $this::$headers,
                        'verify' => false,
                    ]);
                    $residence = json_decode($response_residence->getBody(), false);
                    $qr_code = QrCode::format('png')->merge($this::$apiURL . '/assets/img/favicon/favicon-32x32.png', 0.2, true)->size(135)->generate($member->data->phone);
                    // $qr_code = QrCode::size(135)->generate($member->data->phone);
                    $message_membre = Notification::where([["user_id", $member->data->id], ["notif_name", "message"]])->get();

                    return view('dashboard.member', [
                        'selected_member' => $member->data,
                        'current_user' => $user->data,
                        'messages' => $messages->data,
                        'countries' => $country->data,
                        'roles' => $roles->data,
                        'legal_address' => $legal_address->data,
                        'residence' => $residence->data,
                        'qr_code' => $qr_code,
                        'message_membre' => $message_membre,
                    ]);

                } catch (ClientException $e) {
                    // If API returns some error, get it,
                    // return to the page and display its message
                    return view('dashboard.check_token', [
                        'error_message' => json_decode($e->getResponse()->getBody()->getContents(), false),
                        'phone' => $phone,
                        'password' => $password,
                        'token' => $token,
                    ]);
                }

            } catch (ClientException $e) {
                // If API returns some error, get it,
                // return to the page and display its message
                return view('dashboard.check_token', [
                    'error_message' => json_decode($e->getResponse()->getBody()->getContents(), false),
                    'phone' => $phone,
                    'password' => $password,
                    'token' => $token,
                ]);
            }

        } else {
            return view('dashboard.check_token', [
                'error_message' => __('auth.token_error'),
                'phone' => $phone,
                'password' => $password,
                'token' => $token,
            ]);
        }
    }

    /**
     * POST: Send a notification as a message
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendNotifMessage(Request $request)
    {
        // Register notification API URL
        $url_notification = $this::$apiURL . '/api/notification/store';

        try {
            // Register notification API response
            $this::$client->request('POST', $url_notification, [
                'headers' => $this::$headers,
                'form_params' => [
                    'notification_url' => '---',
                    'notification_content' => $request->register_notif_message,
                    'notif_name' => 'message',
                    'status_id' => 7,
                    'user_id' => $request->member_id,
                ],
                'verify' => false,
            ]);

            return Redirect::back()->with('alert_success', __('miscellaneous.message_sent'));

        } catch (ClientException $e) {
            return Redirect::back()->with('response_error', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * POST: Register news/communique/event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function newInfo(Request $request)
    {
        // Register a news API URL
        $url_news = $this::$apiURL . '/api/news';

        try {
            // Select a member API response
            $response_news = $this::$client->request('POST', $url_news, [
                'headers' => $this::$headers,
                'form_params' => [
                    'news_title' => $request->register_title,
                    'news_content' => $request->register_content,
                    'video_url' => $request->register_video_url,
                    'type_id' => $request->type_id,
                ],
                'verify' => false,
            ]);
            $news = json_decode($response_news->getBody(), false);

            if ($request->news_picture != null and $request->news_picture != '') {
                // Register news image API URL
                $url_image = $this::$apiURL . '/api/news/add_image/' . $news->data->id;

                $this::$client->request('PUT', $url_image, [
                    'headers' => $this::$headers,
                    'form_params' => [
                        'news_id' => $news->data->id,
                        'image_64' => $request->news_picture,
                    ],
                    'verify' => false,
                ]);
            }

            return Redirect::back()->with('alert_success', __('notifications.registered_data'));

        } catch (ClientException $e) {
            return Redirect::back()->with('response_error', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }

    /**
     * POST: Register news/communique/event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateInfo(Request $request, $entity, $id)
    {
        // Update a news API URL
        $url_news = $this::$apiURL . '/api/news/' . $id;

        try {
            // Select a member API response
            $response_news = $this::$client->request('PUT', $url_news, [
                'headers' => $this::$headers,
                'form_params' => [
                    'id' => $request->news_id,
                    'news_title' => $request->register_title,
                    'news_content' => $request->register_content,
                    'video_url' => $request->register_video_url,
                    'type_id' => $request->type_id,
                ],
                'verify' => false,
            ]);
            $news = json_decode($response_news->getBody(), false);

            if ($request->news_picture != null and $request->news_picture != '') {
                // Register news image API URL
                $url_image = $this::$apiURL . '/api/news/add_image/' . $news->data->id;

                $this::$client->request('PUT', $url_image, [
                    'headers' => $this::$headers,
                    'form_params' => [
                        'news_id' => $news->data->id,
                        'image_64' => $request->news_picture,
                    ],
                    'verify' => false,
                ]);
            }

            return redirect('/infos/' . $entity)->with('alert_success', __('miscellaneous.data_updated'));

        } catch (ClientException $e) {
            return Redirect::back()->with('response_error', (json_decode($e->getResponse()->getBody()->getContents(), false))->message);
        }
    }
}
