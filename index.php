<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Movies</title>
   <link rel="stylesheet" href="style.css">
   <!-- <script src="./code.js"></script> -->
</head>

<body>
   <header>World of Movies</header>
   <main>
      <div class="container">
         <div>
            <p>Жанр</p>
            <select id="genre_name" name="genre_name">
               <?php
               include "./connection.php";

               $query = 'SELECT * FROM `genre`';

               foreach ($connection->query($query) as $name) {
                  echo "<option value='" . $name[1] . "'>";
                  print_r($name[1]);
                  echo "</option>";
               }
               ?>

            </select>
            <input type="submit" name="form1_submit" value="Поиск" onclick="ajaxRequest(`genre_name`, ``, `genre_name`)"><br>
         </div>
         <div>
            <p>Актер</p>
            <select id="name_actor" name="name_actor">
               <?php
               include "./connection.php";

               $query = 'SELECT * FROM `actor`';

               foreach ($connection->query($query) as $name) {
                  echo "<option value='" . $name[1] . "'>";
                  print_r($name[1]);
                  echo "</option>";
               }
               ?>
            </select>
            <input type="submit" name="form2_submit" value="Поиск" onclick="ajaxRequest(`name_actor`, `2`, `name_actor`)"><br>
         </div>


         <div>
            <p>Пример '2020-10-29'</p>
            <input type="text" name="user_date" id="user_date" />
            <input type="submit" name="form3_submit" value="Поиск" onclick="ajaxRequest(`user_date`, `3`, `user_date`)"><br>
         </div>
      </div>

      <ul id="response"></ul>
   </main>

   <script>
      var ajax = new XMLHttpRequest();

      const ajaxRequest = (idInput, numberFile = "", nameValue) => {
         ajax.onreadystatechange = function() {
            if (ajax.readyState === 4) {
               if (ajax.status === 200) {
                  console.dir(ajax.responseText);
                  document.getElementById("response").innerHTML = ajax.response;
               }
            }
         }
         var blockValue = document.getElementById(idInput).value;
         ajax.open("get", `select${numberFile}.php?${nameValue}=` + blockValue);
         ajax.send();
      }
   </script>
</body>

</html>