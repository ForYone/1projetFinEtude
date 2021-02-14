<?php
if (isset($_SESSION['id_role'])) {
    if ($_SESSION['id_role'] == 3) {
?>

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=pageAdmin">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img style="width : 70px" src="image\image_sans_fond_blanc\logo_1_sans_bg_sans_bz.png" />
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
                            <a class="collapse-item" href="?page=gestion-articles">Gestion Articles</a>
                            <a class="collapse-item" href="?page=gestion-coffres">Gestion Coffres</a>

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
                            <a class="collapse-item" href="?page=gererActu">Actualités</a>
                            <a class="collapse-item" href="?page=promo">Bandeau Promotions</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="?page=allbdc">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Bons De Commandes</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-1 text-gray-800 text-center">Gestion des Articles</h1>
                        <!-- Debut Insert -------------->

                        <!-- Fin insert----------------- -->
                        <!-- Ajout des produits une fois que l'on a suprimer un produit -->

                        <!---- FIN------------------------------------------ -->
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary text-center">Articles</h6>
                                <input type='button' class='btn btn-primary' value=' + Ajouter' data-toggle='modal' data-target='#formAjoutArticle' />
                            </div>
                            <br><br>
                            <!-- Recherche dans le tableau -->

                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small recherche" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id='btn'>
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive js_article_refresh AdminTablauArticle">
                                    <table class="table table-bordered tableau" id="dataTable" width="100%" cellspacing="0">
                                        <!------------HHHERREEEEEEE------------------------------------>
                                        <thead class='text-center'>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Categorie</th>
                                            <th>Stock</th>
                                            <th>Référence Article</th>
                                            <th>Option</th>
                                        </thead>
                                        <tbody class="js_empty">
                                            <?php
                                            include "Admin/Controleurs/Article_controleur.php";

                                            $affiche = new ArticleControleur();

                                            $affiche->controleurArticle();

                                            ?>

                                        </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- mofid photooooooooooooooooooooooooooooooooooooooooooooooooooooooo -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary text-center">Ajouter / Modifier la photo de l'article</h6>
                            </div>
                            <p class='ml-2'>*Format d'image accepté : PNG / JEPG / JPG / BMP / GIF</p>
                            <!-- recherche -->
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small rechrcheNomArticle" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id='btn'>
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body AdminTablauArticle">
                                <div class="table-responsive divPhoto">
                                    <!-- boucleeee ICCI -->
                                    <?php

                                    include 'Admin/Controleurs/PhotoControleur.php';

                                    $photo = new PhotoControleur();
                                    $photo->getPhoto();



                                    ?>


                                    <!-- fin boucle---------------------- -->
                                </div>
                            </div>
                        </div>
                        <!-- finnnn modi phooooooooooooooootoooooooooooooooooooooooooooooooooo -->
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->




        <!-- The Modal LAMIEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEe -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body js_modale_form">
                        <!-- Produit cliquer Pour Modif -->


                        <!-- Modal footer -->


                    </div>
                </div>
            </div>
        </div>
        <!-- uoiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii -->
        <div class="modal" id="formAjoutArticle">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">Ajouter un Article/Coffret</h6>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="card shadow mb-4">


                            <div class="card-body">
                                <div class="table-responsive">

                                    <form method="POST" action='index.php?page=ajoutArticleAdmin'>
                                        <label for='article'>Article</label>
                                        <input type='text' id='article' class='form-control mb-3' name='nom_article' />

                                        <label for='categorie'>Categorie</label>
                                        <select id='categorie' name='categorie' class='form-control mb-3'>
                                            <option value='1'>Prestation</option>
                                            <option value='2'>Seminaire</option>
                                            <option value='3'>Produit</option>
                                            <option value='4'>Coffret</option>

                                        </select>

                                        <label for='prixArticle'>Prix</label>
                                        <input type='text' id='prixArticle' class='form-control mb-3' name='prix' />

                                        <label for='ref'>Reference Article</label>
                                        <input type='text' class='form-control mb-3' name='ref_article' />

                                        <label for='stockArticle'>Stock</label>
                                        <input type='text' id='stockArticle' class='form-control mb-3' name='stock' />


                                        <label for='description'>Description</label>
                                        <textarea id='description' name='description' class='form-control mb-2'></textarea>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->

                    <div class="modal-footer">
                        <input type='submit' class='btn btn-primary' value='Ajouter' />
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <!-- Footer -->

        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

<?php
    }
} else {
    header("Refresh:0.2;url=index.php?page=accueil");
}
?>