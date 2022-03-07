<?php
include '../php/conn.php';
if ($_SESSION['logged'] == true) {
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Home tweet</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <link href="../css/home.css" rel="stylesheet">
        <link href="../css/profile.css" rel="stylesheet">
        <link href="../css/modalProfile.css" rel="stylesheet">
        <link href="../css/dropup.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="../images/favicon.png"/>
        <link rel="stylesheet" href="../css/fontAwesome/css/all.css">

    </head>
    <body>
    <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-2 text-start left-nav" id="left-nav">
            <i class="fab fa-twitter mt-2 fs-2 text-start p-2 logo-Twiter"></i>
            <div class="text-start nav-icons-color mt-4 flex-column d-flex width-fit">
                <a class="mb-3 me-2 nav-elems p-2 align-item-center d-flex" href="../html/index.php">
                    <i class="fas fa-home fs-2 text-start me-4"></i>
                    <span class="nav-text">Accueil</span>
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="#">
                    <i class="fas fa-hashtag mt-2 fs-2 text-start me-4"></i>
                    <span class="nav-text">Explorer</span>

                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="#">
                    <i class="fas fa-bell mt-2 fs-2 text-start me-4"></i>
                    <span class="nav-text">Notifications</span>

                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="../html/messagerie.php">
                    <i class="fas fa-envelope mt-2 fs-2 text-start me-4"></i>
                    <span class="nav-text">Messages</span>

                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="#" id="signets">
                    <i class="fas fa-bookmark mt-2 fs-2 text-start me-4"></i>
                    Signets
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="#" id="profil">
                    <i class="fas fa-list-alt mt-2 fs-2 text-start me-4"></i>
                    Listes
                </a>
                <a class="mb-3 me-2 nav-elems p-2 d-flex align-item-center" href="../html/profile.php" id="plus">
                    <i class="fas fa-user mt-2 fs-2 text-start me-4"></i>
                    Profil
                </a>
                <div class="mb-3 me-2 nav-elems p-2" id="plus">
                    <i class="fas fa-ellipsis-h mt-2 fs-2 text-start me-4"></i>
                    <span class="align-text-super" id="dropup">Plus</span>
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <a href="#"><i class="fas fa-comment-alt me-2"></i> Sujets</a>
                            <a href="#"><i class="fas fa-bolt me-2"></i> Moments</a>
                            <a href="#"><i class="fas fa-newspaper me-2"></i> Newsletters</a>
                            <a href="#"><i class="fas fa-rocket me-2"></i> Twitter pour les pros</a>
                            <a href="#"><i class="fas fa-share-square me-2"></i> Publicités Twitter</a>
                            <a href="#" class="separation"><i class="fas fa-signal me-2"></i> Statistiques</a>
                            <a href="../html/settings.php"><i class="fas fa-cog me-2"></i> Paramètres et
                                confidentialité</a>
                            <a href="#"><i class="fas fa-question me-2"></i> Centre d'assistance</a>
                            <a href="#"><i class="fas fa-edit me-2"></i> Afficher</a>
                            <a href="#"><i class="fas fa-sort me-2"></i> Raccourcis clavier</a>

                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-primary tweeter-btn mt-2" id="tweetBtn">Tweeter</button>
            </div>
            <a id="Deconnexion">
                <div class="nav-elems">
                    <div class="tendancesContent p-3 d-flex align-item-center">
                        <div class="d-flex align-item-center">
                            <img class="rounded-circle align-text-sub me-1 p-2" src="../images/favicon.png" width="52px"
                                 alt="pic">
                            <div class="d-flex flex-column justify-content-center">
                                <span class="tendancesReasons"><?= $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></span>
                                <span class="tendancesText">@<?= $_SESSION['firstname'] . $_SESSION['lastname'] ?></span>
                            </div>
                        </div>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                </div>
            </a>
        </div>
        <main class="col-lg-4 deletePadingForRow">
            <div class="text-start mt-2 border-bottom">
                <div class="d-flex">
                    <a href="../html/index.php" class="fas fa-arrow-left p-3 d-flex arrowHover"></a>
                    <div class="d-flex flex-column ms-3">
                        <span class="fw-bold accueil ms-2"><?= $_SESSION['firstname'] ?></span>
                        <span class="accueil ms-2 userTweetPosted">567 Tweets</span>
                    </div>
                </div>
                <div class="mt-3">
                    <img width="100%" src="<?php if ($_SESSION['picture_background'] != NULL) {
                        echo $_SESSION['picture_background'];
                    } else {
                        echo '../images/wallpaper.jpeg';
                    } ?>" alt="background">
                    <div class="d-flex">
                        <img alt="profilepic" class="profilePic" src="<?php if ($_SESSION['picture'] != NULL) {
                            echo $_SESSION['picture'];
                        } else {
                            echo '../images/favicon.png';
                        } ?>" width="50%"
                             style="object-fit: cover; width: 120px;height: 120px;">
                        <button class="btn marg-left-auto btn-editprofile mt-2 me-3" data-bs-target="#modalEditProfile"
                                data-bs-toggle="modal" type="button">Editer le profil
                        </button>
                    </div>
                    <div class="d-flex mt-3 ms-3 flex-column">
                        <span class="fw-bold"><?= $_SESSION['lastname'] . " " . $_SESSION['firstname'] ?></span>
                        <span class="userTweetPosted">@<?= $_SESSION['lastname'] . $_SESSION['firstname'] ?></span>
                        <span class="userTweetPosted joinedSince mt-3"><i class="fas fa-calendar-alt"></i> A rejoint Twitter en <?= $_SESSION['date'] ?></span>
                    </div>
                    <p><?= $_SESSION['bio'] ?></p>
                    <i class="fas fa-map-marker"><?= $_SESSION['location'] ?></i>
                    <div class="d-flex mt-4">
                        <a href="../html/abonne.php" class="ms-3 subCount">94 <span class="subsRight">abonnements</span></a>
                        <a href="../html/abonnes.php" class="ms-3 subCount">27 <span
                                    class="subsRight">abonnées</span></a>
                    </div>
                    <div class="d-flex mt-4 justify-content-between">
                        <span class="nav-profile p-4 active-onglets">Tweets</span>
                        <span class="nav-profile p-4">Tweets Réponses</span>
                        <span class="nav-profile p-4">Média</span>
                        <span class="nav-profile p-4">J'aime</span>
                    </div>
                </div>
            </div>

            <form method="post" id="likes">
                <div id="response">
                </div>
            </form>
            <input type="hidden" id="pageno" value="0">
            <img id="loader" src="../images/30.svg">


        </main>
        <div class="col-lg-3" id="right-part">
            <div class="mt-1 inputSearch text-start">
                <label class="fix-mac">
                    <i class="fas fa-search p-1"></i>
                    <input type="text" class="inputSearchBorder" placeholder="Recherche sur Twitter">
                </label>
            </div>

            <div class="imgPostedBox width-fit marg-auto mt-3">
                <div class="mb-1">
                    <div class="d-inline-block">
                        <img src="../images/favicon.png" width="120px" alt="img" class="img-top-left">
                    </div>
                    <div class="d-inline-block">
                        <img src="../images/attention.jpeg" width="120px" alt="img">
                    </div>
                    <div class="img-top-right d-inline-block">
                        <img src="../images/Dayz-001.jpg" width="120px" alt="img">
                    </div>
                </div>
                <div>
                    <div class="d-inline-block img-bottom-left">
                        <img src="../images/sanglier.jpeg" width="120px" alt="img">
                    </div>
                    <div class="img-top-left d-inline-block">
                        <img src="../images/camel.jpg" width="120px" alt="img">
                    </div>
                    <div class="img-top-left d-inline-block">
                        <img src="../images/creeper.webp" width="120px" alt="img" class="img-bottom-right">
                    </div>
                </div>

            </div>


            <div class="mt-3 tendancesBox text-start">
                <div class="p-3">
                    <span class="tendancesHead p-3 mb-3"> Tendances pour vous</span>
                    <i class="fas fa-cog settingsBtn"></i>
                </div>
                <div class="tendancesContent p-3">
                    <div class="d-flex">
                        <span class="tendancesText">Musique · Tendances</span>
                        <i class="fas fa-ellipsis-h fs-2 editTendances"></i>
                    </div>
                    <span class="d-flex tendancesReasons">#Zemmour</span>
                    <span class="tendancesText">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <div class="d-flex">
                        <span class="tendancesText">Musique · Tendances</span>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                    <span class="d-flex tendancesReasons">#Zemmour</span>
                    <span class="tendancesText">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <div class="d-flex">
                        <span class="tendancesText">Musique · Tendances</span>
                        <i class="fas fa-ellipsis-h fs-2 editTendances "></i>
                    </div>
                    <span class="d-flex tendancesReasons">#Zemmour</span>
                    <span class="tendancesText">4567 Tweets</span>
                </div>
                <div class="tendancesContent p-3">
                    <span class="d-flex seeMore">Voir plus</span>
                </div>
            </div>

            <div class="mt-3 tendancesBox text-start">
                <div class="p-3">
                    <span class="tendancesHead p-3 mb-3">Suggestions</span>
                </div>
                <div class="tendancesContent p-3 d-flex align-item-center">
                    <div class="d-flex align-item-center">
                        <img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png"
                             width="64px">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="tendancesReasons">Geoffrey Hallier</span>
                            <span class="tendancesText">@Geoffrey_hallier</span>
                        </div>
                    </div>
                    <button class="btn followSugest ms-3 marg-left-auto">Suivre</button>
                </div>
                <div class="tendancesContent p-3 d-flex align-item-center">
                    <div class="d-flex align-item-center">
                        <img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png"
                             width="64px">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="tendancesReasons">Geoffrey Hallier</span>
                            <span class="tendancesText">@Geoffrey_hallier</span>
                        </div>
                    </div>
                    <button class="btn followSugest ms-3 marg-left-auto">Suivre</button>
                </div>
                <div class="tendancesContent p-3 d-flex align-item-center">
                    <div class="d-flex align-item-center">
                        <img class="rounded-circle align-text-sub me-1 p-2 avatar" src="../images/favicon.png"
                             width="64px">
                        <div class="d-flex flex-column justify-content-center">
                            <span class="tendancesReasons">Geoffrey Hallier</span>
                            <span class="tendancesText">@Geoffrey_hallier</span>
                        </div>
                    </div>
                    <button class="btn followSugest ms-3 marg-left-auto">Suivre</button>
                </div>
                <div class="tendancesContent p-3">
                    <span class="d-flex seeMore">Voir plus</span>
                </div>
            </div>
            <button class="btn" onclick="toggleDarkmode()">Teste</button>
        </div>
    </div>


    <!--Modal editer-->


    <div aria-hidden="true" aria-labelledby="modalEditProfileLabel" class="modal fade" id="modalEditProfile"
         tabindex="-1">
        <form action="../php/editPicture.php" method="post" enctype="multipart/form-data">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="btn-close ms-3" data-bs-dismiss="modal"
                                type="button"></button>
                        <h5 class="modal-title ms-4">Éditer le profil</h5>
                        <button class="btn btn-save" type="submit">Enregistrer</button>

                    </div>
                    <div class="modal-body">

                        <>
                        <img alt="background" src="<?= $_SESSION['picture_background'] ?>" width="100%">
                        <div class="elemsInImg">
                            <i class="fas fa-camera me-3 p-1 changeImg" id="OpenBgUpload"></i>
                            <i class="fas fa-times p-1 changeImg"></i>
                        </div>

                        <img alt="background"
                             style="width: 150px !important;height: 150px !important;border-radius: 50%;position: relative;transform: translate(5%, -75%);border: 4px solid var(--text-white);"
                             src="<?= $_SESSION['picture'] ?>">
                        <input type="file" name="avatar" placeholder="photo profile" id="avupload" class="d-none"><i
                                class="fas fa-camera me-3 p-1 changeProflie" id="OpenAvUpload"></i>
                        <input type="file" name="background" placeholder="photo profile" id="bgupload" class="d-none">


                        <div class="text-center">
                            <textarea id="bio" name="bio" placeholder="Bio"></textarea>
                        </div>
                        <div class="mt-3">
                            <input class="form-control" name="loca" id="Localisation" placeholder="Localisation"
                                   type="texte">
                            <label for="Localisation">Localisation</label>
                        </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </body>
    </html>
    <script crossorigin="anonymous"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/darkmode.js"></script>
    <script src="../js/dropup.js"></script>
    <script src="../js/editprofile.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/jquery.inview-master/jquery.inview.js"></script>

    <script>
        $(document).ready(function () {
            $('#loader').on('inview', function (event, isInView) {
                if (isInView) {
                    var nextPage = parseInt($('#pageno').val()) + 1;
                    $.ajax({
                        type: 'POST',
                        url: '../php/profileTweet.php',
                        data: {pageno: nextPage},
                        success: function (data) {
                            if (data !== '') {
                                $('#response').append(data);
                                $('#pageno').val(nextPage);
                            } else {
                                $("#loader").hide();
                            }
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $("#Deconnexion").click(function (e) {
            let message = prompt('Voulez-vous vraiment vous déconnecter ? Écrire : Oui/Non')

            switch (message) {
                case "OUI":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataOUI = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/logout.php',
                        type: 'POST',
                        data: form_dataOUI
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
                case "Oui":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataOui = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/logout.php',
                        type: 'POST',
                        data: form_dataOui
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
                case "oui":
                    e.preventDefault(); //empêcher une action par défaut
                    let form_dataoui = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
                    $.ajax({
                        url: '../php/logout.php',
                        type: 'POST',
                        data: form_dataoui
                    }).done(function (response) {
                        window.location = response
                    });
                    break;
            }


        });
    </script>
    <?php
} else {
    header('location: login.html?error=yournotconnected');
    exit();
}
?>