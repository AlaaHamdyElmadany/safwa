<!DOCTYPE html>
<html>
<head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }
    a {
          color: #45a049;
          text-align: center;
      }
</style>
<title>contact</title>
</head>
<body>
<h3><b><a href="\contact">ContactUS</a></b></h3>
<table style="width:100%">
   <tr>
     <th>name</th>
     <th>email</th>
     <th>Message</th>
     <th>date</th>
     <th>Hijri date</th>
   </tr>
    <?php
     foreach ($contacts as $contact)
     {?>


       <tr>
         <td>{{$contact->name}}</td>
         <td>{{$contact->email}}</td>
         <td>{{$contact->message}}</td>
         <td>{{$contact->string_date}}</td>
         <td>{{$contact->hijri_string_date}}</td>
       </tr>
            <?php }?>
 </table>

</body>
</html>