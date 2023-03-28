<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:120',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).+$/',
            'address' => 'required|string|max:120',
            'municipality' => 'required',
            'county' => 'required',
            'fuel' => 'required',
            'username' => 'required|min:6|unique:users,username',
            'afm' => 'required|numeric|digits:9|unique:users,afm',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Η επωνυμία της επιχείρησης είναι υποχρεωτικό.',
            'email.required' => 'Το πεδίο Email είναι υποχρεωτικό',
            'email.email' => 'Καταχωρήστε μία έγκυρη διεύθυνση email',
            'email.unique' => 'Αυτό το email δεν είναι διαθέσιμο',
            'password.required' => 'Το πεδίο κωδικού είναι υποχρεωτικό',
            'password.confirmed' => 'Οι δύο κωδικοί πρόσβασης δεν είναι οι ίδιοι.',
            'password.min' => 'Ο κωδικός πρέπει να είναι τουλάχιστο 8 χαρακτήρες',
            'password.regex' => 'Ο κωδικός πρέπει να αποτελείτε από τουλάχιστο 8 χαρακτήρες, ένα κεφαλαίο, ένα μικρό γράμμα και ένα αριθμό.',
            'address.required' => 'Το πεδίο της διεύθυνσης είναι υποχρεωτικό',
            'municipality.required' => 'Το πεδίο του Δήμου είναι υποχρεωτικό',
            'county.required' => 'Το πεδίο Νομού είναι υποχρεωτικό',
            'fuel.required' => 'Το πεδίο καυσίμου είναι υποχρεωτικό',
            'username.required' => 'Το πεδίο Username είναι υποχρεωτικό',
            'username.min' => 'Το πεδίο username πρέπει να έχει τουλάχιστο 6 χαρακτήρες.',
            'username.unique' => 'Αυτό το username δεν είναι διαθέσιμο.',
            'afm.required' => 'Το πεδίο ΑΦΜ είναι υποχρεωτικό',
            'afm.numeric' => 'Το ΑΦΜ πρέπει να περιέχει μόνο αριθμούς.',
            'afm.digits' => 'Το ΑΦΜ πρέπει να είναι ακριβώς 9 ψηφία',
            'afm.unique' => 'Αυτό το ΑΦΜ χρησιμοποιείται από κάποιο άλλο χρήστη. Παρακαλώ επικοινωνίστε με τον διαχειριστή. email: admin@plh23.com',
            'password_confirmation.required' => 'Το πεδίο επιβεβαίωση κωδικού είναι υποχρεωτικό'
        ];
    }
}
