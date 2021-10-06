<?php require ( ROUTE_DIR . 'view/inc/header.html.php' )?>


<!--  -->

  <div class="sidebar">

    <div class="logo">   
      <li>
          <a href="<?= WEB_ROUTE . '?controllers=responsable&view=user.page' ?>" class="name">
          <span class="links_name"><strong><p><?=$_SESSION['userConnect'][0]['prenom'].' '.$_SESSION['userConnect'][0]['nom']?></p></strong></span>
          </a>
      </li> 
      <li>
          <a href="<?= WEB_ROUTE . '?controllers=responsable&view=user.page' ?>" class="img">
          
            <span class="links_name "><img class="rounded-circle  float-right" src="<?=$_SESSION['userConnect'][0]['avatar']?>"></span>
          </a>
          <span class="tooltip"><strong><p><?=$_SESSION['userConnect'][0]['prenom'].' '.$_SESSION['userConnect'][0]['nom']?></p></strong></span>
      </li>
     <li>
     <li>
          <a href="#">
            <i class='bx bx-menu' id="btn" ></i>
          </a>
          <span class="tooltip">Menus</strong></span>
      </li>
     <li>
    </div>
    <ul class="nav-list mt-2">
    <?php if (est_responsable()):?>
      <li>
        <a href="<?= WEB_ROUTE . '?controllers=responsable&view=tableau.bord' ?>">
        <i class='bx bx-grid-alt'></i>
          <span class="links_name">Tableau de bord</span>
        </a>
        <span class="tooltip">Tableau de bord</span>
     </li>
     <li>
        <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.cours.nonplanifie' ?>">
          <i class='bx bx-list-ul' ></i>
          <span class="links_name">Liste des cours</span>
        </a>
        <span class="tooltip">Liste des cours</span>
     </li>
      <li>
          <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.professeur' ?>">
          <i class='bx bx-list-ul' ></i>
            <span class="links_name">Liste des professeur</span>
          </a>
          <span class="tooltip">Liste des professeur</span>
     </li>
     <li>
          <a href="<?= WEB_ROUTE . '?controllers=responsable&view=liste.classe' ?>">
          <i class='bx bx-list-ul' ></i>         
          <span class="links_name">Liste des classes</span>
          </a>
          <span class="tooltip">Liste des classes</span>
     </li>

     <li>
          <a href="<?= WEB_ROUTE . '?controllers=responsable&view=definir.annee' ?>">
          <i class='bx bx-edit-alt' ></i>         
          <span class="links_name">Définir l'année scolaire</span>
          </a>
          <span class="tooltip">Définir une nouvelle année scolaire</span>
     </li>
     <?php endif ?>

     <?php if (est_attache()):?>

     <li>
          <a href="<?= WEB_ROUTE.'?controllers=attache&view=liste.etudiant' ?>">
          <i class='bx bx-list-ul' ></i>
         <span class="links_name">Liste des étudiants</span>
          </a>
          <span class="tooltip">Liste des étudiants</span>
     </li>

     <li>
        <a href="<?= WEB_ROUTE . '?controllers=attache&view=liste.cours' ?>">
          <i class='bx bx-list-ul' ></i>
          <span class="links_name">Liste des cours</span>
        </a>
        <span class="tooltip">Liste des cours</span>
     </li>

     <li>
        <a href="<?= WEB_ROUTE . '?controllers=attache&view=liste.classe' ?>">
          <i class='bx bx-list-ul' ></i>
          <span class="links_name">Liste des classes</span>
        </a>
        <span class="tooltip">Liste des classes</span>
     </li>
     <li>
        <a href="<?= WEB_ROUTE . '?controllers=attache&view=liste.justification' ?>">
          <i class='bx bx-list-ul' ></i>
          <span class="links_name">Liste des justifications</span>
        </a>
        <span class="tooltip">Liste des justifications</span>
     </li>

     <?php endif ?>
     <?php if (est_etudiant()):?>

<li>
     <a href="<?= WEB_ROUTE.'?controllers=etudiant&view=liste.etudiant.cours' ?>">
     <i class='bx bx-list-ul' ></i>
    <span class="links_name">Voir mes cours</span>
     </a>
     <span class="tooltip">Voir mes cours</span>
</li>

<li>
   <a href="<?=WEB_ROUTE.'?controllers=attache&view=liste.absence.etudiant&id_user='.$_SESSION['userConnect'][0]['id_user']?>">
     <i class='bx bx-user-x ' ></i>
     <span class="links_name">Voir mes absences</span>
   </a>
   <span class="tooltip">Voir mes absences</span>
</li>

<li>
   <a href="<?=WEB_ROUTE.'?controllers=etudiant&view=liste.justification&id_user='.$_SESSION['userConnect'][0]['id_user']?>">
     <i class='bx bx-list-ul' ></i>
     <span class="links_name">Mes justifications</span>
     </a>
   <span class="tooltip">Mes justifications</span>
</li>

<?php endif ?>
<?php if (est_professeur()):?>

<li>
     <a href="<?= WEB_ROUTE.'?controllers=professeur&view=liste.cours.professeur' ?>">
     <i class='bx bx-list-ul' ></i>
    <span class="links_name">Voir mes cours</span>
     </a>
     <span class="tooltip">Voir mes cours</span>
</li>

<?php endif ?>

     <li class="mt-3">
       <a href="<?=WEB_ROUTE.'?controllers=security&view=deconnexion'?>">
       <i class='bx bx-log-out' id="log_out" ></i>
         <span class="links_name deconnect">Se deconnecter</span>
       </a>
     </li>


    </ul>
  </div>

  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
<?php require ( ROUTE_DIR . 'view/inc/footer.html.php' )?>