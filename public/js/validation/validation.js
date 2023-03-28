// Έλεγχος αν υπάρχει μικρό, κεφαλαίο και αριθμός στην συμφολοσειρά
const isStrongPassword = (value) => {
    const strongPasswordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return strongPasswordRegex.test(value);
};

// Έλεγχος αν η συμβολοσειρά είναι τύπου email
const isEmail = (value) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(value);
};

// Έλεγχος αν είναι αριθμός
const isInt = (value) => {
    return Number.isInteger(Number(value));
};

// Έλεγχος αν είναι ημερομηνία
const isDate = (value) => {
    return !isNaN(Date.parse(value));
};

// Έλεγχος αν είναι η ίδια τιμή με κάποιο άλλο πεδίο
const isSame = (value, otherFieldValue) => {
    return value === otherFieldValue;
};

// Συνάρτηση ελέγχουν κάθε πεδίου ανάλογα με τους κανόνες που έχει προσθέτοντας τα μηνύματα αποτυχίας
const validateField = (key, value, rules, formData) => {
    const errors = [];
    if (rules.isRequired && value.trim() === '') {
        errors.push('Αυτό το πεδίο είναι υποχρεωτικό');
    }
    if (rules.isEmail && !isEmail(value)) {
        errors.push('Καταχωρήστε μία έγκυρη διεύθυνση email');
    }
    if (rules.isStrongPassword && !isStrongPassword(value)) {
        errors.push('Ο κωδικός πρέπει να αποτελείτε από τουλάχιστο 8 χαρακτήρες, ένα κεφαλαίο, ένα μικρό γράμμα και ένα αριθμό ');
    }
    if (rules.isMinLength && value.length < rules.isMinLength) {
        errors.push(`Το πεδίο πρέπει να περιέχει τουλάχιστο ${rules.isMinLength} χαρακτήρες`);
    }
    if (rules.isMaxLength && value.length > rules.isMaxLength) {
        errors.push(`Το πεδίο πρέπει να αποτελείτε από το πολύ ${rules.isMaxLength} χαρακτήρες`);
    }
    if (rules.isInt && !isInt(value)) {
        errors.push('Καταχωρήστε ένα έγκυρο αριθμό');
    }
    if (rules.isDate && !isDate(value)) {
        errors.push('Καταχωρήστε μία έγκυρη ημερομηνία');
    }
    if (rules.isSame && value !== formData[rules.isSame]) {
        errors.push(`Το πεδίο πρέπει να έχει την ίδια τιμή με το πεδίο ${rules.isSame}`);
    }
    return errors;
}

// Συνάρτηση ελέγχου του αντικειμένου της φόρμας
const validateObject = (obj, rules) => {
    const errors = {};

    // Έλεγχος του κάθε πεδίου
    for (const [key, value] of Object.entries(obj)) {
        const fieldErrors = validateField(key, value, rules[key], obj);
        if (fieldErrors) {
            errors[key] = fieldErrors;
        }
    }

    // Διαγραφή των πεδίων του αντικειμένου που δεν έχουν κάποια τιμή
    for (const key in errors) {
        if (errors[key].length === 0) {
            delete errors[key];
        }
    }

    // Αν δεν υπάρχουν λάθη επιστρέφει άδειο αντικείμενο αλλιώς τα μηνύματα αποτυχίας
    return Object.keys(errors).length > 0 ? errors : {};
}
