<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'jurusan' => 'required',
            'angkatan' => 'required|numeric',
            'alamat' => 'required',
            'kotakab' => 'required',
            'propinsi' => 'required',
            // 'kodepos' => 'required',
            // 'telepon' => 'telepon',
            'nohp' => 'required|numeric',
            'jurusan' => 'required',
            'avatar' => 'required|image|max:1024',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data, $avatar)
    {
        return User::create([
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'jurusan' => $data['jurusan'],
            'angkatan' => $data['angkatan'],
            'alamat' => $data['alamat'],
            'kotakab' => $data['kotakab'],
            'propinsi' => $data['propinsi'],
            'kodepos' => $data['kodepos'],
            'telepon' => $data['telepon'],
            'nohp' => $data['nohp'],
            'avatar' => $avatar,

        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->showRegistrationForm();
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $jurusan = \App\Models\Jurusan::where('active', 1)->get();
        return view('auth.register', ['jurusan' => $jurusan]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $code = $request->input('CaptchaCode');
        $isHuman = captcha_validate($code);

        if ($isHuman) {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                return redirect('register')
                            ->withErrors($validator)
                            ->withInput();
            }


            DB::BeginTransaction();
            try{
                if ($request->hasFile('avatar')) {
                    if($request->file('avatar')->isValid()) {
                        try {
                            $file = $request->file('avatar');
                            $name = time() . '.' . $file->getClientOriginalExtension();

                            $request->file('avatar')->move("avatar", $name);
                        } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                            return redirect('register')
                                            ->withErrors($e)
                                            ->withInput();
                        }
                    } 
                }

                $this->create($request->all(), $name);

                $url = 'https://ikastaba.or.id/a/'.base64_encode($request->email);

                \Mail::send('emails.register', ['data' => $request->nama_lengkap ], function ($m) use ($request) {
                    $m->from('admin@ikastaba.or.id', 'Your Application');
                    $m->to($request->email, $request->nama_lengkap)->subject('IKASTABA REGISTRASI!');
                    $m->cc('bajayradical@gmail.com');
                });           

                $this->sendSms($request->nama_lengkap, $url);

                DB::commit();

                return view('welcome', ['messages' => 'Silahkan menghubungi administrator untuk konfirmasi akun anda']);
            }
            catch (\Exception $e)
            {
                \Log::info($e);
                DB::rollback();
                return redirect('register')->withErrors($e)->withInput();
            }
        } else {
            return redirect('register')
                            ->withErrors(['captcha' => 'Harap mengisikan captcha dengan benar'])
                            ->withInput();
        }
    }

    public function active($code)
    {
        $email = base64_decode($code);
        $user = User::where('email', $email)->first();
        if(count($user) > 0)
        {
            $user->status = 1;
            $user->save();
            return 'akun telah di aktivasi';
        }
        else
        {
            return 'gagal';
        }
    }

    public function sendSms($nama,$url)
    {
        $userkey = "tfzlqv";
        $passkey = "ikastaba1";
        $nohp = "085720780915";
        $message = "Ikastaba.or.id : Registrasi dengan nama $nama telah dilakukan, aktivasi $url";
        $url = "https://reguler.zenziva.net/apps/smsapi.php";
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$nohp.'&pesan='.urlencode($message));
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return string|null
     */
    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }

    public function getLogin()
    {
        return $this->showLoginForm();
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        return $this->login($request);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user)
        {
            return $this->sendFailedLoginResponse($request);
        }

        
        if($user->status == 1) {
            $credentials = $this->getCredentials($request);

            if (Auth::attempt($credentials, $request->has('remember'))) {
                return $this->handleUserWasAuthenticated($request, $throttles);
            }
            else {
                return $this->sendFailedLoginResponse($request);
            }
        } else{
            return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'Akun anda belum diaktifkan oleh administrator',
            ]);
        }



        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required', 'password' => 'required',
        ]);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

        return redirect()->intended($this->redirectTo);
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return \Lang::has('auth.failed')
                ? \Lang::get('auth.failed')
                : 'Email atau password anda salah';
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        return $this->logout();
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard($this->getGuard())->logout();

        return redirect('/');
    }

    /**
     * Get the guest middleware for the application.
     */
    public function guestMiddleware()
    {
        $guard = $this->getGuard();

        return $guard ? 'guest:'.$guard : 'guest';
    }

    /**
     * Get the login username to be used by the contro
     ller.
     *
     * @return string
     */
    public function loginUsername()
    {
        return 'email';
    }

    /**
     * Determine if the class is using the ThrottlesLogins trait.
     *
     * @return bool
     */
    protected function isUsingThrottlesLoginsTrait()
    {
        return in_array(
            self::class, class_uses_recursive(static::class)
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return string|null
     */
}
