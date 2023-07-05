const myform = document.getElementById('password');
var validator = FormValidation.formValidation(
    form,
    {
        fields: {
            'current_password': {
                validators: {
                    notEmpty: {
                        message: 'Current password is required'
                    }
                }
            },
            'new_password': {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    callback: {
                        message: 'Please enter valid password',
                        callback: function (input) {
                            if (input.value.length > 0) {
                                return validatePassword();
                            }
                        }
                    }
                }
            },
            'confirm_password': {
                validators: {
                    notEmpty: {
                        message: 'The password confirmation is required'
                    },
                    identical: {
                        compare: function () {
                            return form.querySelector('[name="new_password"]').value;
                        },
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
        },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    }
);