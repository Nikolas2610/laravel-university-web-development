function validateRegisterForm(event) {
    return validateForm(event, registerRules);
}

function validateLoginForm(event) {
    return validateForm(event, loginRules);
}

function validateImportOfferForm(event) {
    // return validateForm(event, offerRules);
    return true;
}

// TODO: Fix that
function validationImportAnnouncement(event) {
    console.log(event)
    event.preventDefault();
    return false;
    // validateForm(event, announcementRules);
}

function validateForm(event, rules) {
    const form = event.target; // get the form element from the event object
    const formData = new FormData(form); // create a FormData object from the form
    formData.delete('_token');

    const data = {}; // create an empty object to store the form data
    formData.forEach((value, key) => { // iterate over the FormData object
        data[key] = value; // add each form field to the data object
    });
    console.log(data)
    const errors = validateObject(data, rules);
    showErrors(data, errors);

    return Object.keys(errors).length === 0;
    // return false
}

function showErrors(data, errors) {
    // loop through the errors object
    for (let field in data) {
        if (errors.hasOwnProperty(field)) {
            // get the error message for the field
            const errorMessage = errors[field][0];

            // create the id of the error element
            const errorId = `${field}-error`;

            // get the error element
            const errorElement = document.getElementById(errorId);

            // check if the error element exists
            if (errorElement) {
                // populate the error message in the error element
                errorElement.innerHTML = errorMessage || '';
            }
        } else {
            // create the id of the error element
            const errorId = `${field}-error`;

            // get the error element
            const errorElement = document.getElementById(errorId);

            // check if the error element exists
            if (errorElement) {
                // clear the error message from the error element
                errorElement.innerHTML = '';
            }
        }
    }
}





