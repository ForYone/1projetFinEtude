<?php
class GererBdcView
{
    public function allBdc($commEep, $commSal)
    {
        if (isset($_SESSION['id_role'])) {
            if ($_SESSION['id_role'] == 3) { ?>

                <!-- Page Wrapper -->
                <div id="wrapper">

                    <!-- Sidebar -->
                    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                        <!-- Sidebar - Brand -->
                        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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

                            <!-- Topbar -->
                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                </button>

                                <!-- Topbar Search -->
                                <?php if ($_GET['page'] == "allbdc") { ?>
                                    <a style="color: white" href="?page=bdcArchive" class="btn btn-primary" type="button">
                                        Voir les bons de commandes archivés

                                    </a>
                                <?php } else if ($_GET['page'] == "bdcArchive") { ?>
                                    <a style="color: white" href="?page=allbdc" class="btn btn-success" type="button">
                                        Voir les bons de commandes à valider
                                    </a>

                                <?php } ?>



                            </nav>
                            <!-- End of Topbar -->

                            <!-- Begin Page Content -->
                            <div class="container-fluid">
                                <!-- DataTales Example -->
                                <?php if ($_GET['page'] == "allbdc") { ?>

                                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;padding-bottom:20px">BONS DE COMMANDE &Agrave; VALIDER</h5>

                                <?php } else if ($_GET['page'] == "bdcArchive") { ?>
                                    <h5 class="m-0 font-weight-bold text-primary" style="text-align: center;padding-bottom:20px">BONS DE COMMANDE ARCHIV&Eacute;S</h5>
                                <?php } ?>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Bons de commandes EEP</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                                <tbody>

                                                    <?php
                                                    if ($commEep == array()) {
                                                        if ($_GET['page'] == "allbdc") { ?>

                                                            <?php echo "aucune commande EEP à valider"; ?>

                                                        <?php } else if ($_GET['page'] == "bdcArchive") { ?>

                                                            <?php echo "aucune commande EEP archivée"; ?>


                                                        <?php }
                                                    } else {
                                                        foreach ($commEep as $key => $val) { ?>
                                                            <tr class="bdcAval">
                                                                <td class="eltBdc">
                                                                    <?php echo "Bon de commande n° " . $val["num_commande_eep"] . ""; ?>
                                                                </td>
                                                                <td class="eltBdc">
                                                                    <?php echo "Du: " . date("d-m-Y", strtotime($val["date_commande_eep"])) . ""; ?>
                                                                </td>
                                                                <td class="eltBdc1">
                                                                    <a class="btnStd" href="?page=gererBdc&numCom=<?php echo $val['num_commande_eep'] ?>">voir</a>
                                                                </td>
                                                            </tr>


                                                    <?php }
                                                    }        ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Bons de commandes salariés</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                                <tbody>

                                                    <?php
                                                    if ($commSal == array()) {
                                                        if ($_GET['page'] == "allbdc") { ?>

                                                            <?php echo "aucune commande salarié à valider"; ?>

                                                        <?php } else if ($_GET['page'] == "bdcArchive") { ?>

                                                            <?php echo "aucune commande salariés archivée"; ?>


                                                        <?php }
                                                    } else {

                                                        foreach ($commSal as $key => $val) { ?>


                                                            <tr class="bdcAval">
                                                                <td class="eltBdc"><?php echo "Bon de commande n° " . $val['num_commande_salarie'] . ""; ?></td>

                                                                <td class="eltBdc">
                                                                    <?php echo "Du:" . date("d-m-Y", strtotime($val["date_commande_salarie"])) . ""; ?>
                                                                </td>
                                                                <td class="eltBdc1"><a class="btn-success btn-voir" href="?page=gererBdc&numCom=<?php echo $val['num_commande_salarie'] ?>">voir</a></td>
                                                            </tr>


                                                    <?php }
                                                    }
                                                    ?>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->
                    </div>
                    <!-- End of Content Wrapper -->

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>
                <!-- /.container-fluid -->
        <?php  }
        }
    }


    public function bdcRender($commande)
    {
        $nb = count($commande) - 1;
        $total = 0;
        ?>

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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



                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="container">
                            <div style="text-align:center;margin-bottom:10px" class="titreBDC">
                                <h3 style="padding:0" class="titreBdc">
                                    <?php if (isset($_SESSION['id_role'])) {
                                        if ($_SESSION['id_role'] == 3) {
                                            if (isset($commande[$nb]["num_commande_salarie"])) {
                                                $numCom = $commande[$nb]["num_commande_salarie"];
                                            } else if (isset($commande[$nb]["num_commande_eep"])) {
                                                $numCom = $commande[$nb]["num_commande_eep"];
                                            }
                                            echo 'Bon de commande ';
                                        } else {
                                            echo ' Votre bon de commande <a onclick="imprimer_page()" id="print" class="print" href="#">à imprimer</a>';
                                        }
                                    ?> </h3><br>


                                <?php if (isset($_SESSION['id_role'])) {
                                            if ($_SESSION['id_role'] == 3) {
                                                echo '<a onclick="imprimer_page()" id="print" class="print" href="#">imprimer</a>';
                                                if ($commande[$nb]["valider"] == 0) {
                                                    echo ' <a href="?page=valBdc&numCom=' . $numCom . '" class="print" id="valBdc">Valider</a>';
                                                } else if ($commande[$nb]["valider"] == 1) {
                                                    echo ' <a href="?page=supBdc&numCom=' . $numCom . '" class="print">Supprimer</a>';
                                                }
                                            }
                                        } ?>

                            </div>
                            <div id="BDC" class="BDC">
                                <div class="logoBdc">
                                    <div class="adresse1 violet">

                                        <p> EEP BIO & ZEN</p>
                                        <p>Espace Lurçat<br>2 rue Diderot<br>93200 Saint-Denis<p>
                                    </div>
                                    <div class="imgLogoBdc">
                                        <img src="image/image_sans_fond_blanc/logo_sans_fond_blanc1.png">
                                    </div>
                                    <div class="enteteBDC">

                                        <p class="violet date">Date: <?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                                                            echo date("d-m-Y", strtotime($commande[$nb]["date_commande_salarie"]));;
                                                                        } else if (isset($commande[$nb]["num_commande_eep"])) {
                                                                            echo date("d-m-Y", strtotime($commande[$nb]["date_commande_eep"]));
                                                                        } ?></p>

                                    </div>
                                </div>

                                <div class="adresseBDC">
                                    <p class="violet"> Bon de commande <br> n°<span class="gras"><?php echo $numCom ?></span></p>
                                    <div class="adresse2">

                                        <p> <?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                                echo '<span class="maj">' . $commande[$nb]["nom_salarie"] . '</span>' . ' ' . $commande[$nb]["prenom_salarie"];
                                            } else if (isset($commande[$nb]["num_commande_eep"])) {
                                                echo '<span class="maj">' . $commande[$nb]["nom_eep"] . '</span>';
                                            }  ?></p>
                                        <p><?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                                echo $commande[$nb]["adresse_salarie"];
                                            } else if (isset($commande[$nb]["num_commande_eep"])) {
                                                echo $commande[$nb]["adresse_eep"];
                                            } ?><br>
                                            <?php if (isset($commande[$nb]["num_commande_salarie"])) {
                                                echo $commande[$nb]["cp_salarie"] . " " . $commande[$nb]["ville_salarie"];
                                            } else if (isset($commande[$nb]["num_commande_eep"])) {
                                                echo $commande[$nb]["cp_eep"] . " " . $commande[$nb]["ville_eep"];
                                            } ?><br>
                                            <?php if ((isset($commande[$nb]["num_commande_eep"])) || (isset($commande[$nb]["num_commande_salarie"]))) {
                                                echo "Tèl:" . $commande[$nb]["tel_eep"];
                                            } ?><br><br>
                                            <p>
                                    </div>

                                </div>
                                <div class="articleBDC">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Référence</th>
                                                <th>Désignation</th>
                                                <th>Prix unitaire</th>
                                                <th>Quantité</th>
                                                <th>Sous-total</th>
                                            </tr>
                                            <thead>
                                            <tbody> <?php foreach ($commande as $key => $commande) {
                                                    ?> <tr>
                                                        <td><?php echo  $commande["ref_article"] ?></td>
                                                        <td><?php echo $commande["nom_article"]  ?></td>
                                                        <td><?php echo $commande["prix_article"] . " €" ?></td>
                                                        <td><?php echo $commande["qte"] ?></td>
                                                        <td><?php echo $commande["prix_article_total"] . " €" ?></td>


                                                    </tr>
                                                <?php

                                                        $total = $total + $commande["prix_article_total"];
                                                    } ?>
                                            </tbody>
                                    </table>
                                </div>
                                <div class="totalBDC">
                                    <table>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td></td>
                                            <th>Total de la commande</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td>Total H.T</td>
                                            <td><?php
                                                echo $total . " €";
                                                ?></td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td>Dont T.V.A</td>
                                            <td><?php echo $commande["total_commande_tva"] . " €"; ?></td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td>Montant total</td>
                                            <td><?php echo $commande["total_commande_ttc"] . " €"; ?></td>

                                        </tr>
                                    </table>

                                </div>

                            </div>


                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script type="text/javascript">
            function imprimer_page() {
                window.print();
            }
        </script>
<?php
                                    } else {
                                        echo ("Page inaccessible <a href='#' class='print connexion'>se connecter</a>");
                                    }
                                }
                            }
