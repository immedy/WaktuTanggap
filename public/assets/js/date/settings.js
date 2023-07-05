"use strict";
var now = new Date(); // membuat objek tanggal dan waktu saat ini
var formattedDate = now.getFullYear() + "-" + (now.getMonth() + 1).toString().padStart(2, "0") + "-" + now.getDate().toString().padStart(2, "0");
var formattedTime = now.getHours().toString().padStart(2, "0") + ":" + now.getMinutes().toString().padStart(2, "0");
var KTProjectSettings = {
    init: function () {
        ! function () {
            var t;
            $("#kt_datepicker_1").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                defaultDate: formattedDate + " " + formattedTime                
            });
            t = FormValidation.formValidation(e, {
                fields: {
                    date: {
                        validators: {
                            notEmpty: {
                                message: "Due Date is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    submitButton: new FormValidation.plugins.SubmitButton,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
            }), i.addEventListener("click", (function (e) {
                e.preventDefault(), t.validate().then((function (t) {
                    "Valid" == t ? swal.fire({
                        text: "Thank you! You've updated your project settings",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    }) : swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    })
                }))
            }))
        }()
    }
};
KTUtil.onDOMContentLoaded((function () {
    KTProjectSettings.init()
}));
