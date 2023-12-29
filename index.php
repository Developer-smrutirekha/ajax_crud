<!DOCTYPE html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .updt {
      display: none;
    }
  </style>
</head>

<body>

  <form>

    <div class="mb-3">
      <label for="name" class="form-label">name</label>
      <input type="name" class="form-control" id="name">
      <input type="name" class="form-control" id="id" hidden>
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">age</label>
      <input type="age" class="form-control" id="age">
    </div>

    <div class="mb-3">
      <label for="email1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <div id="btns">
      <button type="button" class="btn btn-primary add" onclick='adddetails()'>Submit</button>
      <button type="button" class="btn btn-primary updt" onclick='Updtdetails()'>Update</button>
    </div>
  </form>



  <table>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>age</th>
      <th>email</th>
      <th>password</th>
      <th>Action</th>

    </tr>
    <tbody id="tbody"></tbody>
  </table>






  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      show();

      // event.preventDefault();

    });
    // $("#load-button").on("click", function(e) {



    let template = '';

    function show() {

      $.ajax({
        url: "sbackend.php",
        type: 'GET',
        success: function(result) {
          var result = JSON.parse(result);
          if (result.status == 1) {
            template = ' ';
            
            for (let i = 0; i < result.data.length; i++) {
              let index = i+1;
              template += '<tr><td>' + index + '</td><td>' + result.data[i].name + '</td><td>' + result.data[i].age + '</td><td>' + result.data[i].email + '</td><td>' + result.data[i].password + '</td>  <td> <button onclick="deletedata(' + result.data[i].id + ')"class="btn btn-danger" id="btn-delete">DELETE</button></td></button> </td><td><button onclick="editdata(' + result.data[i].id + ')" class="btn btn-primary" id="btn-edit"> EDIT </button></td></tr>'
            }
            $("#tbody").html(template);

          }

        },

      });
    }
    // });




    function adddetails() {

      var name = $('#name').val();
      var age = $('#age').val();
      var email = $('#email').val();
      var password = $('#password').val();

      $.ajax({
        url: 'backend.php',
        type: 'POST',
        data: {
          sname: name,
          sage: age,
          semail: email,
          spassword: password
        },
        success: function(result) {
          var result = JSON.parse(result);
          console.log(result);
          if (result.status == 1) {
            show();
          } else {
            alert("can not save this ");
          }

        }


      })
    }


    function deletedata(santa) {

      $.ajax({
        url: 'delete.php',
        type: 'POST',
        data: {
          id: santa
        },
        success: function(data) {

          show();
        }



      })
    }


    function editdata(edit) {

      $.ajax({
        url: 'edit.php',
        type: 'POST',
        data: {
          id: edit
        },
        success: function(data) {
          var abc = JSON.parse(data);
          $("#id").val(abc.id);
          $("#name").val(abc.name);
          $("#age").val(abc.age);
          $("#email").val(abc.email);
          $("#password").val(abc.password);
          $(".add").css({
            "display": "none"
          });
          $(".updt").css({
            "display": "block"
          });
          //  $("#btns").html('');
          //  $("#btns").html('<button type="button" class="btn btn-primary updt">Update</button>');

          console.log(abc);

        }
      })
    }

    function Updtdetails() {


      var id = $('#id').val();
      var name = $('#name').val();
      var age = $('#age').val();
      var email = $('#email').val();
      var password = $('#password').val();


      $.ajax({
        url: 'update.php',
        type: 'POST',
        data: {
          id: id,
          s_name: name,
          s_age: age,
          s_email: email,
          s_password: password
        },

        success: function(result) {
          var result = JSON.parse(result);
          console.log(result);
          if (result.status == 1) {
            show();
            $('#id').val('');
            $('#name').val('');
            $('#age').val('');
            $('#email').val('');
            $('#password').val('');
            $(".add").css({
            "display": "block"
          });
          $(".updt").css({
            "display": "none"
          });
          } else {
            alert("can not save this ");
          }
        }     
      })
    }
  </script>
</body>


</html>