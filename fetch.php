<!DOCTYPE html>
<html lang="en">
<head>
     <title>JS FETCH METHOD</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script>
          function fetch_table()
          {
              fetch('fetch_details.php')
              .then((response) => response.json())
              .then((data) => {
                    var user = document.getElementById('users');
                    if(data['empty'])
                    {                         
                         user.innerHTML = '<tr><td colspan="4" align="center"><h3>No Records</h3></td></tr>';
                    }
                    else
                    {
                         var  tr = '';
                         for(var i in data)
                         {
                              tr += `<tr>
                                   <td>${data[i].id}</td>
                                   <td>${data[i].name}</td>
                                   <td>${data[i].designation}</td>
                                   <td>${data[i].mobile}</td>
                              </tr>`;
                         }
                         user.innerHTML = tr;
                    }    
               })
               .catch((error) => {
                    message('error', 'fetch data failed');
               });
          }
          function message(type, text)
          {
               if(type == 'error')
               {
                    var msg = document.getElementById('error-msg');
               }
               else
               {
                    var msg = document.getElementById('success-msg');
               }
               msg.innerHTML = text;               
          }
          fetch_table();
     </script>
</head>
<body>
     <div class="container">
          <h2>User Details fetch with Fetch Method in JavaScript</h2> 
          <span id="error-msg"></span>        
          <span id="success-msg"></span>        
          <table class="table table-striped">
               <thead>
                    <tr>
                         <th>Sr. No.</th>
                         <th>Full Name</th>
                         <th>Designation</th>
                         <th>Mobile</th>
                    </tr>
               </thead>
               <tbody id="users"></tbody>
          </table>
     </div>
</body>
</html>