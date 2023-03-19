<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\CountyResource;
use App\Http\Resources\FuelResource;
use App\Http\Resources\MunicipalityResource;
use App\Models\County;
use App\Models\Fuel;
use App\Models\Municipality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function registerPage(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        // Get form select data from DB
        $counties = County::getAllCounties();
        $municipalities = Municipality::getAllMunicipalities();
        $fuels = Fuel::getAllFuels();

        $data = [
            'counties' => $counties,
            'municipality' => $municipalities,
            'fuel' => $fuels
        ];

//      Return the view if the page with the data
        return view('register', $data);
    }

    public function loginPage()
    {
        return view('login');
    }

    public function createUser(UserRequest $request)
    {
        try {
//      Validate the data
            $validated = $request->validated();
//      If everything is good it will continue to save the user otherwise return the errors to the page
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'address' => $validated['address'],
                'municipality' => $validated['municipality'],
                'county' => $validated['county'],
                'username' => $validated['username'],
                'fuel' => $validated['fuel'],
                'afm' => $validated['afm'],
            ]);
//      Return success response
            return view('login', [
                'type' => 'success',
                'message' => 'Ο χρήστης έχει δημιοργηθεί επιτυχώς!'
            ]);
        } catch (\Exception $e) {
//          Catch the errors
            return response()->json([
                'message' => 'Unable to create user. Please try again later.'
            ], 500);
        }
    }

    /**
     * @throws \Exception
     */
    public function loginUser(UserLoginRequest $request)
    {
        $validated = $request->validated();

        if ($user = $this->attemptLogin($validated['username'], $validated['password'])) {
//          Add session variables
            \session([
                'user_id' => $user->id,
                'username' => $user->username,
                'admin' => $user->admin
            ]);
//          Redirect to home page with success message
            return redirect()->route('home')->with([
                'type' => 'success',
                'message' => 'Η ανακοίνωση έχει καταχωρηθεί επιτυχώς!'
            ]);
        } else {
            // Login failed, show error message
            return view('login', [
                'type' => 'danger',
                'message' => 'Λάθος στοιχεία εισόδου!'
            ]);
        }
    }

    private function attemptLogin($username, $password)
    {
        try {
            $user = User::where('username', $username)->first();

            if ($user && Hash::check($password, $user->password)) {
                // Password is correct
                return $user;
            }

            // Username or password is incorrect
            return false;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }
}
