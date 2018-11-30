/**
 * Theme: Velonic Admin Template
 * Author: Coderthemes
 * Form wizard page
 */

! function($) {
    "use strict";

    var FormWizard = function() {};
    FormWizard.prototype.createBasic = function($form_container) {
            $form_container.children("div").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                onFinished: function(event, currentIndex) {
                    var form = $('#basic-form');

                    // Submit form input
                    form.submit();
                }
            });
            return $form_container;
        },

        FormWizard.prototype.init = function() {
            //initialzing various forms

            //basic form
            this.createBasic($("#basic-form"));

        },
        //init
        $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.FormWizard.init()
}(window.jQuery);