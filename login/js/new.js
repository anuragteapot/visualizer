$(document).ready(function(){

    $("#signup_submit").click(function(){

        var name=$("#signup-name").val();
        var email=$("#signup-email").val();
        var username=$("#signup-username").val();
        var password=$("#signup-password").val();
        var submit = 'submit';

      $.post("includes/signup.inc.php",
       {
         submit:submit,
         username:username,
         password:password,
         name:name,
         email:email
       },

      function(data,status){

            if(status=="success")
            {
              $('#snackbar').text(data);
              $('#snackbar').addClass("show");
              setTimeout(function(){ $('#snackbar').removeClass("show");}, 3000);
            }

          });
    });
});

$(document).ready(function(){

    $("#login_submit").click(function(){

        var email=$("#signin-email").val();
        var password=$("#signin-password").val()
        var submit = 'submit';

      $.post("includes/login.inc.php",
       {
         submit:submit,
         password:password,
         email:email
       },

      function(data,status){

            if(status=="success")
            {
                if(data!=1)
                {
                  $('#snackbar').text(data);
                  $('#snackbar').addClass("show");
                  setTimeout(function(){ $('#snackbar').removeClass("show");}, 3000);
                } else {
                  window.location = "http://localhost/project/vis/OnlinePythonTutor-master/v5-unity/";
                }
            }

          });
    });
});


$(document).ready(function(){

    $("#reset_submit").click(function(){

        var email=$("#reset-email").val();
        var submit = 'submit';

      $.post("includes/forgot.inc.php",
       {
         submit:submit,
         email:email
       },

      function(data,status){

            if(status=="success")
            {
              $('#snackbar').text(data);
              $('#snackbar').addClass("show");
              setTimeout(function(){ $('#snackbar').removeClass("show");}, 3000);
            }

          });
    });
});

$(document).ready(function(){

    $("#logout_btn").click(function(){

        var submit = 'submit';

      $.post("includes/logout.inc.php",
       {
         submit:submit,
       },

      function(data,status){

            if(status=="success")
            {

                window.location = "http://localhost/project/vis/OnlinePythonTutor-master/v5-unity/";
            }

          });
    });
});


$(document).ready(function(){

    $("#files_btn").click(function(){

        var submit = 'submit';

      $.post("files/index.php",
       {
         submit:submit,
       },

      function(data,status){

            if(status=="success")
            {


              window.open(
                'http://localhost/project/vis/OnlinePythonTutor-master/v5-unity/files/',
                '_blank' // <- This is what makes it open in a new window.
              );

             }

          });
    });
});



$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault()
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    }
  });
 });
