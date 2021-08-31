//admin login
function adminlogin() {
 console.log("admin login clicked");
 let adloginemail = $("#adminloginemail").val();
 let adloginpassword = $("#adminloginpassword").val();

 $.ajax({
  url: "/elearning/admin/adminlogin.php",
  type: "POST",

  data: {
   adloginemail: adloginemail,
   adloginpassword: adloginpassword,
  },

  success: function (data) {
   console.log(data);
   if (data == "1") {
    window.location.href = "../elearning/admin/adminarea.php";
   } else {
    window.alert(" Email or Password is wrong");
   }
  },

  error: function (e) {
   alert("password or email is wrong");
  },
 });
}

///addcourse
$(".form-addcourse").submit(function (e) {
 console.log("Submit clicked");
 e.preventDefault();
 let fd = new FormData(this);
 console.log(typeof this);
 let course_img = $("#course_img")[0].files[0];
 fd.append("image", course_img);

 $.ajax({
  url: "/elearning/admin/adminaddcourse.php",
  type: "POST",
  data: fd,
  processData: false,
  contentType: false,
  success: function (data) {
   //    console.log(data);
   if (data == "ok") {
    $("#alert-msg").addClass("alert alert-success col-sm-6 ml-5 mt-2");
    $("#alert-msg").html("Course added successfully").show();
   } else if (data == "no") {
    $("#alert-msg").addClass("alert alert-warning col-sm-6 ml-5 mt-2");
    $("#alert-msg").html("Fill All Fileds").show();
   } else if (data == "failed") {
    $("#alert-msg").addClass("alert alert-danger col-sm-6 ml-5 mt-2");
    $("#alert-msg").html("Unbable to add").show();
   }
  },
 });
});

//course delete operation;
$(".course-delete").click(function (e) {
 let obj = $(this);
 let id = $(this).data("id");
 console.log(id);
 $.ajax({
  url: "/elearning/admin/coursedelete.php",
  type: "POST",
  data: {
   id: id,
  },
 })
  .done(function (data) {
   $(obj).closest("tr").remove();
  })
  .fail(function (err) {
   console.log(err);
  });
});

///user delete operation

$(".user-delete").click(function (e) {
 let obj = $(this);
 let id = $(this).data("id");
 console.log("user-delete clicked");
 $.ajax({
  url: "/elearning/admin/userdelete.php",
  type: "POST",
  data: {
   id: id,
  },
 })
  .done(function (data) {
   $(obj).closest("tr").remove();
  })
  .fail(function (err) {
   console.log(err);
  });
});
