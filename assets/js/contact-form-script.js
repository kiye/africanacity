/*==============================================================*/
// Contact Form  JS
/*==============================================================*/
(function ($) {
    "use strict"; // Start of use strict
    $("#contactForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            formError();
            submitMSG(false, "Did you fill in the form properly?");
        }
        else {
            event.preventDefault();
            submitForm();
        }
    });

    function submitForm(){
        // Initiate Variables With Form Content
        var name = $("#name").val();
        var email = $("#email").val();
        var phone_number = $("#phone_number").val();
        var msg_subject = $("#msg_subject").val();
        var message = $("#message").val();

        $.ajax({
            type: "POST",
            url: "assets/php/form-process.php",
            data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&phone_number=" + phone_number + "&message=" + message,
            success : function(text){
                if (text == "success"){
                    formSuccess();
                }
                else {
                    formError();
                    submitMSG(false,text);
                }
            }
        });
    }
    function formSuccess(){
        $("#contactForm")[0].reset();
        submitMSG(true, "Message Submitted!")
    }
    function formError(){
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass();
        });
    }
    function submitMSG(valid, msg){
        if(valid){
            var msgClasses = "h4 tada animated text-success";
        }
        else {
            var msgClasses = "h4 text-danger";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }

}(jQuery)); // End of use strict

var popupForm = document.querySelector("form");
			var popupButton = document.querySelector("button");
			
			popupButton.addEventListener("click", function () {
				 var popupEmail = popupForm.querySelector("#name").value;
				 var popupName = popupForm.querySelector("#email").value;
			
				 var event_data = {
					  event_name: "popup_sent",
					  email: popupEmail,
					  name: popupName
				 }
			
				 window.top.UE.pageHit({'apiKey':put_api_key_of_your_app_here, 
					  'email': popupEmail,
					  'name': popupName,
					  'event': event_data
				 });
				 
				 document.getElementById('my_form').style.display = 'none';
				 document.getElementById('thank_you').style.display = 'block';
			});