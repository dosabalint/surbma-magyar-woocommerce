jQuery(document).ready(function($){

	// Add required sign and remove the "not required" text from billing_company_field and billing_tax_number_field
	// $("#billing_company_field").children('label').append( ' <abbr class="required" title="required">*</abbr>' );
	// $("#billing_tax_number_field").children('label').append( ' <abbr class="required" title="required">*</abbr>' );
	// $("#billing_company_field label span").hide();
	// $("#billing_tax_number_field label span").hide();
	if( $('#billing_company_check').prop("checked" ) == false){
		$("#billing_company_field").hide();
		if(! $("#billing_company").val() ){
			$('#billing_company').val("- N/A -");
		}
		$("#billing_tax_number_field").hide();
		if(! $("#billing_tax_number").val() ){
			$('#billing_tax_number').val("- N/A -");
		}
	}
	// if( $("#billing_company_field").hasClass("validate-required") ){
	// 	$("#billing_company_field").removeClass("validate-required");
	// }

	$('#billing_company_check').click(function(){
		if($(this).prop("checked") == true){
			// if(! $("#billing_company_field").hasClass("validate-required") ){
			// 	$("#billing_company_field").addClass("validate-required");
			// }
			if( $("#billing_company").val() == "- N/A -" ){
				$('#billing_company').val("");
			}
			$("#billing_company_field").show();
			// if(! $("#billing_tax_number_field").hasClass("validate-required") ){
			// 	$("#billing_tax_number_field").addClass("validate-required");
			// }
			if( $("#billing_tax_number").val() == "- N/A -" ){
				$('#billing_tax_number').val("");
			}
			$("#billing_tax_number_field").show();
		}
		else if( $(this).prop("checked") == false ){
			// if( $("#billing_company_field").hasClass("validate-required") ){
			// 	$("#billing_company_field").removeClass("validate-required");
			// }
			$("#billing_company_field").hide();
			if(! $("#billing_company").val() ){
				$('#billing_company').val("- N/A -");
			}
			// $("#billing_company_field label").children('abbr').remove();
			// if( $("#billing_tax_number_field").hasClass("validate-required") ){
			// 	$("#billing_tax_number_field").removeClass("validate-required");
			// }
			$("#billing_tax_number_field").hide();
			if(! $("#billing_tax_number").val() ){
				$('#billing_tax_number').val("- N/A -");
			}
			// $("#billing_tax_number_field label").children('abbr').remove();
		}
	});

});
