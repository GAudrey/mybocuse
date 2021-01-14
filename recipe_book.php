<?php
session_start();
include('secret.php');
try
{

	$bddbocuse = new PDO('mysql:host=localhost;dbname=xnnujqmj_mybocuse;charset=utf8',$phpmalog, $phpmapasswd);

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST['recipe_name']) && isset($_POST['date']) && !empty($_POST['recipe_name']) && !empty($_POST['date']))
{
  $recipe_name = $_POST['recipe_name'];
  $date = $_POST['date'];
    
  $req = $bddbocuse->prepare('INSERT INTO recipes (recipe_name, date, fk_userid) VALUES(:recipe_name, :date, :fk_userid)');

    $req->execute(array(
    'recipe_name' => $recipe_name,
    'date' => $date,
    'fk_userid' => $_SESSION['userid']
  ));

  
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  
  <link rel="stylesheet" type="text/css" href="styles.css">
  <!-- Baloo Bhai 2 font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">

</head>

<body>
  <!------------- Marie recipe page start------------->
  <header>
    <h2 id=recipetitleagenda>Agenda recipe</h2>
  </header>

  <main>
    <section class="tiles_group">

    <div class="studentdashboard">

<div class="tile is-ancestor">
    <div class="tile is-parent is-2" id=paddingmenu >
      <article class="tile is-child box has-background-black " id=menubar>
        <p class="title" id=titlemenu> my.</p>

    <!------------------------------LINK-TO-HOMEPAGE-------------------------------------->

        <figure class="homebutton" id=hombebutton>
         <a href='studentdashboard.php'><img src="./asset/icons/home.png"></a>

      </figure>
       
     <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->

      <figure class="calendarbutton" id=calendarbutton>
      <a href='recipe_book.php'><img src="./asset/icons/calendar.png"></a>

     </figure>


     <!------------------------------LINK-TO-LOGOUT------------------------------------->

    <figure class="logoutbutton">
    <a href='logout.php'><img src="./asset/icons/logout.png" id=logoutbutton></a>

      </figure>
      </article>
    </div>  


      <div class="tile is-ancestor">
        <div class="tile is-vertical is-parent is-8" id=marginagendabox>
          <div class="tile is-child box" id=agendabox>
            
  
<?php


 $reponse = $bddbocuse->query('SELECT recipe_name, date, fk_userid FROM recipes');
  
  while ($donnees = $reponse->fetch())
  {
?>
    <p class="title">
  <?php echo $donnees['recipe_name']; ?>
    </p>

    <p class="subtitle">
<?php 
echo 'Date: ' . $donnees['date'] . ', 13:30'; 
?>
</p> 
<p>
  <?php
  echo "coucou " . $donnees['fk_userid'];
  ?>
</p>
<br>
<?php


}$reponse->closeCursor();
?>
      
    
    <br>
    


          </div>

        </div>
        <div class="tile is-parent is-3 tile_info" id=tilesubmitmargins>
          <div class="tile is-child box is-grey" id=submitbox>
            <p class="title">The recipe</p>
            <p id=textrecipesumbit>Each day at 1:30PM a learner chooses one of his favorite recipes and shares it with the rest of the class</p>
            <button class="button is-black" id="addRecipe">Book a recipe</button>
          </div>
        </div>
      </div>

    </section>


    <!------------- Marie modal recipe start------------->
    <div class="modal" id="myModal">
      <div class="modal-background"></div>
      <div class="modal-card ">
        <header class="has-background-dark modal-card-head">
          <p class="modal-card-title has-text-white">Book your recipe presentation</p>
          <button class="delete" aria-label="close"></button>
        </header>

        <section class="modal-card-body has-background-dark has-text-white">
          <div class="content">
            <form method="post" action=''>
              <label for="title">Recipe Title</label>
              <input class="input has-background-dark has-text-white" type="text" placeholder="Enter the name of your recipe" name="recipe_name">

              <label for="date">Date</label>
              <input class="input has-background-dark has-text-white" type="date" name="date">

              <!-- <label for="author">Author</label>
              <input class="input has-background-dark has-text-white" type="text" name="author" value=""> -->
                  
                  <?php 
                if(isset($_POST['firstname']) && isset($_POST['lastname'])  && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
                  echo $firstname, $lastname; 
                }
                
                ?> 
              
             
              <button type="submit" name='submit' class="button is-black">Save changes</button>
            </form>


          </div>
        </section>

<!------------- Marie modal recipe end ------------->


      </div>
    </div>

  </main>


  <script>

let modal = document.getElementById("myModal");
    let btn = document.getElementById("addRecipe");
    let span = document.getElementsByClassName("delete")[0];

    btn.onclick = function () {
      modal.style.display = "block";
    }

    span.onclick = function () {
      modal.style.display = "none";
    }

    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

  </script>
<!------------------------------------------FOOTER------------------------------------------------------>
    <?php 
    include("footer.php");
    ?>


</body>

</html>

