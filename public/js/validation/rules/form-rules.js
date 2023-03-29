// Κανόνες αντικειμένου της φόρμας της εγγραφής
const registerRules = {
    name: {
        isRequired: true,
        isMaxLength: 120,
    },
    afm: {
        isRequired: true,
        isMinLength: 9,
        isMaxLength: 9,
    },
    address: {
        isRequired: true,
        isMaxLength: 120,
    },
    municipality: {
        isRequired: true,
    },
    county: {
        isRequired: true,
    },
    fuel: {
        isRequired: true,
    },
    email: {
        isRequired: true,
        isEmail: true,
    },
    username: {
        isRequired: true,
        isMinLength: 6,
    },
    password: {
        isRequired: true,
        isStrongPassword: true,
    },
    password_confirmation: {
        isRequired: true,
        isSame: 'password'
    },
};

// Κανόνες αντικειμένου της φόρμας της σύνδεσης
const loginRules = {
    username: {
        isRequired: true,
    },
    password: {
        isRequired: true,
    },
}

// Κανόνες αντικειμένου της φόρμας της δημιουργία ανακοίνωσης
const announcementRules = {
    title: {
        isRequired: true,
    },
    content: {
        isRequired: true,
    }
}

// Κανόνες αντικειμένου της φόρμας της εισαγωγής προσφοράς
const offerRules = {
    name: {
        isRequired: true,
        isMaxLength: 120,
    },
    afm: {
        isRequired: true,
        isMinLength: 9,
        isMaxLength: 9,
    },
    address: {
        isRequired: true,
        isMaxLength: 120,
    },
    municipality: {
        isRequired: true,
    },
    county: {
        isRequired: true,
    },
    fuel: {
        isRequired: true,
    },
    amount: {
        isRequired: true,
    },
    expire_date: {
        isRequired: true,
    },
}
