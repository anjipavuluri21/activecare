<script>
    $(document).ready(function () {

        $("#loginbutton").click(function (event) {
            
            //stop submit the form, we will post it manually.
            event.preventDefault();

            // Get form
            var form = $('#login_form')[0];
            // Create an FormData object 
            var data = new FormData(form);


            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "login.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                
            success: function (data) {
                    var res=JSON.parse(data);
                    //console.log(res);stop();
//                    alert(res);
                    if(res['code']==200)
                              window.location.replace('index.php');
                    if(res['code']==203)
                        alert('Invalid Credentials');
                    if(res['code']==204){
                        alert('Please Enter valid data');
                    }

                },
                error: function (e) {

                    $("#output").text(e.responseText);
                    console.log("ERROR : ", e);
                    $("#loginbutton").prop("disabled", false);

                }
            });

        });
        
        $("#registerbutton").click(function (event) {
            
            //stop submit the form, we will post it manually.
            event.preventDefault();
            var pwd=$("#signup-password-a").val();
            var confirm_pwd=$("#signup-password-b").val();
            if(pwd != confirm_pwd){
                        alert('Password and confirm Password did not match');
                        return false;
                    }
            // Get form
            var form = $('#register_form')[0];
            // Create an FormData object 
            var data = new FormData(form);

            // disabled the submit button

            $.ajax({
                type: "POST",
//                enctype: 'multipart/form-data',
                url: "register.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                
            success: function (data) {
                 console.log(data);
                    var res=JSON.parse(data);
                    console.log(res);
//                    alert(res);
                    
                    if(res['code']==200)
                               window.location.replace('index.php');
                    
                        
                    if(res['code']==204){
                        alert('something happend');}
//                    console.log(res['code']);
                    $("#loginbutton").prop("disabled", false);

                },
                error: function (e) {

                    $("#output").text(e.responseText);
                    console.log("ERROR : ", e);

                }
            });

        });
        
      $("#joinusbutton").click(function (event) {
            
            //stop submit the form, we will post it manually.
            event.preventDefault();
            
            // Get form
            var form = $('#joinus_form')[0];
            // Create an FormData object 
            var data = new FormData(form);

            // disabled the submit button

            $.ajax({
                type: "POST",
             enctype: 'multipart/form-data',
                url: "join_us.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                
            success: function (data) {
                    var res=JSON.parse(data);
                    if(res['code']==200)
                               window.location.replace('index.php');
                           
                    if(res['code']==204)
                        alert('Please fill all the feilds');

                },
                error: function (e) {

                    $("#output").text(e.responseText);
                    console.log("ERROR : ", e);

                }
            });

        });  
        
        
        $("#programbutton").click(function (event) {
            
            //stop submit the form, we will post it manually.
            event.preventDefault();
            
            // Get form
            var form = $('#program_form')[0];
            // Create an FormData object 
            var data = new FormData(form);

            // disabled the submit button

            $.ajax({
                type: "POST",
             enctype: 'multipart/form-data',
                url: "e_book_request.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                
            success: function (data) {
                    
                    var res=JSON.parse(data);
                    
                    if(res['code']==200){
                               window.location.replace('index.php');
                    }
                    if(res['code']==204)
                        alert('Please fill all the feilds');

                },
                error: function (e) {

                    $("#output").text(e.responseText);
//                      console.log("ERROR : ", e);

                }
            });

        });  

                $("#activebutton").click(function (event) {
            
            //stop submit the form, we will post it manually.
            event.preventDefault();
            
            // Get form
            var form = $('#active_form')[0];
            // Create an FormData object 
            var data = new FormData(form);

            // disabled the submit button

            $.ajax({
                type: "POST",
             enctype: 'multipart/form-data',
                url: "complete_purchase_order.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 800000,
                
            success: function (data) {
                    
                    var res=JSON.parse(data);
                    
                    if(res['code']==200){
                               window.location.replace('index.php');
                    }
                    if(res['code']==204)
                        alert('Please fill all the feilds');

                },
                error: function (e) {

                    $("#output").text(e.responseText);
//                      console.log("ERROR : ", e);

                }
            });

        });  

       

    });
</script>