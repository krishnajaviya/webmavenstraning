$(document).ready(function(){
	$("#productform").validate({
		rules :{
			name :{
			  required: true
			},
			slug :{
				required : true
			},
			sku :{
				required : true
			},
			moq :{
				required :true
			},
			categories: {
    			required: true
    		},
    		search_keywords: {
    			required: true
    		},
    		price: {
    			required: true
    		},
    		discount_type: {
    			required: true
    		},
    		discount_value: {
    			required: true
    		},
		},
			 messages :{

			 	name : {
			 		required: "please enter name"
			 	},
			 	slug : {
			 		required: "please enter slug"
			 	},
			 	sku : {
			 		required : "please enter sku"
			 	},
			 	moq :{
			 		required : "please enter moq"
			 	},
			 	categories: {
			 		required : "please enter categories"
			 	},
			 	search_keywords: {
    				required: "please enter Search Keywords"
    			},
    			price: {
    				required: "please enter Price"
    			},
    			discount_type: {
    				required: "please enter Discount Type"
    			},
    			discount_value: {
    				required: "please enter Discount Value"
    			}
			}
		
	});
	$("#moq").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });

});