// onSubmit συνάρτηση της φόρμας εγγραφής
function validateRegisterForm(event) {
    return validateForm(event, registerRules);
}

// onSubmit συνάρτηση της φόρμας σύνδεσης
function validateLoginForm(event) {
    return validateForm(event, loginRules);
}

// onSubmit συνάρτηση της φόρμας καταχώρηση ανακοίνωσης
function validateImportOfferForm(event) {
    return validateForm(event, offerRules);
}

// onSubmit συνάρτηση της φόρμας καταχώρηση προσφοράς
function validationImportAnnouncement(event) {
    return validateForm(event, announcementRules);
}

// Συνάρτηση για όλες τις φόρμες ώστε να πάρει τα δεδομένα από τη φόρμα
function validateForm(event, rules) {
    const form = event.target; // Καταγραφή των δεδομένων από το event
    const formData = new FormData(form);
    formData.delete('_token');  // διαγραφή του csrf token από τον έλεγχο της φόρμας

    // Αποθήκευση των δεδομένων της φόρμας σε αντικείμενο
    const data = {};
    formData.forEach((value, key) => { // iterate over the FormData object
        data[key] = value; // add each form field to the data object
    });

    // Κλήση της συνάρτησης για έλεγχος σφαλμάτων
    const errors = validateObject(data, rules);

    // Εμφάνιση των μηνυμάτων αποτυχίας στον χρήστη
    showErrors(data, errors);

    // Αν είναι όλα καλώς στέλνει τη φόρμα στο backend αλλιώς επιστρέφει σφάλμα
    return Object.keys(errors).length === 0;
}

// Εμφάνιση των μηνυμάτων αποτυχίας στη φόρμα του χρήστη
function showErrors(data, errors) {
    for (let field in data) {
        if (errors.hasOwnProperty(field)) {
            // Καταγραφή του μηνύματος αποτυχίας
            const errorMessage = errors[field][0];

            // Προσθέτουμε το μήνυμα κάτω από το πεδίο που έχει το σφάλμα
            const errorId = `${field}-error`;
            const errorElement = document.getElementById(errorId);
            if (errorElement) {
                errorElement.innerHTML = errorMessage || '';
            }

            // Προσθέτουμε κόκκινο χρώμα στο πεδίο εισαγωγής
            const inputElement = document.getElementById(field);
            if (inputElement) {
                inputElement.classList.add("is-invalid")
            }
        } else {
            // Διαγραφή του μηνύματος αποτυχίας από το πεδίο εφόσον είναι έγκυρο
            const errorId = `${field}-error`;
            const errorElement = document.getElementById(errorId);
            if (errorElement) {
                errorElement.innerHTML = '';
            }

            // Αφαιρούμε το κόκκινο χρώμα στο πεδίο εισαγωγής
            const inputElement = document.getElementById(field);
            if (inputElement) {
                inputElement.classList.remove("is-invalid")
            }
        }
    }
}





