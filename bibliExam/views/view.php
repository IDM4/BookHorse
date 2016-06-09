<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="fr"
      lang="fr">
    <head>
        <meta http-equiv="Content-Type"
              content="text/html; charset=utf-8"/>
        <title>Bibli - <?php echo $data['page_title']; ?></title>
        <link rel="stylesheet"
              href="css/style.css">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include('partials/_main_navigation.php'); ?>
        <?php include('partials/_page_navigation.php'); ?>
        <?php include($data['view']); ?>


    </body>
</html>