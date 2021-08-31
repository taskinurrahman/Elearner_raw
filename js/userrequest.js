//add user
$.validator.setDefaults({
 debug: true,
 success: "valid",
});

$(function () {
 console.log("aaaaaaaa");
 $("#user-reg-form").validate({
  errorElement: "em",
  errorClass: "invalid",
  validClass: "success",
  rules: {
   username: {
    required: true,
   },
   useremail: {
    required: true,
    email: true,
   },
   password: {
    minlength: 4,
    required: true,
   },
   passwordConfirm: {
    minlength: 4,
    equalTo: "#password",
   },
  },
  messages: {
   useremail: {
    required: "Please enter a valid email address.",
    email: "Invalid Email Address.",
   },
   username: {
    required: "Please Enter name.",
   },
   password: {
    required: "Please Enter password",
   },
  },

  submitHandler: function (form) {
   let username = $("#username").val();
   let email = $("#useremail").val();
   let password = $("#password").val();

   $.ajax({
    url: "user/adduser.php",
    method: "POST",

    data: {
     username: username,
     email: email,
     password: password,
    },
    success: function (data) {
     console.log(data);
     if (data == false) {
      alert("sign up successfull");
      //  window.location.href = "index.php";
     } else if (data == true) {
      alert("Email already exist");
     } else {
      alert("All fields needs to be filled");
     }
    },
   });
   return false;
  },
 });

 ///user log in

 $("#user-login").validate({
  rules: {
   loginemail: {
    required: true,
    email: true,
   },

   loginpassword: {
    required: true,
   },
  },
  messages: {
   loginemail: {
    required: "Please enter a valid email address.",
    email: "Invalid Email Address.",
   },
   loginpassword: {
    required: "Please Enter password",
   },
  },
  submitHandler: function (form) {
   form.preventDefault();
   console.log("login clicked");
   let loginemail = $("#loginemail").val();
   let loginpassword = $("#loginpassword").val();

   $.ajax({
    url: "user/userlogin.php",
    type: "POST",

    data: {
     loginemail: loginemail,
     loginpassword: loginpassword,
    },

    success: function (res) {
     console.log(res);
     if (res == "1") {
      alert("log in successfull");
      console.log("ok");
      // window.location.href = "courses.php";
     } else if (res == "0") {
      alert("Email or password wrong");
     } else {
      alert("All fields needs to be filled");
     }
    },
   });
  },
 });

 ///course enrollment
 $(".enroll-btn").on("click", function (e) {
  console.log("enroll button clicked");
  var ids = $(this).data("id");
  let txt = $(this);
  $.ajax({
   url: "user/courseenroll.php",
   method: "POST",
   data: {
    course_id: ids[0],
    user_id: ids[1],
   },
   success: function (data) {
    console.log(data);
    txt.text("Enrolled");
   },
  });
 });
});
