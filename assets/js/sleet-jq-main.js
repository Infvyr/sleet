$ = jQuery;

// jQuery DOM elements selectors
const domEL = {
    body: $('body'),
};

// jQuery function definitions
const funcDefinitions = {
    testJq: function(){
        $(document).on("click", domEL.body,function() {
            console.log('jQuery loaded');
        });
    },
};


// jQuery document ready
$(function (){
    funcDefinitions.testJq();
});