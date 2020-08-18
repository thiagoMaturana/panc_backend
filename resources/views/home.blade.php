<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="img/sidebar-5.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Panc App
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="">
                        <i class="pe-7s-science"></i>
                        <p>Plantas</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="pe-7s-users"></i>
                        <p>Usuários</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="pe-7s-news-paper"></i>
                        <p>Receitas</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only center">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="#">Plantas</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
								    </p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Plantas</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped"> 
							<tbody>
								<tr>
									<th style="min-width: 10px;" class="align-middle">#</th>
									<th style="vertical-align:middle;" class="align-middle">Nome Científico</th>
									<th style="vertical-align:middle;" class="align-middle">Nome Popular</th>
									<th style="vertical-align:middle;" style="width: 40px;" class="align-middle"></th>
								</tr>
								<tr>
									<td style="vertical-align:middle;" class="align-middle">a</td>
									<td style="vertical-align:middle;" class="align-middle"><i>a</i></td>
									<td style="vertical-align:middle;" class="align-middle">a</td>
									<td style="vertical-align:middle;" class="text-center align-middle">
										<div style="display:block;min-width:50px;">
                                            
                                            <a class="btn btn-info btn-xs" href="" role="button" title="Ver"><i class="fa fa-eye"></i></a>
                                            
                                            <a href="" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                            
                                            <form class="delete" style="display: inline-block;" action="" method="">
												<button type="text"  class="btn btn-danger btn-xs" title="Excluir"><i class="fa fa-trash"></i></button>
												@csrf
                                            </form>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="js/chartist.min.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="js/demo.js"></script>

</html>
