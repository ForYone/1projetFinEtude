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
                        <h1 class="h3 mb-1 text-gray-800 text-center">Gestion Coffret</h1>
                        <br><br>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Border Left Utilities -->

                            <div class="col-lg-6 admin-voirList">
                                <div class="card-header py-3">
                                    <h2 class='m-0  text-primary text-center'>Ajouter un article dans votre coffret</h2>
                                </div>
                                <!-- Affiche coffretttttttttttttttttttttttttttttttttttttttttttttt -->
                                <div class="AdminTablauArticle">

                                    <?php
                                    include "Admin/Controleurs/CoffretControleur.php";
                                    $coffre = new CoffretControleur();
                                    $coffre->getACoffret();

                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6 admin-voirList">
                                <div class="card-header py-3">
                                    <h2 class='m-0  text-primary text-center'>Voir la composition de votre coffret</h2>
                                </div>
                                <!-- Liste composition du coffret choisie -->
                                <?php
                                include "Admin/Controleurs/NomArticleCoffret.php";
                                $listeArticleCoffret = new NomArticleCoffret();
                                $listeArticleCoffret->getNomCoffretControleur();

                                ?>

                            </div>

                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

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