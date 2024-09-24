<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="C:\Users\mauri\Downloads\escuela.ico"> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="google" value="notranslate">
  <title>Principal</title>
  <link rel="stylesheet" type="text/css" href="css/background.css">
  <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
<body>
  <nav class="main-menu" style="background: #007BFF;">
    <div>
      <a class="logo" href="http://startific.com"></a> 
    </div> 
    <div class="settings"></div>
    <div class="scrollbar" id="style-1">
      <ul>
        <li>                                   
          <a href="#" class="menu-link" data-content="index.php">
            <i class="fa fa-home fa-lg"></i>
            <span class="nav-text">Menu Principal</span>
          </a>
        </li>   
        <li>                                 
          <a href="#" class="menu-link" data-content="LoginCoordinador.php">
            <i class="fa fa-user fa-lg"></i>
            <span class="nav-text">COORDINADOR</span>
          </a>
        </li>   
        <li>                                 
          <a href="#" class="menu-link" data-content="logeoalu.php">
            <i class="fa fa-user fa-lg"></i>
            <span class="nav-text">ALUMNO</span>
          </a>
        </li> 
        <li>                                 
          <a href="#" class="menu-link" data-content="LoginMaestro.php">
            <i class="fa fa-user fa-lg"></i>
            <span class="nav-text">MAESTRO</span>
          </a>
        </li> 

        </li>
        <li class="darkerlishadow">
          <a href="index.php">
            <i class="fa fa-clock-o fa-lg"></i>
            <span class="nav-text">ACERCA DE</span>
          </a>
        </li>

      </ul>
    </div>
  </nav>
  <div id="content-container"></div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.menu-link').click(function(event) {
        event.preventDefault();
        var contentUrl = $(this).data('content');
      
        $.ajax({
          url: contentUrl,
          type: 'GET',
          dataType: 'html',
          success: function(response) {
            $('#content-container').html(response);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      });
    });
  </script>
</body>
</html>
