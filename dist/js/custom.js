/**
 * Created by MegaMind on 6/29/2018.
 */

jQuery(document).ready(function(){

    jQuery('#NewQuestionButton').click(function () {
        var newquestion = jQuery("#newquestion").val();

        // New Question Correct Ans
        var newquestioncorrect = [];
        for (var i = 1 ; i <=4 ; i++){
            var n = i-1;
            if(jQuery("#newquestioncorrect"+i).is(':checked')){
                newquestioncorrect[n] = 1;
            }else{
                newquestioncorrect[n] = 0;
            }
        }

        // New Question Option\
        var newquestionans = [];
        for (var j = 1 ; j <=4 ;j++){
            var n = j-1;
            newquestionans[n] = jQuery("#newquestionans"+j).val();
        }
       jQuery.ajax({
            url:ajaxurl, //the page containing php script
            type: "POST", //request type,
            dataType: 'json',
            data: {action: "NewQuestion", newquestioncorrect: newquestioncorrect, newquestionans : newquestionans,newquestion:newquestion},
            success:function(result){
                if(result['status']=='success'){
                    jQuery('#message').empty();
                    jQuery('#message').append(result['message']);
                    setTimeout(function(){
                        jQuery('.fa-spin').hide();
                        location.reload();
                    }, 1000);
                }else{
                    jQuery('.fa-spin').hide();
                    jQuery('#message').empty();
                    jQuery('#message').append(result['message']);

                }
            }
        });
    });

    jQuery('.NewQuestionedit').click(function (){
        var NewQuestionedit = jQuery( this ).val();
        //alert(jQuery( this ).val());

        jQuery('#editQuestion').modal('show');

        jQuery.ajax({
            url:ajaxurl, //the page containing php script
            type: "POST", //request type,
            dataType: 'json',
            data: {action: "GetQuestion", NewQuestionedit: NewQuestionedit},
            success:function(result){
                if(result['status']=='success'){
                    jQuery('#message').empty();
                    jQuery('#message').append(result['message']);
                    setTimeout(function(){
                        jQuery('.fa-spin').hide();
                        location.reload();
                    }, 1000);
                }else{
                    jQuery('.fa-spin').hide();
                    jQuery('#message').empty();
                    jQuery('#message').append(result['message']);

                }
            }
        });


    });
});