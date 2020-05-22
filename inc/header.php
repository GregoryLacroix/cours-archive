<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142526702-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-142526702-4');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MXNSWJF');</script>
    <!-- End Google Tag Manager -->

    <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "WebSite",
      "name": "COURS ARCHIVE | ESPACE ETUDIANT",
      "url": "https://g-lacroix.cours-archive.fr/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "{search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="ce site référence des cours archivés en ligne ainsi qu'un accés pour les étudiants en programmation WEB" />
    <meta name="author" content="Grégory LACROIX" />
    <meta name="keywords" content="programmation, cours, archive, web, develppeur, html, css, php, sql, wordpress" />
    <meta name="google" content="nositelinkssearchbox">
    <meta name="copyright" content="© 2019 - Grégory LACROIX" />
    <meta name="robots" content="index, follow, archive" />
    <meta name="robots" content="all" />
    <!-- <meta http-equiv="refresh" content="301;URL=https://g-lacroix.cours-archive.fr/"> -->

    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:url"           content="https://g-lacroix.cours-archive.fr/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="COURS ARCHIVE | ESPACE ETUDIANT" />
    <meta property="og:description"   content="ce site référence des cours archivés en ligne ainsi qu'un accés pour les étudiants en programmation WEB" />
    <meta property="og:image"         content="https://g-lacroix.cours-archive.fr/img/screenshot.PNG" />
    
    <link rel="icon" type="image/png" href="<?= URL ?>img/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= URL ?>inc/css/style.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-70100747-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-70100747-2');
    </script>
    
    <script type="text/javascript">
    <?php
      $sql = "SELECT id FROM messages ORDER BY id DESC LIMIT 1";
      $req = $pdo->query($sql);
      $data=$req->fetch(PDO::FETCH_ASSOC);
    ?>
    var lastid = <?php echo $data["id"]; ?>
    </script>

    <style>
    body{
      /* font-family: 'Oxanium', cursive; */
      font-family: 'Rajdhani', sans-serif;
      font-size: 1rem;
    }
    </style>

    <title>COURS ARCHIVE | ESPACE ETUDIANT</title>
</head>
<body class="">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

        <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXNSWJF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= URL ?>index.php?action=quitter"><i class="fas fa-chalkboard-teacher text-info logo"></i>&nbsp;&nbsp;COURS ARCHIVE | ESPACE ETUDIANT</a>
          </li>
          <?php if(!isset($_SESSION['membre'])): ?>
          <!-- <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
          </li> -->
         <?php endif; ?>

         <?php if(isset($_SESSION['membre']) && $_SESSION['membre']['statut'] == 'admin'): ?>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">GESTION</a>
            <div class="dropdown-menu" aria-labelledby="dropdown08">
              <a class="dropdown-item" href="<?= URL ?>ajout.php">AJOUT D'UNE ARCHIVE</a>
              <a class="dropdown-item" href="<?= URL ?>modif_archive.php">GESTION DES ARCHIVES</a>
              <!-- <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
          </li>

          <?php if(empty($_SESSION['pseudo'])): ?> 
          <li class="nav-item">       
            <a class="nav-link text-white" href="<?= URL ?>login.php">TCHAT</a>
          </li>
          <?php endif; ?>
          
          <li class="nav-item">
            <a class="nav-link text-danger" href="#">Connecté : <?= $_SESSION['membre']['prenom'] ?>&nbsp;<?= strtoupper($_SESSION['membre']['nom']) ?></a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-info" href="<?= URL ?>connexion.php?action=deconnexion"><i class="fas fa-power-off"></i></a>
          </li>

          <?php elseif(isset($_SESSION['membre']) && $_SESSION['membre']['statut'] == 'student'): ?>
          
          <?php if(empty($_SESSION['pseudo'])): ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= URL ?>login.php">TCHAT</a>
          </li>
          <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link text-danger" href="#">Connecté :&nbsp;<?= strtoupper($_SESSION['membre']['nom']) ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="<?= URL ?>connexion.php?action=deconnexion"><i class="fas fa-power-off"></i></a>
          </li>
        <?php endif; ?>

        </ul>
      </div>
    </nav>
    </header>
    <section class="container-fluid ma-section">