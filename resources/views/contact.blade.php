<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>contact</title>
<style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
     a {
          color: #45a049;
          text-align: center;
      }
    p {
      font-family: verdana;
      font-size: 20px;
      text-align: center;
    }
    h1 {
          font-family: verdana;
          color: red;
          font-size: 20px;
          text-align: center;
        }

</style>
</head>
<body>

     <div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

         <p>{{ $hijri_string_date }} - {{ $string_date }}</p>

         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif

          <form id="contact_form" action="/postdata" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <label for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="" size="60" /><br />
            </div>
            <div class="row">
                <label for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="" size="60" /><br />
            </div>
            <div class="row">
                <label for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="9" cols="150"></textarea><br />
            </div>
            <input id="submit_button" type="submit" value="Submit" />
         </form>
         <p><b> <a href="\showContacts">View All contacts</a></b></p>
     </div>

</body>
</html>