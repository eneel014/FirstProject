<!DOCTYPE html>
  <html>
    <head>
      <?php if (isset($pageTitle)): ?>
        <title><?php echo $pageTitle; ?> | Seven Seas Corp</title>
      <?php else: ?>
        <title>Seven Seas Corp</title>
      <?php endif ?>
      
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <body class="<?php echo (isset($bodyClass) ? $bodyClass : ''); ?>">
    <script type="text/javascript" src="js/custom/checkCookies.js"></script>
    <ul id="slide-out" class="side-nav fixed light-blue darken-4">
      <li>
        <div class="user-view">
          <img src="img/sspc-logo.jpg" class="responsive-img" alt="">
        </div>
      </li>
      <li><div class="divider"></div></li>
      <li class="<?=(isset($navActive) && $navActive == 'dashboard' ? "active" : '')?>"><a class="waves-effect waves-light white-text" href="dashboard"><i class="material-icons left white-text">dashboard</i>Dashboard</a></li>
      <li class="<?=(isset($navActive) && $navActive == 'clients' ? "active" : '')?>"><a class="waves-effect waves-light white-text" href="clients"><i class="material-icons left white-text">person_outline</i>Clients</a></li>
      <li class="<?=(isset($navActive) && $navActive == 'reports' ? "active" : '')?>"><a class="waves-effect waves-light white-text" href="reports"><i class="material-icons left white-text">show_chart</i>Reports</a></li>
      <li class="<?=(isset($navActive) && $navActive == 'accounts' ? "active" : '')?> <?=($_COOKIE['cooUserType']>1 ? "hide" : '')?>" id="navAccounts"><a class="waves-effect waves-light white-text" href="accounts"><i class="material-icons left white-text">supervisor_account</i>Accounts</a></li>
      <li style="margin-top: 60px"><div class="divider"></div></li>
      <li><a class="waves-effect waves-light white-text" href="logout"><i class="material-icons left white-text">power_settings_new</i>Logout</a></li>
    </ul>

    <header>
      <nav class="light-blue">
        <div class="nav-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 right-align">
                <span class="date-time-holder"></span>
                <?php if (isset($pageTitle)): ?>
                  <!-- <a href="#" class="brand-logo"><?php echo $pageTitle; ?></a> -->
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <main class="">