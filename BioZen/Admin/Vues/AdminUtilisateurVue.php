<?php


class AdminUtilisateurVue
{

    //tableau d'utilisateur

    public function eepVue($eep)
    {
       echo'
       <!-- Page Wrapper -->
    <div id="wrapper">
       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
     <img style="width : 70px" src="image\image_sans_fond_blanc\logo_1_sans_bg_sans_bz.png"/>
      </div>
         <div class="sidebar-brand-text mx-3">Admin</div>
     </a>
     
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <!-- Divider -->
     <hr class="sidebar-divider">
     
     <!-- Heading -->
     <div class="sidebar-heading">
         Interface de Gestion
     </div>
     
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Utilisateurs</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="index.php?page=inscrieep">Inscription EEP</a>
                 <a class="collapse-item" href="index.php?page=voirST">Inscription Salarie</a>
                 <a class="collapse-item" href="index.php?page=lesUtilisateur">Gestion Utilisateur</a>
             </div>
         </div>
     </li>
     
     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Articles</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="index.php?page=gestion-articles">Gestion Articles</a>
                 <a class="collapse-item" href="index.php?page=gestion-coffres">Gestion Coffres</a>
     
             </div>
         </div>
     </li>
     
      
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Gestion Pages</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="index.php?page=gererActu">Actualités</a>
                 <a class="collapse-item" href="index.php?page=pub">Bandeau Promotion</a>
     
             </div>
         </div>
     </li>
     
     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="index.php?page=allbdc">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Bond de Commande</span></a>
     </li>
     
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">
     
     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
     
     </ul>
     <!-- End of Sidebar -->
     
  
       <div class="column w-75">
       
       <!-- DataTales Example -->
          <div class="card shadow mb-4  ">
          <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Eep</h6>
        </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered tableUtil" id="dataTable" width="100%" cellspacing="0">
                <div class="input-group">
                            <input type="text"  class="form-control bg-light border-0 small rechercheNom" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="btn">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>

                  <thead>
                    <tr>
                      <th>Nom Eep</th>
                      <th>Adresse Eep</th>
                      <th>cp </th>
                      <th>ville</th>
                      <th>region</th>
                      <th> date de creation</th>
                      <th>email</th>
                      <div class="voirPlus">
                      
                      <th>tel</th>
                      <th>fax</th>
                      <th>activite de l\'eep</th>
                      <th>site</th>
                      <th>responsable</th>
                      </div>
                      <th>supprimer/modifier</th>
                    </tr>
                  </thead>
                  
            <tbody>'
                ;
        foreach ($eep as $e)
            {
                
               echo "<tr>
              
               <td>".$e['nom_eep']."</td>
               <td>".$e['adresse_eep']."</td>
               <td>".$e['cp_eep']."</td>
               <td>".$e['ville_eep']."</td>
               <td>".$e['region_eep']."</td>
               <td>".$e['date_creation_eep']."</td>
               <td>".$e['email_eep']."</td>
               <td>".$e['tel_eep']."</td>
               <td>".$e['fax_eep']."</td>
               <td>".$e['activite_eep']."</td>
               <td>".$e['site_eep']."</td>
               <td>".$e['nom_resp_eep']. " ".$e['prenom_resp_eep']."</td>
               <td><a href='index.php?page=suppEep&id=".$e['id_eep']."'><i class='fa fa-trash' aria-hidden='true'></i></a>/<a id='modif' href='index.php?page=modifEep&id=".$e['id_eep']."'>  modifier</a></td>
                
               </tr>";
            }
            echo'</tbody>
            </table>
            </div>
          </div>
          </div>
          
         

     
 

';
    }

    //tableau salarie
    public function salarieVue($salarie)
    {

        echo' 
        
     
        
        <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Salarié</h6>
      </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered tableUtil" id="dataTable" width="100%" cellspacing="0">
              <div class="input-group">
                            <input type="text"  class="form-control bg-light border-0 small rechercheNom" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="btn">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>

                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>adresse</th>
                    <th>cp </th>
                    <th>ville</th> 
                    <th>email</th>
                    <th>poste</th>
                    <th> date de fin de contrat</th>
                    <th>entreprise</th>
                    <th>supprimer/modifier</th>
                  </tr>
                </thead>
                
          <tbody>'
              ;
      foreach ($salarie as $s)
          {
              
             echo 
             "<tr>
                <td>".$s['nom_salarie']."</td>
                <td>".$s['prenom_salarie']."</td>
                <td>".$s['adresse_salarie']."</td>
                <td>".$s['cp_salarie']."</td>
                <td>".$s['ville_salarie']."</td>
                <td>".$s['email_salarie']."</td>
                <td>".$s['poste_salarie']."</td>
                <td>".$s['date_fin_contrat']."</td>
                <td>".$s['nom_eep']. "</td>
                <td><a href='index.php?page=suppSal&id=".$s['id_salarie']."'><i class='fa fa-trash' aria-hidden='true'></i></a>/<a id='modif' href='index.php?page=modifSal&id=".$s['id_salarie']."'>   modifier</a></td>
             </tr>";
          }
          echo'</tbody>
          </table>
        </div>
      </div>
      </div>
      </div>
 
    
    ';
        

//formulaire de modification des information du salarie
    }

    public function modifSalarie($utilisateur)
    {
        //formulaire de modif
        echo
        "
        <!-- Page Wrapper -->
      <div id='wrapper'>
         <!-- Sidebar -->
         <ul class='navbar-nav bg-gradient-primary sidebar sidebar-dark accordion' id='accordionSidebar'>
       
       <!-- Sidebar - Brand -->
       <a class='sidebar-brand d-flex align-items-center justify-content-center' href='index.html'>
       <div class='sidebar-brand-icon rotate-n-15'>
       <img style='width : 70px' src='image\image_sans_fond_blanc\logo_1_sans_bg_sans_bz.png'/>
   </div>
           <div class='sidebar-brand-text mx-3'>Admin</div>
       </a>
       
       <!-- Divider -->
       <hr class='sidebar-divider my-0'>
       <!-- Divider -->
       <hr class='sidebar-divider'>
       
       <!-- Heading -->
       <div class='sidebar-heading'>
           Interface de Gestion
       </div>
       
       <!-- Nav Item - Pages Collapse Menu -->
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
               <i class='fas fa-fw fa-cog'></i>
               <span>Utilisateurs</span>
           </a>
           <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=inscrieep'>Inscription EEP</a>
                   <a class='collapse-item' href='index.php?page=voirST'>Inscription Salarie</a>
                   <a class='collapse-item' href='index.php?page=lesUtilisateur'>Gestion Utilisateur</a>
               </div>
           </div>
       </li>
       
       <!-- Nav Item - Utilities Collapse Menu -->
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
               <i class='fas fa-fw fa-wrench'></i>
               <span>Articles</span>
           </a>
           <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=gestion-articles'>Gestion Articles</a>
                   <a class='collapse-item' href='index.php?page=gestion-coffres'>Gestion Coffres</a>
       
               </div>
           </div>
       </li>
       
        
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsePages' aria-expanded='true' aria-controls='collapsePages'>
               <i class='fas fa-fw fa-folder'></i>
               <span>Gestion Pages</span>
           </a>
           <div id='collapsePages' class='collapse' aria-labelledby='headingPages' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=gererActu'>Actualités</a>
                   <a class='collapse-item' href='index.php?page=pub'>Bandeau Promotion</a>
       
               </div>
           </div>
       </li>
       
       <!-- Nav Item - Charts -->
       <li class='nav-item'>
           <a class='nav-link' href='index.php?page=allbdc'>
               <i class='fas fa-fw fa-chart-area'></i>
               <span>Bond de Commande</span></a>
       </li>
       
       <!-- Divider -->
       <hr class='sidebar-divider d-none d-md-block'>
       
       <!-- Sidebar Toggler (Sidebar) -->
       <div class='text-center d-none d-md-inline'>
           <button class='rounded-circle border-0' id='sidebarToggle'></button>
       </div>
       
       </ul>
       <!-- End of Sidebar -->
        
      <div class='column w-100   formAdmin'> <h3 class='titreInscri' >Modifier les informations de ".$utilisateur->nom_salarie." </h3>
            

            <form class='formModif' action='index.php?page=modifSal&id=".$utilisateur->id_salarie."' method='post'>


            <div class='form-row '>
              <div class='form-group col-md-3'>
              <label for='nom'>Nom:</label>
                <input type='text' class='form-control' value='".$utilisateur->nom_salarie."' name='nom' id='nom' required >
              </div>
              <div class='form-group col-md-3'>
              <label for='prenom'>Prénom:</label>
                <input type='text' class='form-control' value='".$utilisateur->prenom_salarie."' name='prenom'  id='prenom' required >
              </div>
            </div>
            <div class='form-row'>
              <div class='form-group col-md-3'>
              <label for='poste'>Poste d'entreprise:</label>
                <input type='text' class='form-control' value='".$utilisateur->poste_salarie."' name='poste' id='poste'  >
              </div>
              <div class='form-group col-md-3'>
                <label for='dfc'>Date fin de contrat</label>
                <input type='date' class='form-control' value='".$utilisateur->date_fin_contrat."' name='dfc' id='dfc'  min='01-03-2020' id='dfc' placeholder=' exemple: 24/03/2020'>
              </div>
            </div>
            <div class='form-group col-md-6'>
            <label for='adresse'>Adresse complète:</label>
              <input type='text' class='form-control' name='adresse' value='".$utilisateur->adresse_salarie."' id='adresse'  placeholder='1234 Main St'>
            </div>
            <div class='form-row'>
            <div class='form-group col-md-2'>
            <label for='cp'>Code Postal:</label>
                <input type='text' class='form-control' name='cp' value='".$utilisateur->cp_salarie."' id='cp'>
              </div>
            
              <div class='form-group col-md-4'>
              <label for='ville'>Ville:</label>
                <input type='text' class='form-control' name='ville' value='".$utilisateur->ville_salarie."' id='ville' required >
              </div>

              
            </div>
           <div class='form-group col-md-6'>
           <label for='mail'>Adresse mail:</label>
              <input type='mail' class='form-control ' name='mail' value='".$utilisateur->email_salarie."' id='mail' required laceholder='exemple@exemple.com'>
                </div>
                <button class='validerModifAdm btn-success' type='submit'>valider</button>
          </form>
          </div></div>
        ";
        
    }

    //formulaire de modification des information des eep

    public function modifEep($utilisateur)
    {
        //formulaire de modif
        echo
        "
        <!-- Page Wrapper -->
      <div id='wrapper'>
         <!-- Sidebar -->
         <ul class='navbar-nav bg-gradient-primary sidebar sidebar-dark accordion' id='accordionSidebar'>
       
       <!-- Sidebar - Brand -->
       <a class='sidebar-brand d-flex align-items-center justify-content-center' href='index.html'>
       <div class='sidebar-brand-icon rotate-n-15'>
       <img style='width : 70px' src='image\image_sans_fond_blanc\logo_1_sans_bg_sans_bz.png'/>
   </div>
           <div class='sidebar-brand-text mx-3'>Admin</div>
       </a>
       
       <!-- Divider -->
       <hr class='sidebar-divider my-0'>
       <!-- Divider -->
       <hr class='sidebar-divider'>
       
       <!-- Heading -->
       <div class='sidebar-heading'>
           Interface de Gestion
       </div>
       
       <!-- Nav Item - Pages Collapse Menu -->
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
               <i class='fas fa-fw fa-cog'></i>
               <span>Utilisateurs</span>
           </a>
           <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=inscrieep'>Inscription EEP</a>
                   <a class='collapse-item' href='index.php?page=voirST'>Inscription Salarie</a>
                   <a class='collapse-item' href='index.php?page=lesUtilisateur'>Gestion Utilisateur</a>
               </div>
           </div>
       </li>
       
       <!-- Nav Item - Utilities Collapse Menu -->
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
               <i class='fas fa-fw fa-wrench'></i>
               <span>Articles</span>
           </a>
           <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=gestion-articles'>Gestion Articles</a>
                   <a class='collapse-item' href='index.php?page=gestion-coffres'>Gestion Coffres</a>
       
               </div>
           </div>
       </li>
       
        
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsePages' aria-expanded='true' aria-controls='collapsePages'>
               <i class='fas fa-fw fa-folder'></i>
               <span>Gestion Pages</span>
           </a>
           <div id='collapsePages' class='collapse' aria-labelledby='headingPages' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=gererActu'>Actualités</a>
                   <a class='collapse-item' href='index.php?page=pub'>Bandeau Promotion</a>
       
               </div>
           </div>
       </li>
       
       <!-- Nav Item - Charts -->
       <li class='nav-item'>
           <a class='nav-link' href='index.php?page=allbdc'>
               <i class='fas fa-fw fa-chart-area'></i>
               <span>Bond de Commande</span></a>
       </li>
       
       <!-- Divider -->
       <hr class='sidebar-divider d-none d-md-block'>
       
       <!-- Sidebar Toggler (Sidebar) -->
       <div class='text-center d-none d-md-inline'>
           <button class='rounded-circle border-0' id='sidebarToggle'></button>
       </div>
       
       </ul>
       <!-- End of Sidebar -->



      <div class='column w-100  '><h3 class='titreInscri' >Modifiez les informations de ".$utilisateur->nom_eep." </h3>
            

            <form class='formModif' action='index.php?page=modifEep&id=".$utilisateur->id_eep."' method='post'>

            <div class='form-group col-md-6'>
            <label for='nomEep'>Nom d'entreprise :</label> 
                    <input type='text' class='form-control' name='nomEep' value='".$utilisateur->nom_eep."' id='nomEep' required >
            </div>

            <div class='form-row '>
              <div class='form-group col-md-3'>
              <label for='activite'>Secteur d'activité :</label>
                <input class='form-control' type='text' value='".$utilisateur->activite_eep."' name='activite' id='activite' >
              
              </div>
              <div class='form-group col-md-3'>
              <label for='dceep'>Date de creation de l'eep :</label>
                <input class='form-control' type='date' min='01-01-2005'  value='".$utilisateur->date_creation_eep."' name='dceep' id='dceep' placeholder=' exemple: 24/03/2020' >
              </div>
            </div>

            <div class='form-row'>
              <div class='form-group col-md-3'>
              <label for='region'>Région :</label>
                <input type='text' class='form-control' value='".$utilisateur->region_eep."' name='region' id='region' >
              </div>
              <div class='form-group col-md-3'>
              <label for='adresse'>Adresse complète :</label>
                <input type='text' class='form-control' value='".$utilisateur->adresse_eep."'  name='adresse' id='adresse'>
              </div>
            </div>

            <div class='form-group col-md-6'>
            <label for='cplt_adresse'>Complément d'adresse :</label>
              <input type='text' class='form-control' value='".$utilisateur->cplt_adresse."' name='cplt_adresse' id='cplt_adresse' >
            </div>
            <div class='form-row'>
            <div class='form-group col-md-2'>
            <label for='cp'>Code Postal :</label>
                <input type='text' class='form-control' name='cp' value='".$utilisateur->cp_eep."' id='cp' required>
              </div>
            
              <div class='form-group col-md-4'>
              <label for='ville'>Ville :</label>
                <input type='text' class='form-control'  value='".$utilisateur->ville_eep."' name='ville' id='ville' required  >
              </div>

              
            </div>
            <div class='form-row'>
             <div class='form-group col-md-3'>
                <label for='tel'>Tel :</label>
                <input type='text' class='form-control' value='".$utilisateur->tel_eep."' name='tel' id='tel' required >
              </div>
            
              <div class='form-group col-md-3'>
              <label for='fax'>Fax :</label>
                <input type='text' class='form-control'  value='".$utilisateur->fax_eep."' name='fax' id='fax'  >
              </div>

              
            </div>


            <div class='form-group col-md-6'>
            <label for='site'>Site web :</label>
              <input type='text' class='form-control' value='".$utilisateur->site_eep."' name='site' id='site'   >
            </div>

            <div class='form-row'>
                <div class='form-group col-md-3'>
                <label for='nom'>Nom du responsable :</label>
                    <input type='text' class='form-control' value='".$utilisateur->nom_resp_eep."' name='nom' id='nom' required>
                </div>
                
                <div class='form-group col-md-3'>
                <label for='prenom'>Prénom du responsable :</label>
                    <input type='text' class='form-control' name='prenom' value='".$utilisateur->prenom_resp_eep."'  id='prenom' required >
                </div>

                
            </div>

            <div class='form-row'>
            <div class='form-group col-md-2'>
                <label for='poste'>Poste occuppé :</label>
                 <input type='text' class='form-control' value='".$utilisateur->poste_resp."' name='poste' id='poste' required>
            </div>
           <div class='form-group col-md-4'>
           <label for='mail'>Adresse mail de l'eep :</label>
              <input type='mail' class='form-control ' name='mail' value='".$utilisateur->email_eep."' id='mail' required laceholder='exemple@exemple.com'>
            </div>
            </div>
            
                <button class='validerModifAdm btn-succes' type='submit'>Valider</button>
          </form>

</div></div>
        ";
    }

    //tableau salarie temporaire
    public function salarieTempVue($salarie)
    {

        echo'
        <!-- Page Wrapper -->
        <div id="wrapper">
           <!-- Sidebar -->
           <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
         
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
         <img style="width : 70px" src="image\image_sans_fond_blanc\logo_1_sans_bg_sans_bz.png"/>
     </div>
             <div class="sidebar-brand-text mx-3">Admin</div>
         </a>
         
         <!-- Divider -->
         <hr class="sidebar-divider my-0">
         <!-- Divider -->
         <hr class="sidebar-divider">
         
         <!-- Heading -->
         <div class="sidebar-heading">
             Interface de Gestion
         </div>
         
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-cog"></i>
                 <span>Utilisateurs</span>
             </a>
             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="index.php?page=inscrieep">Inscription EEP</a>
                     <a class="collapse-item" href="index.php?page=voirST">Inscription Salarie</a>
                     <a class="collapse-item" href="index.php?page=lesUtilisateur">Gestion Utilisateur</a>
                 </div>
             </div>
         </li>
         
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                 <i class="fas fa-fw fa-wrench"></i>
                 <span>Articles</span>
             </a>
             <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="index.php?page=gestion-articles">Gestion Articles</a>
                     <a class="collapse-item" href="index.php?page=gestion-coffres">Gestion Coffres</a>
         
                 </div>
             </div>
         </li>
         
          
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                 <i class="fas fa-fw fa-folder"></i>
                 <span>Gestion Pages</span>
             </a>
             <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <a class="collapse-item" href="index.php?page=gererActu">Actualités</a>
                     <a class="collapse-item" href="index.php?page=pub">Bandeau Promotion</a>
         
                 </div>
             </div>
         </li>
         
         <!-- Nav Item - Charts -->
         <li class="nav-item">
             <a class="nav-link" href="index.php?page=allbdc">
                 <i class="fas fa-fw fa-chart-area"></i>
                 <span>Bond de Commande</span></a>
         </li>
         
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
         
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
         
         </ul>
         <!-- End of Sidebar -->
     
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Salarié</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered tableUtil" id="dataTable" width="100%" cellspacing="0">
                <div class="input-group">
                            <input type="text"  class="form-control bg-light border-0 small rechercheNom" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="btn">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>

                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>prenom</th>
                        <th>adresse</th>
                        <th>cp </th>
                        <th>ville</th> 
                        <th>email</th>
                        <th>poste</th>
                        <th> date de fin de contrat</th>
                        <th>entreprise</th>
                        <th>supprimer/modifier</th>
                    </tr>
                    </thead>
                    
                    <tbody>'
                ;
        foreach ($salarie as $s)
            {
                
                echo 
                "<tr>
                    <td>".$s['nom_salarie']."</td>
                    <td>".$s['prenom_salarie']."</td>
                    <td>".$s['adresse_salarie']."</td>
                    <td>".$s['cp_salarie']."</td>
                    <td>".$s['ville_salarie']."</td>
                    <td>".$s['email_salarie']."</td>
                    <td>".$s['poste_salarie']."</td>
                    <td>".$s['date_fin_contrat']."</td>
                    <td>".$s['nom_eep']. "</td>
                    <td><a href='index.php?page=suppST&id=".$s['id_salarie']."'><i class='fa fa-trash' aria-hidden='true'></i></a>/<a id='modif' href='index.php?page=validST&id=".$s['id_salarie']."'> valider</a></td>
                </tr>";
            }
            echo'</tbody>
            </table>
        </div>
    </div>
    </div>
    </div>';





    }


     //tableau admin
public function AdminVue($admin)
{

    echo' <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
  <div class="addT" >  <h6 class="m-0 font-weight-bold text-primary">Admin</h6> <a href="index.php?page=addAdmin" class="addAdmin">Ajouter un admin </a>  </div>
  </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered tableUtil" id="dataTable" width="100%" cellspacing="0">
          <div class="input-group">
                        <input type="text"  class="form-control bg-light border-0 small rechercheNom" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="btn">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
            <thead>
              <tr>
                <th>nom</th>
                <th>email</th>
                <th>supprimer</th>
              </tr>
            </thead>
            
      <tbody>'
          ;
  foreach ($admin as $a)
      {
          
         echo 
         "<tr>
            <td>".$a['nom_admin']."</td>
            <td>".$a['mail_admin']."</td>
            <td><a href='index.php?page=suppAdmin&id=".$a['id_admin']."'><i class='fa fa-trash' aria-hidden='true'></i></a>
         </tr>";
      }
      echo'</tbody>
      </table>
    </div>
  </div>
</div>

</div></div></div>';

    }

    //formulaire d'inscription des eep
    public function eep()
    {
        echo
        "
        <!-- Page Wrapper -->
      <div id='wrapper'>
         <!-- Sidebar -->
         <ul class='navbar-nav bg-gradient-primary sidebar sidebar-dark accordion' id='accordionSidebar'>
       
       <!-- Sidebar - Brand -->
       <a class='sidebar-brand d-flex align-items-center justify-content-center' href='index.html'>
       <div class='sidebar-brand-icon rotate-n-15'>
       <img style='width : 70px' src='image\image_sans_fond_blanc\logo_1_sans_bg_sans_bz.png'/>
   </div>
           <div class='sidebar-brand-text mx-3'>Admin</div>
       </a>
       
       <!-- Divider -->
       <hr class='sidebar-divider my-0'>
       <!-- Divider -->
       <hr class='sidebar-divider'>
       
       <!-- Heading -->
       <div class='sidebar-heading'>
           Interface de Gestion
       </div>
       
       <!-- Nav Item - Pages Collapse Menu -->
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
               <i class='fas fa-fw fa-cog'></i>
               <span>Utilisateurs</span>
           </a>
           <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=inscrieep'>Inscription EEP</a>
                   <a class='collapse-item' href='index.php?page=voirST'>Inscription Salarie</a>
                   <a class='collapse-item' href='index.php?page=lesUtilisateur'>Gestion Utilisateur</a>
               </div>
           </div>
       </li>
       
       <!-- Nav Item - Utilities Collapse Menu -->
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
               <i class='fas fa-fw fa-wrench'></i>
               <span>Articles</span>
           </a>
           <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=gestion-articles'>Gestion Articles</a>
                   <a class='collapse-item' href='index.php?page=gestion-coffres'>Gestion Coffres</a>
       
               </div>
           </div>
       </li>
       
        
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsePages' aria-expanded='true' aria-controls='collapsePages'>
               <i class='fas fa-fw fa-folder'></i>
               <span>Gestion Pages</span>
           </a>
           <div id='collapsePages' class='collapse' aria-labelledby='headingPages' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=gererActu'>Actualités</a>
                   <a class='collapse-item' href='index.php?page=pub'>Bandeau Promotion</a>
       
               </div>
           </div>
       </li>
       
       <!-- Nav Item - Charts -->
       <li class='nav-item'>
           <a class='nav-link' href='index.php?page=allbdc'>
               <i class='fas fa-fw fa-chart-area'></i>
               <span>Bond de Commande</span></a>
       </li>
       
       <!-- Divider -->
       <hr class='sidebar-divider d-none d-md-block'>
       
       <!-- Sidebar Toggler (Sidebar) -->
       <div class='text-center d-none d-md-inline'>
           <button class='rounded-circle border-0' id='sidebarToggle'></button>
       </div>
       
       </ul>
       <!-- End of Sidebar -->
      

       
       
        

           <div class='column w-100 formAdmin'> 
           <h3 class='titreInscri'>Inscrivez une eep</h3>
            <form class='formModif' action='index.php?page=inscrieep' method='post'>
               <div class='form-group col-md-6'>
            <label for='nomEep'>Nom d'entreprise :</label> 
               <input type='text' class='form-control' name='nomEep' id='nomEep' required >
       </div>

       <div class='form-row '>
         <div class='form-group col-md-3'>
         <label for='activite'>Secteur d'activité :</label>
           <input class='form-control' type='text'  name='activite' id='activite' >
         
         </div>
         <div class='form-group col-md-3'>
         <label for='dceep'>Date de creation de l'eep :</label>
           <input class='form-control' type='date' min='01-01-2005' name='dceep' id='dceep' placeholder=' exemple: 24/03/2020' >
         </div>
       </div>

       <div class='form-row'>
         <div class='form-group col-md-3'>
         <label for='region'>Région :</label>
           <input type='text' class='form-control' name='region' id='region' >
         </div>
         <div class='form-group col-md-3'>
         <label for='adresse'>Adresse complète :</label>
           <input type='text' class='form-control' name='adresse' id='adresse'>
         </div>
       </div>

       <div class='form-group col-md-6'>
       <label for='cplt_adresse'>Complément d'adresse :</label>
         <input type='text' class='form-control' name='cplt_adresse' id='cplt_adresse' >
       </div>
       <div class='form-row'>
       <div class='form-group col-md-2'>
       <label for='cp'>Code Postal :</label>
           <input type='text' class='form-control' name='cp' id='cp' required>
         </div>
       
         <div class='form-group col-md-4'>
         <label for='ville'>Ville :</label>
           <input type='text' class='form-control'  name='ville' id='ville' required  >
         </div>

         
       </div>
       <div class='form-row'>
        <div class='form-group col-md-3'>
           <label for='tel'>Tel :</label>
           <input type='text' class='form-control'  name='tel' id='tel' required >
         </div>
       
         <div class='form-group col-md-3'>
         <label for='fax'>Fax :</label>
           <input type='text' class='form-control'  name='fax' id='fax'  >
         </div>

         
       </div>


       <div class='form-group col-md-6'>
       <label for='site'>Site web :</label>
         <input type='text' class='form-control' name='site' id='site'   >
       </div>

       <div class='form-row'>
           <div class='form-group col-md-3'>
           <label for='nom'>Nom du responsable :</label>
               <input type='text' class='form-control' name='nom' id='nom' required>
           </div>
           
           <div class='form-group col-md-3'>
           <label for='prenom'>Prénom du responsable :</label>
               <input type='text' class='form-control' name='prenom' id='prenom' required >
           </div>       
       </div>

       <div class='form-group col-md-5'>
            <label for='poste'>Poste occuppé :</label>
            <input type='text' class='form-control'  name='poste' id='poste' required>
           </div>  

       <div class='form-row'>
       
      <div class='form-group col-md-3'>
      <label for='mail'>Adresse mail :</label>
         <input type='mail' class='form-control ' name='mail' id='mail' required laceholder='exemple@exemple.com'>
       </div>

       <div class='form-group col-md-3'>
           <label for='cMail'>Confirmer email :</label>
            <input type='mail' class='form-control'  name='cMail' id='cMail' required>
       </div>
       </div>

       <div class='form-row'>

       <div class='form-group col-md-3'>
        <label for='mdp'>Mot de passe :</label>
         <input type='password' class='form-control ' name='mdp' id='mdp' >
       </div>

       <div class='form-group col-md-3'>
           <label for='cmdp'>Confirmer Mot de passe:</label>
            <input type='password' class='form-control'  name='cMdp' id='cMdp' required>
       </div>
       </div>
       <button class='validerModifAdm btn-succes btn-succes' type='submit'>valider</button>
            </form></div></div>
        ";
    }

    //formuaire d'ajout d'un admin
    public function addAdmin()
    {
      echo"

      
      <!-- Page Wrapper -->
      <div id='wrapper'>
         <!-- Sidebar -->
         <ul class='navbar-nav bg-gradient-primary sidebar sidebar-dark accordion' id='accordionSidebar'>
       
       <!-- Sidebar - Brand -->
       <a class='sidebar-brand d-flex align-items-center justify-content-center' href='index.html'>
       <div class='sidebar-brand-icon rotate-n-15'>
       <img style='width : 70px' src='image\image_sans_fond_blanc\logo_1_sans_bg_sans_bz.png'/>
   </div>
           <div class='sidebar-brand-text mx-3'>Admin</div>
       </a>
       
       <!-- Divider -->
       <hr class='sidebar-divider my-0'>
       <!-- Divider -->
       <hr class='sidebar-divider'>
       
       <!-- Heading -->
       <div class='sidebar-heading'>
           Interface de Gestion
       </div>
       
       <!-- Nav Item - Pages Collapse Menu -->
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
               <i class='fas fa-fw fa-cog'></i>
               <span>Utilisateurs</span>
           </a>
           <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=inscrieep'>Inscription EEP</a>
                   <a class='collapse-item' href='index.php?page=voirST'>Inscription Salarie</a>
                   <a class='collapse-item' href='index.php?page=lesUtilisateur'>Gestion Utilisateur</a>
               </div>
           </div>
       </li>
       
       <!-- Nav Item - Utilities Collapse Menu -->
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
               <i class='fas fa-fw fa-wrench'></i>
               <span>Articles</span>
           </a>
           <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=gestion-articles'>Gestion Articles</a>
                   <a class='collapse-item' href='index.php?page=gestion-coffres'>Gestion Coffres</a>
       
               </div>
           </div>
       </li>
       
        
       <li class='nav-item'>
           <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsePages' aria-expanded='true' aria-controls='collapsePages'>
               <i class='fas fa-fw fa-folder'></i>
               <span>Gestion Pages</span>
           </a>
           <div id='collapsePages' class='collapse' aria-labelledby='headingPages' data-parent='#accordionSidebar'>
               <div class='bg-white py-2 collapse-inner rounded'>
                   <a class='collapse-item' href='index.php?page=gererActu'>Actualités</a>
                   <a class='collapse-item' href='index.php?page=pub'>Bandeau Promotion</a>
       
               </div>
           </div>
       </li>
       
       <!-- Nav Item - Charts -->
       <li class='nav-item'>
           <a class='nav-link' href='index.php?page=allbdc'>
               <i class='fas fa-fw fa-chart-area'></i>
               <span>Bond de Commande</span></a>
       </li>
       
       <!-- Divider -->
       <hr class='sidebar-divider d-none d-md-block'>
       
       <!-- Sidebar Toggler (Sidebar) -->
       <div class='text-center d-none d-md-inline'>
           <button class='rounded-circle border-0' id='sidebarToggle'></button>
       </div>
       
       </ul>
       <!-- End of Sidebar -->
      
      
      <div class='column center-block w-100 formAdmin'>
       <h3 class='titreInscri'>Inscrivez un admin</h3>
      
      <form method='post' class='formModif' action='index.php?page=addAdmin'>

      <div class='form-row '>
          <div class='form-group col-md-3'>
          <label for='nom'>Nom :</label>
            <input type='text' class='form-control'  name='nom' id='nom' required >
          </div>
          <div class='form-group col-md-3'>
          <label for='mail'>Email:</label>
            <input type='mail' class='form-control'  name='mail'  id='mail' required >
          </div>
        </div>
        <div class='form-row '>
          <div class='form-group col-md-3'>
          <label for='mdp'>mot de passe :</label>
            <input type='password' class='form-control' name='mdp' id='mdp' required >
          </div>
          <div class='form-group col-md-3'>
          <label for='cMdp'>Confirmer Mot de passe  :</label>
            <input type='password' class='form-control' name='cMdp'  id='cMdp' required >
          </div>
        </div>
        <button class='validerModifAdm btn-succes btn-succes' type='submit'>valider</button>
      </form></div></div>";
    }

   

}
