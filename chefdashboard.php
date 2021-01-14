<?php


try
{
	$dbbocuse = new PDO('mysql:host=localhost;dbname=xnnujqmj_mybocuse;charset=utf8',$phpmalog, $phpmapasswd);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dashboard.css" rel="stylesheet">
    <title> Dashboard </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  </head>
  <body>

<!---------------------------------------MENU----DASHBOARD---------------------------------------------->

<div class = studentdashboard>

<div class="tile is-ancestor">
    <div class="tile is-parent is-2" id="paddingmenu" >
      <article class="tile is-child box has-background-black " id="menubar">
        <p class="title" id="titlemenu"> my.</p>

    <!------------------------------LINK-TO-HOMEPAGE-------------------------------------->

        <figure class="homebutton" id="hombebutton">
        <a href="chefdashboard.php"><img src="./asset/icons/home.png"></a>
      </figure>
       
     <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->

      <figure class="calendarbutton" id="calendarbutton">
      <a href='recipe_book_chefs.php'><img src="./asset/icons/calendar.png"></a>
        
     </figure>

     
     <!------------------------------LINK-TO-LOGOUT------------------------------------->

    <figure class="logoutbutton">

      <a href='logout.php'><img src="./asset/icons/logout.png" id="logoutbutton"></a>
      </figure>
      </article>
    </div> 

  

<!---------------------------------------LEFT-SIDE-OF DASHBOARD---------------------------------------------->


        <div class="tile is-parent is-5 is-vertical" id="leftsidedashboard">
          <div class="tile">
            <!-- Add content or other tiles -->
        
            <article class="tile is-child box" id="namedashboard">
<?php
            $chef_req = $dbbocuse->prepare('SELECT email, firstname, lastname FROM users WHERE email = ?');
            $chef_req->execute(array($_SESSION['email']));
  
  while ($donnees_chef = $chef_req->fetch())
  {
      ?>
              <p class="hichef">Hi Chef
<?php echo $donnees_chef['lastname']; 
}$chef_req->closeCursor();
?>

!</p>
              <p class="welcometext">It's good to see you again.</p>
              <figure class="profilepicturechef">
                  <img src="./asset/images/chefdashboard.png">
            </figure>
            </article>
          </div>

          <div class="studentsinfo">
            <nav class="panel">
              <p class="panel-heading" id="titleattendance">
                Students' attendance 
              </p>
              
              <p class="panel-tabs">
                <a class="is-active">Chopper 1.25 </a>
              </p>
              
              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-book" aria-hidden="true"></i>
                </span>
                Dwayne Johnson
                <p class= "numberofabsences"> 0 absences</p>
                  </a>


              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-book" aria-hidden="true"></i>
                </span>
                Jason Statham 
                <p class= "numberofabsences"> 0 absences</p>
                
              </a>

              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-book" aria-hidden="true"></i>
                </span>
                Vin Diesel
                <p class= "numberofabsences"> 0 absences</p>
              </a>

              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-book" aria-hidden="true"></i>
                </span>
                Paul Walker
                <p class= "numberofabsences"> 0 absences</p>
              </a>

              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-code-branch" aria-hidden="true"></i>
                </span>
                Michelle Rodriguez
                <p class= "numberofabsences"> 0 absences</p>
              </a>

              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-code-branch" aria-hidden="true"></i>
                </span>
                Jordana Brewster
                <p class= "numberofabsences"> 0 absences</p>
              </a>

              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-code-branch" aria-hidden="true"></i>
                </span>
                Luke Evans
                <p class= "numberofabsences"> 0 absences</p>
              </a>

              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-code-branch" aria-hidden="true"></i>
                </span>
                Charlize Theron
                <p class= "numberofabsences"> 0 absences</p>
              </a>

              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-code-branch" aria-hidden="true"></i>
                </span>
                Vanessa Kirby
                <p class= "numberofabsences"> 0 absences</p>
              </a>

              <a class="panel-block">
                <span class="panel-icon">
                  <i class="fas fa-code-branch" aria-hidden="true"></i>
                </span>
                John Cena
                <p class= "numberofabsences"> 0 absences</p>

              </a>
              
            </nav>



          </div>

        </div>
          



          


  
<!---------------------------------------RIGHT-SIDE-OF DASHBOARD---------------------------------------------->



          <div class="tile is-parent">
          <div class="tile is-child" >
            <article class="tile is-child box is-8 is-vertical" id=quotedashboard>
              <p class="quotetitle">QUOTE </p>
              <p class="quote">"A recipe has no soul. You as the cook must bring soul to the recipe."</p>
              <div class="author">
                <p> - Thomas Keller </p>
              </div>
            </article>
            


            <div class="tile is-child" id=chefdashboardtherecette>
                <article class="tile is-child box" id=therecetteradius>
                  <p class="therecettetitle">The recette</p>
                  <p class="weekrecette">week of 11/01</p>

                  <ul>
                  <?php
            $crecipe_req = $dbbocuse->prepare('SELECT * FROM recipes ORDER BY date DESC LIMIT 5');
            $crecipe_req->execute(array());
  
  while ($donnees_crecipe = $crecipe_req->fetch())
  {
      ?>
              <li>  
                        <div class="recetteoftheday"> 
                            <p class= "dayoftheweek"><?php echo $donnees_crecipe['date'];?></p>
                            <p class= "recipe"><?php echo $donnees_crecipe['recipe_name'];?></p>
                        </div>
                        <img src="./asset/images/Yellow.png" class="yellowsticker">  
                    
                    </li>
<?php 
}$crecipe_req->closeCursor();
?>
                   <!------------------------------LINK-TO-RECIPE-AGENDA-------------------------------------> 
                    <a href='recipe_book_chefs.php'> <button class="button is-black" id=agendabutton>the recettes' agenda</button> 
                    </a>
                    
                 
                 
                   
                 <!------------------------------LINK-TO-RECIPE-AGENDA------------------------------------->



                    
                  
                   </ul>
                </article>
              </div>
           

            </div>
            
        </div>
    </div>


            
          </div>
        </div>

      

            
          </div>
          </div>

<!-----------------------------------------------FOOTER-------------------------------------------------------------->


<?php 
    include("footer.php");
    ?>


  </body>
</html>
