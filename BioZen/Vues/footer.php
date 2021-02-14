<?php
if (isset($_SESSION['id_role'])) {
    if ($_SESSION['id_role'] != 3) {
?>
        <footer class="fo">
            <div class="flex1">
                <div class="flex2">
                    <p>NOUS CONTACTER</p>
                </div>
                <div class="flex2">
                    <p><i class="fas fa-phone-alt"></i> 01 55 84 03 60</p>
                    <p><i class="fas fa-envelope"></i> Gmte93.saintdenis@ac-creteil.fr</p>
                </div>
            </div>
            <div class="flex1">
                <div class="flex2">
                    <p>SERVICES</p>
                </div>
                <div class="flex2">
                    <a class="lien_footer contact" href="#">
                        <p>Nous contacter</p>
                    </a>
                    <a class="lien_footer" href="#">
                        <p>Commander</p>
                    </a>
                    <a class="lien_footer" href="#">
                        <p>Consulter le catalogue</p>
                    </a>
                </div>
            </div>
            <div class="flex1">
                <div class="flex2">
                    <p>INFORMATIONS</p>
                </div>
                <div class="flex2">
                    <a class="lien_footer" href="index.php?page=a_propos">
                        <p>A propos</p>
                    </a>
                    <a class="lien_footer" href="index.php?page=actu">
                        <p>Actualités</p>
                    </a>
                    <a class="lien_footer" href="#">
                        <p>Promotions</p>
                    </a>
                    <a class="lien_footer" href="#">
                        <p>Termes & Conditions</p>
                    </a>
                </div>
            </div>

        </footer>
    <?php
    }
} else {
    ?>
    <footer class="fo">
        <div class="flex1">
            <div class="flex2">
                <p>NOUS CONTACTER</p>
            </div>
            <div class="flex2">
                <p><i class="fas fa-phone-alt"></i> 01 55 84 03 60</p>
                <p><i class="fas fa-envelope"></i> Gmte93.saintdenis@ac-creteil.fr</p>
            </div>
        </div>
        <div class="flex1">
            <div class="flex2">
                <p>SERVICES</p>
            </div>
            <div class="flex2">
                <a class="lien_footer contact" href="#">
                    <p>Nous contacter</p>
                </a>
                <a class="lien_footer" href="#">
                    <p>Commander</p>
                </a>
                <a class="lien_footer" href="#">
                    <p>Consulter le catalogue</p>
                </a>
            </div>
        </div>
        <div class="flex1">
            <div class="flex2">
                <p>INFORMATIONS</p>
            </div>
            <div class="flex2">
                <a class="lien_footer" href="index.php?page=a_propos">
                    <p>A propos</p>
                </a>
                <a class="lien_footer" href="index.php?page=actu">
                    <p>Actualités</p>
                </a>
                <a class="lien_footer" href="#">
                    <p>Promotions</p>
                </a>
                <a class="lien_footer" href="#">
                    <p>Termes & Conditions</p>
                </a>
            </div>
        </div>

    </footer>
<?php
}
?>



<script src="Bootstrap/sb-admin-2.js"></script>
<script src="Bootstrap/bootstrap.js"></script>
<script src='Admin/Js/js_functioDown.js'></script>
<script src='Admin/Js/js_verif.js'></script>



</body>

</html>