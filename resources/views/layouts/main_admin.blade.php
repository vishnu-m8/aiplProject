<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/styles/style.min.css') }}">

    <!-- Material Design Icon -->
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/material-design/css/materialdesignicons.css') }}">

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/waves/waves.min.css') }}">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/sweet-alert/sweetalert.css') }}">

    <!-- Percent Circle -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/percircle/css/percircle.css') }}">

    <!-- Chartist Chart -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/chart/chartist/chartist.min.css') }}">

    <!-- FullCalendar -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/fullcalendar/fullcalendar.print.css') }}" media='print'>

    <!-- Color Picker -->
    <link rel="stylesheet" href="{{ asset('public/assets/color-switcher/color-switcher.min.css') }}">

    <!-- data table -->
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/datatables/media/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('public/assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css') }}">
</head>


<body>
    <div class="main-menu">
        <header class="header">
        <!-- <div class="logo">
                <img src="" class="img" alt="New Logo">
            </div> -->
        </header>
        <!-- /.header -->
        <div class="content">
            <div class="navigation">
                <ul class="menu js__accordion">
                    <li class="{{ Route::currentRouteName() == 'admin.home' ? 'current' : '' }}">
                        <a class="waves-effect" href="#">
                            <i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="{{  Route::currentRouteName() == 'experience_logo' ||  Route::currentRouteName() == 'fabrication_img_show' || Route::currentRouteName() == 'fabrication_show'  || Route::currentRouteName() == 'clientSay' || Route::currentRouteName() == 'bannerImageShow' || Route::currentRouteName() == 'alumaye_index' || Route::currentRouteName() == 'homeProject_index'
                         || Route::currentRouteName() == 'OurProject_index' || Route::currentRouteName() == 'leadership_index' || Route::currentRouteName() == 'Number_index' || Route::currentRouteName() == 'numberDetails_index' || Route::currentRouteName() == 'homeIcon_index' ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-home"></i><span>Home</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                            <li><a href="{{ route('bannerImageShow') }}"style="{{ Route::currentRouteName() == 'bannerImageShow' ? 'color: orange;' : '' }}">Banner-Image</a></li>
                            <li><a href="{{ route('alumaye_index') }}"style="{{ Route::currentRouteName() == 'alumaye_index' ? 'color: orange;' : '' }}">At-Alumayer</a></li>
                            <li><a href="{{ route('homeIcon_index') }}"style="{{ Route::currentRouteName() == 'homeIcon_index' ? 'color: orange;' : '' }}">Home-Icon</a></li>
                            <li><a href="{{ route('leadership_index') }}"style="{{ Route::currentRouteName() == 'leadership_index' ? 'color: orange;' : '' }}">LeaderShip</a></li>
                            <li><a href="{{ route('Number_index') }}"style="{{ Route::currentRouteName() == 'Number_index' ? 'color: orange;' : '' }}">Number-Adding</a></li>
                            <li><a href="{{ route('numberDetails_index') }}"style="{{ Route::currentRouteName() == 'numberDetails_index' ? 'color: orange;' : '' }}">Number-Details</a></li>
                            <li><a href="{{ route('OurProject_index') }}"style="{{ Route::currentRouteName() == 'OurProject_index' ? 'color: orange;' : '' }}">Our Project</a></li>
                            <li><a href="{{ route('clientSay') }}"style="{{ Route::currentRouteName() == 'clientSay' ? 'color: orange;' : '' }}">Happy-Clients</a></li>
                            <li><a href="{{ route('fabrication_show') }}"style="{{ Route::currentRouteName() == 'fabrication_show' ? 'color: orange;' : '' }}">Fabrication</a></li>
                            <li><a href="{{ route('fabrication_img_show') }}"style="{{ Route::currentRouteName() == 'fabrication_img_show' ? 'color: orange;' : '' }}">Fabrication-Image</a></li>
                            <li><a href="{{ route('experience_logo') }}"style="{{ Route::currentRouteName() == 'experience_logo' ? 'color: orange;' : '' }}">Experience-logo</a></li>
                        </ul>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'OurValues_index' || Route::currentRouteName() == 'History_index' || Route::currentRouteName() == 'AboutInfo_index' || Route::currentRouteName() == 'Team_index' 
                        || Route::currentRouteName() == 'OurValues_index' || Route::currentRouteName() == 'Values_index' || Route::currentRouteName() == 'aboutDetail_index' || Route::currentRouteName() == 'AboutVison_index' || Route::currentRouteName() == 'AboutMission_index' ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-information"></i><span>About-Us</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                        <li><a href="{{ route('aboutDetail_index') }}"style="{{ Route::currentRouteName() == 'aboutDetail_index' ? 'color: orange;' : '' }}">About-Details</a></li>
                        <li><a href="{{ route('History_index') }}"style="{{ Route::currentRouteName() == 'History_index' ? 'color: orange;' : '' }}">History</a></li>
                        <li><a href="{{ route('AboutInfo_index') }}"style="{{ Route::currentRouteName() == 'AboutInfo_index' ? 'color: orange;' : '' }}">About-Info</a></li>
                        <li><a href="{{ route('AboutVison_index') }}"style="{{ Route::currentRouteName() == 'AboutVison_index' ? 'color: orange;' : '' }}">About-Vision</a></li>
                        <li><a href="{{ route('AboutMission_index') }}"style="{{ Route::currentRouteName() == 'AboutMission_index' ? 'color: orange;' : '' }}">About-Mission</a></li>
                        <li><a href="{{ route('OurValues_index') }}"style="{{ Route::currentRouteName() == 'OurValues_index' ? 'color: orange;' : '' }}">Our-Values</a></li>
                        <li><a href="{{ route('Values_index') }}"style="{{ Route::currentRouteName() == 'Values_index' ? 'color: orange;' : '' }}">Our-Values-Details</a></li>
                        <li><a href="{{ route('Team_index') }}"style="{{ Route::currentRouteName() == 'Team_index' ? 'color: orange;' : '' }}">Team</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'Manufacturing_index' || Route::currentRouteName() == 'Strength_index' || Route::currentRouteName() == 'Facility_index' || Route::currentRouteName() == 'facilityDetails_index' 
                        || Route::currentRouteName() == 'Location_index'  || Route::currentRouteName() == 'Design_index' || Route::currentRouteName() == 'DesignDetail_index' || Route::currentRouteName() == 'ExpertDesign_index' 
                        || Route::currentRouteName() == 'production_index' || Route::currentRouteName() == 'production_title' || Route::currentRouteName() == 'inhouse_index' || Route::currentRouteName() == 'Working_index' || Route::currentRouteName() == 'Logistical_index' ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-star"></i><span>Manufacturing</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                        <li><a href="{{ route('Manufacturing_index') }}"style="{{ Route::currentRouteName() == 'Manufacturing_index' ? 'color: orange;' : '' }}">Manufacturing-Details</a></li>
                        <li><a href="{{ route('Strength_index') }}"style="{{ Route::currentRouteName() == 'Strength_index' ? 'color: orange;' : '' }}">Strength-Details</a></li>
                        <li><a href="{{ route('production_index') }}"style="{{ Route::currentRouteName() == 'production_index' ? 'color: orange;' : '' }}">Production-Details</a></li>
                        <li><a href="{{ route('production_title') }}"style="{{ Route::currentRouteName() == 'production_title' ? 'color: orange;' : '' }}">Production-Title</a></li>
                        <li><a href="{{ route('Facility_index') }}"style="{{ Route::currentRouteName() == 'Facility_index' ? 'color: orange;' : '' }}">Facility</a></li>
                        <li><a href="{{ route('facilityDetails_index') }}"style="{{ Route::currentRouteName() == 'facilityDetails_index' ? 'color: orange;' : '' }}">Facility-Details</a></li>
                        <li><a href="{{ route('Location_index') }}"style="{{ Route::currentRouteName() == 'Location_index' ? 'color: orange;' : '' }}">Location</a></li>
                        <li><a href="{{ route('inhouse_index') }}"style="{{ Route::currentRouteName() == 'inhouse_index' ? 'color: orange;' : '' }}">In-House</a></li>
                        <li><a href="{{ route('Design_index') }}"style="{{ Route::currentRouteName() == 'Design_index' ? 'color: orange;' : '' }}">Design-System</a></li>
                        <li><a href="{{ route('DesignDetail_index') }}"style="{{ Route::currentRouteName() == 'DesignDetail_index ' ? 'color: orange;' : '' }}">Design-Details</a></li>
                        <li><a href="{{ route('ExpertDesign_index') }}"style="{{ Route::currentRouteName() == 'ExpertDesign_index' ? 'color: orange;' : '' }}">Expert-Design</a></li>
                        <li><a href="{{ route('Working_index') }}"style="{{ Route::currentRouteName() == 'Working_index' ? 'color: orange;' : '' }}">Working-Process</a></li>
                        <li><a href="{{ route('Logistical_index') }}"style="{{ Route::currentRouteName() == 'Logistical_index' ? 'color: orange;' : '' }}">Logistical</a></li>
                        </ul>
                    </li>
                    <li class="{{  
                         Route::currentRouteName() == 'India_index' || Route::currentRouteName() == 'China_index' || Route::currentRouteName() == 'USA_index' 
                         || Route::currentRouteName() == 'Canada_index' || Route::currentRouteName() == 'Italy_index' ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-star"></i><span>Manufacturing State</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                        <li><a href="{{ route('Italy_index') }}"style="{{ Route::currentRouteName() == 'Italy_index' ? 'color: orange;' : '' }}">Italy-State</a></li>
                        <li><a href="{{ route('India_index') }}"style="{{ Route::currentRouteName() == 'India_index' ? 'color: orange;' : '' }}">India-State</a></li>
                        <li><a href="{{ route('China_index') }}"style="{{ Route::currentRouteName() == 'China_index' ? 'color: orange;' : '' }}">China-State</a></li>
                        <li><a href="{{ route('USA_index') }}"style="{{ Route::currentRouteName() == 'USA_index' ? 'color: orange;' : '' }}">USA-State</a></li>
                        <li><a href="{{ route('Canada_index') }}"style="{{ Route::currentRouteName() == 'Canada_index' ? 'color: orange;' : '' }}">Canada-State</a></li>
                        </ul>
                    </li>

                    <li class="{{ Route::currentRouteName() == 'Product_index' || Route::currentRouteName() == 'Productdetails_index'  ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-newspaper"></i><span>Products</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                        <li><a href="{{ route('Product_index') }}"style="{{ Route::currentRouteName() == 'Product_index' ? 'color: orange;' : '' }}">Product</a></li>
                        <li><a href="{{ route('Productdetails_index') }}"style="{{ Route::currentRouteName() == 'Productdetails_index' ? 'color: orange;' : '' }}">Product-Details</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'Project_index' || Route::currentRouteName() == 'India_project' || Route::currentRouteName() == 'International_project' ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-home"></i><span>Projects</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                        <li><a href="{{ route('Project_index') }}"style="{{ Route::currentRouteName() == 'Project_index' ? 'color: orange;' : '' }}">Projects-Details</a></li>
                        </ul>
                    </li>
                  
                    <li class="{{ Route::currentRouteName() == 'Qualitychecks_index' || Route::currentRouteName() == 'Qualityimage_index' || Route::currentRouteName() == 'qualityDetails_index'  ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-home"></i><span>Quality</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                        <li><a href="{{ route('Qualitychecks_index') }}"style="{{ Route::currentRouteName() == 'Qualitychecks_index' ? 'color: orange;' : '' }}" >Quality-Check</a></li>
                        <li><a href="{{ route('Qualityimage_index') }}"style="{{ Route::currentRouteName() == 'Qualityimage_index' ? 'color: orange;' : '' }}">Quality-Image</a></li>
                        <li><a href="{{ route('qualityDetails_index') }}"style="{{ Route::currentRouteName() == 'qualityDetails_index' ? 'color: orange;' : '' }}">Quality-Details</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'Clientsimage_index' || Route::currentRouteName() == 'clientsDetails_index' 
                        || Route::currentRouteName() == 'clientsRegion_index' || Route::currentRouteName() == 'clientsSecond_index' || Route::currentRouteName() == 'clientsMap_index' ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-home"></i><span>Clients</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                        <li><a href="{{ route('Clientsimage_index') }}"style="{{ Route::currentRouteName() == 'Clientsimage_index' ? 'color: orange;' : '' }}">Clients-Image</a></li>
                        <li><a href="{{ route('clientsDetails_index') }}"style="{{ Route::currentRouteName() == 'clientsDetails_index' ? 'color: orange;' : '' }}">Clients-Details</a></li>
                        <li><a href="{{ route('clientsMap_index') }}"style="{{ Route::currentRouteName() == 'clientsMap_index' ? 'color: orange;' : '' }}">Clients-Map-Image</a></li>
                        <li><a href="{{ route('clientsRegion_index') }}"style="{{ Route::currentRouteName() == 'clientsRegion_index' ? 'color: orange;' : '' }}">Clients-Region</a></li>
                        <li><a href="{{ route('clientsSecond_index') }}"style="{{ Route::currentRouteName() == 'aboutDetail_index' ? 'color: orange;' : '' }}">Clients-Region-Second</a></li>
                        </ul>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'contact_index' || Route::currentRouteName() == 'contact_listing' ? 'current' : '' }}">
                        <a class="waves-effect parent-item js__control" href="#">
                            <i class="menu-icon mdi mdi-phone"></i><span>Contact</span>
                            <span class="menu-arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub-menu js__content">
                        <li><a href="{{ route('contact_index') }}"style="{{ Route::currentRouteName() == 'contact_index' ? 'color: orange;' : '' }}">Contact-Us</a></li>
                        <li><a href="{{ route('contact_listing') }}"style="{{ Route::currentRouteName() == 'contact_listing' ? 'color: orange;' : '' }}">Contact-List</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- /.content -->
    </div>
    <!-- /.main-menu -->

    <div class="fixed-navbar">
        <div class="pull-left">
            <button type="button"
                class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
            <h1 class="page-title">Admin</h1>
            <!-- /.page-title -->
        </div>
        <!-- /.pull-left -->
        <div class="pull-right">
            <div class="ico-item">
                <!-- <a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="fa fa-search button-search" type="submit"></button></form> -->
                <!-- /.searchform -->
            </div>
            <!-- /.ico-item -->
            <!-- <div class="ico-item fa fa-arrows-alt js__full_screen"></div> -->
            <!-- /.ico-item fa fa-fa-arrows-alt -->

            <!-- /.ico-item -->
            <!-- <a href="#" class="ico-item fa fa-envelope notice-alarm js__toggle_open" data-target="#message-popup"></a> -->
            <!-- <a href="#" class="ico-item pulse"><span class="ico-item fa fa-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a> -->
            <div class="ico-item">
                <img src="http://placehold.it/80x80" alt="" class="ico-img">
                <ul class="sub-ico-item">
                    <!-- <li><a href="#">Settings</a></li>
				<li><a href="#">Blog</a></li> -->
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                </ul>
                <!-- /.sub-ico-item -->
            </div>
            <!-- /.ico-item -->
        </div>
        <!-- /.pull-right -->
    </div>
    <!-- /.fixed-navbar -->

    <!-- <div id="notification-popup" class="notice-popup js__toggle" data-space="50">
</div> -->



    <div id="wrapper">
        <div class="main-content">

            @yield('content')
            <footer class="footer">
                <ul class="list-inline">
                    <li>© Copyright 2023 AIPL | Designed By <a href="https://www.matrixbricks.com/"
                        target="_blank">Matrix Bricks.</a> All Rights Reserved.</li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </footer>
        </div>
        <!-- /.main-content -->
    </div>
    <!--/#wrapper -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
    <!-- 
	================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset ('public/assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/waves/waves.min.js') }}"></script>
    <!-- Full Screen Plugin -->
    <script src="{{ asset('public/assets/plugin/fullscreen/jquery.fullscreen-min.js') }}"></script>

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- chart.js Chart -->
    <script src="{{ asset('public/assets/plugin/chart/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/scripts/chart.chartjs.init.min.js') }}"></script>

    <!-- FullCalendar -->
    <script src="{{ asset('public/assets/plugin/moment/moment.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('public/assets/scripts/fullcalendar.init.js') }}"></script>

    <!-- Sparkline Chart -->
    <script src="{{ asset('public/assets/plugin/chart/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('public/assets/scripts/chart.sparkline.init.min.js') }}"></script>

    <script src="{{ asset('public/assets/scripts/main.min.js') }}"></script>
    <script src="{{ asset('public/assets/color-switcher/color-switcher.min.js') }}"></script>

    <!-- data table -->
    <script src="{{ asset('public/assets/plugin/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('public/assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('public/assets/scripts/datatables.demo.min.js') }}"></script>


    <!-- ck editor -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-s6sCJ0EXs6KwQFB6Pv7BlK39V9yzwbT9lCjyBjy/CwI=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>


    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 1) {
                document.getElementById('hidden_div').style.display = "block";
            } else {
                document.getElementById('hidden_div').style.display = "none";
            }
        }
    </script>
    <script>
        $(() => {
            CKEDITOR.config.toolbar = [{
                    name: 'clipboard',
                    groups: ['clipboard', 'undo'],
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Table']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup'],
                    items: ['Bold', 'Italic', 'Underline']
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter',
                        'JustifyRight',
                        'JustifyBlock'
                    ]
                },
                {
                    name: 'styles',
                    items: ['FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor']
                },
                {
                    name: 'others',
                    items: ['-']
                },
                {
                    name: 'document',
                    items: ['Source']
                },
            ];
            CKEDITOR.on('dialogDefinition', function (ev) {
                // Take the dialog name and its definition from the event data.
                var dialogName = ev.data.name;
                var dialogDefinition = ev.data.definition;
                if (dialogName == 'link') {
                    // Get a reference to the "Link Info" tab.
                    var targetTab = dialogDefinition.getContents('target');
                    // Set the default value for the URL field.
                    //         var urlField = infoTab.get( 'url' );
                    //         urlField[ 'default' ] = 'www.example.com';

                    //         var linkTpyeField = infoTab.get('linkType');
                    //         linkTpyeField['items'] = [["URL", 'url']];
                    // 重写target 效果
                    var targetField = targetTab.elements[0].children[0];

                    targetField['items'] = [
                        ["New Window (_blank)", "_blank"]
                    ];
                    targetField['default'] = '_blank';
                    // 隐藏advance
                    var advancedtab = dialogDefinition.getContents("advanced");
                    advancedtab['hidden'] = true;
                    //
                    //
                    //

                } else if (dialogName === 'image') {
                    var imageInfo = dialogDefinition.getContents('info');
                    console.log('ccc', imageInfo)
                }
            });
            document.querySelectorAll('.editor').forEach((element) => {
                CKEDITOR.replace(element);
            });
        });
    </script>
  


</body>

</html>