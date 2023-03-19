const isStrongPassword = (value) => {
    const strongPasswordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return strongPasswordRegex.test(value);
};

const isEmail = (value) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(value);
};

const isInt = (value) => {
    return Number.isInteger(Number(value));
};

const isDate = (value) => {
    return !isNaN(Date.parse(value));
};

const isSame = (value, otherFieldValue) => {
    return value === otherFieldValue;
};

const isBoolean = (value) => {
    return typeof value === "boolean";
};

const validateField = (key, value, rules, formData) => {
    const errors = [];
    if (rules.isRequired && value.trim() === '') {
        errors.push('This field is required');
    }
    if (rules.isEmail && !isEmail(value)) {
        errors.push('Please enter a valid email address');
    }
    if (rules.isStrongPassword && !isStrongPassword(value)) {
        errors.push('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number');
    }
    if (rules.isMinLength && value.length < rules.isMinLength) {
        errors.push(`Please enter at least ${rules.isMinLength} characters`);
    }
    if (rules.isMaxLength && value.length > rules.isMaxLength) {
        errors.push(`Please enter no more than ${rules.isMaxLength} characters`);
    }
    if (rules.isInt && !isInt(value)) {
        errors.push('Please enter a valid integer');
    }
    if (rules.isDate && !isDate(value)) {
        errors.push('Please enter a valid date');
    }
    if (rules.isSame && value !== formData[rules.isSame]) {
        errors.push(`This field must match the ${rules.isSame} field`);
    }
    if (rules.isBoolean && !isBoolean(value)) {
        errors.push('Please enter a valid boolean value');
    }
    return errors;
}

const validateObject = (obj, rules) => {
    const errors = {};

    for (const [key, value] of Object.entries(obj)) {
        const fieldErrors = validateField(key, value, rules[key], obj);
        if (fieldErrors) {
            errors[key] = fieldErrors;
        }
    }

    for (const key in errors) {
        if (errors[key].length === 0) {
            delete errors[key];
        }
    }

    return Object.keys(errors).length > 0 ? errors : {};
}
