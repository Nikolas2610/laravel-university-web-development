<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\County;
use App\Models\Fuel;
use App\Models\Municipality;
use App\Models\User;
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

    public function loginPage(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('login');
    }

    public function createUser(UserRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
//      Έλεγχος των πεδίων της φόρμας από την PHP
            $validated = $request->validated();
//      Αν είναι όλα εντάξει το δημιουργούμε και αποθηκεύουμε το αντικείμενο
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
//      Επιστροφή μηνύματος επιτυχίας
            return view('login', [
                'type' => 'success',
                'message' => 'Ο χρήστης έχει δημιουργηθεί επιτυχώς!'
            ]);
        } catch (\Exception $e) {
//          Catch the errors
            return response()->json([
                'message' => 'Η δημιουργία του χρήστη δεν πραγματοποιήθηκε επιτυχώς. Παρακαλώ δοκιμάστε αργότερα!'
            ], 500);
        }
    }

    /**
     * @throws \Exception
     */
    public function loginUser(UserLoginRequest $request)
    {
//       Έλεγχος δεδομένων φόρμας
        $validated = $request->validated();

        try {
//          Έλεγχος username και password
            $user = $this->attemptLogin($validated['username'], $validated['password']);

//          Αποθήκευση του χρήστη στο session
            \session([
                'user_id' => $user->id,
                'username' => $user->username,
                'admin' => $user->admin
            ]);
//          Επιστροφή του χρήστη στην αρχική σελίδα με μήνυμα επιτυχίας
            return redirect()->route('home')->with([
                'type' => 'success',
                'message' => 'Η είσοδος σας στην σελίδα έχει πραγματοποιείτε επιτυχώς!'
            ]);

        } catch (\Exception $e) {
//          Επιστροφή του χρήστη πίσω στη σελίδα με το μήνυμα αποτυχίας
            return redirect()->route('login')->with([
                'type' => 'danger',
                'message' => $e->getMessage()
            ]);
        }
    }

    private function attemptLogin($username, $password)
    {
        try {
//          Έλεγχος του χρήστη αν υπάρχει στη βάση δεδομένων
            $user = User::where('username', $username)->first();

//          Επιστροφή ειδικού μηνύματος αποτυχίας
            if (!$user) {
                throw new \Exception("Το όνομα χρήστη $username δεν υπάρχει");
            }

//          Έλεγχος αν ο κωδικός του χρήστη είναι σωστός
            if ($user && Hash::check($password, $user->password)) {
                // Password is correct
                return $user;
            }

            // Επιστροφή ειδικού μηνύματος αποτυχίας
            throw new \Exception('Ο κωδικός που πληκτρολογήσατε είναι λάθος');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function logout()
    {
//      Αποδέσμευση session variables
        session()->forget('user_id');
        session()->forget('username');
        session()->forget('admin');

        //  Κατευθύνουμε τον χρήστη στην αρχική σελίδα με μήνυμα επιτυχίας
        return redirect()->route('home')->with([
            'type' => 'success',
            'message' => 'Η αποσύνδεση έχει πραγματοποιήσει επιτυχώς!'
        ]);
    }
}
