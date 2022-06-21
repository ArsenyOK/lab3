<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Movies</title>
   <link rel="stylesheet" href="style.css">
   <!-- <script src="./code.js"></script> -->
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

      function button2() {
         ajax.onreadystatechange = function() {
            if (ajax.readyState === 4) {
               if (ajax.status === 200) {
                  console.dir(ajax);
                  let name_actor = document.getElementById("name_actor").value;
                  console.log(name_actor, "name_actor")
                  let rows = ajax.responseXML.firstChild.children;
                  let result = "";
                  result += "<ol>";
                  for (var i = 0; i < rows.length; i++) {
                     result += "<li>" + rows[i].children[0].firstChild.nodeValue + "</li>";
                  }
                  document.getElementById("response").innerHTML = result;
                  result += "</ol>";
               }
            }
         }
         var name_actor = document.getElementById("name_actor").value;
         ajax.open("get", "select2.php?name_actor=" + name_actor);
         ajax.send();
      }


      function button3() {
         ajax.onreadystatechange = function() {
            if (ajax.readyState === 4) {
               if (ajax.status === 200) {
                  try {
                     console.log(ajax);
                     var rows = JSON.parse(ajax.responseText);
                     let user_date = document.getElementById("user_date").value;

                     var array = Object.keys(rows)
                        .map(function(key) {
                           return rows[key];
                        });
                     let result = "<ol>";
                     console.log(array)

                     for (var i = 0; i < array.length; i++) {
                        result += "<li>" + array[i] + "</li>";
                     }
                     result = result + "</ol>";
                     document.getElementById("response").innerHTML = result;
                  } catch (e) {
                     console.log(e)
                  }
               }
            }
         };
         var user_date = document.getElementById("user_date").value;
         ajax.open("get", "select3.php?user_date=" + user_date);
         ajax.send();
      }
   </script>
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
            <p>Актер
               <select id="name_actor" name="name_actor">
                  <?php
                  include "./connection.php";

                  $query = 'SELECT * FROM `actor`';
                  $document = $connection->query($query);
                  foreach ($document as $cell) {
                     echo "<option>";
                     print($cell[1]);
                     echo "</option>";
                  }
                  ?>
               </select>
               <button onclick="button2()"> Получить </button>
            </p>

            <!-- <p>Актер</p>
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
            <input type="submit" name="form2_submit" value="Поиск" onclick="button2()"><br> -->
         </div>


         <div>
            <p>Пример '2020-10-29'</p>
            <input type="text" name="user_date" id="user_date" />
            <input type="submit" name="form3_submit" value="Поиск" onclick="button3()"><br>
         </div>
      </div>

      <div id="response"></div>
   </main>
</body>

</html>
