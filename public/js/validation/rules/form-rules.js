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
        isMaxLength: 9,
    },
    password_confirmation: {
        isRequired: true,
        isSame: 'password'
    },
};

const loginRules = {
    username: {
        isRequired: true,
    },
    password: {
        isRequired: true,
    },
}

const announcementRules = {
    title: {
        isRequired: true,
    },
    content: {
        isRequired: true,
    }
}

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
