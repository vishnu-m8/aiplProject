<?php

use App\Http\Controllers\AboutDetailsController;
use App\Http\Controllers\AboutInfoController;
use App\Http\Controllers\AboutMissionController;
use App\Http\Controllers\AboutVisionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginRegisterController;
use App\Http\Controllers\admin\StafLoginRegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumayeController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BannerImageContoller;
use App\Http\Controllers\CanadSController;
use App\Http\Controllers\ChinaSController;
use App\Http\Controllers\ClientDetailsController;
use App\Http\Controllers\ClientMapController;
use App\Http\Controllers\ClientRegionController;
use App\Http\Controllers\ClientRegionSecondController;
use App\Http\Controllers\ClientsImageController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\DesignDetailsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ExpertDesignController;
use App\Http\Controllers\FabricationController;
use App\Http\Controllers\FabricationImageController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FacilityDetailsController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ClientsController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeProjectController;
use App\Http\Controllers\OurProjectController;
use App\Http\Controllers\OurValuesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ValuesDetailsContoller;
use App\Http\Controllers\frontend\ProjectController;
use App\Http\Controllers\frontend\QualityController;
use App\Http\Controllers\IndiaProjectController;
use App\Http\Controllers\InternationalProController;
use App\Http\Controllers\ManufacturingDataController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\frontend\froManufacturingController;
use App\Http\Controllers\HappyClientController;
use App\Http\Controllers\HomePageIconController;
use App\Http\Controllers\IndiaSController;
use App\Http\Controllers\InHouseController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ItalySController;
use App\Http\Controllers\LeaderShipController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LogisticalController;
use App\Http\Controllers\ManufacturingExpertiseController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\NumberDetailsController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\QualitychecksController;
use App\Http\Controllers\QualityDetailsController;
use App\Http\Controllers\QualityImageController;
use App\Http\Controllers\StrengthController;
use App\Http\Controllers\USAController;
use App\Http\Controllers\WorkingController;
use App\Mail\InquiryFormMail;
use App\Http\Controllers\Auth\ForgotPasswordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/clear', function () {
//     Artisan::call('view:clear');
//     Artisan::call('cache:clear');
//     Artisan::call('config:clear');
//     Artisan::call('route:clear');
//     return "Successfully Cleared";
//   });



Route::get('/', [HomeController::class, 'homeShow'])->name('home_show');
Route::get('/about', [AboutController::class, 'aboutShow'])->name('about_show');
Route::get('/products', [froManufacturingController::class, 'productsShow'])->name('products_show');
Route::get('/product-details/{slug}', [froManufacturingController::class, 'product_details'])->name('product_details');
Route::get('/projects', [ProjectController::class, 'projectsShow'])->name('projects_show');
Route::get('/projects-details/{slug}', [ProjectController::class, 'projects_details'])->name('projects_slug_details');
Route::get('/india-details/{slug}', [ProjectController::class, 'IndiaProjects_details'])->name('IndiaProjects_slug_details');
Route::get('/international-details/{slug}', [ProjectController::class, 'InternationalProjects_details'])->name('IntProjects_slug_details');
Route::get('/quality', [QualityController::class, 'qualityShow'])->name('quality_show');
Route::get('/clients', [ClientsController::class, 'clientShow'])->name('client_show');
Route::get('/contact', [ContactController::class, 'contactShow'])->name('contact_show');
Route::any('/fabrication-plant', [FroManufacturingController::class, 'manufacturing_details'])->name('manufacturing_list');



Route::post('/send-contact-form', [ContactFormController::class, 'sendContactForm'])->name('sendContactForm');
Route::post('/send-inquery', [InquiryController::class, 'sendinquiry'])->name('sendinquiry');







// ---------------admin controller-----------
Route::controller(AdminLoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update'); 


Route::controller(StafLoginRegisterController::class)->group(function() {
    Route::get('staf/register', 'register')->name('staf_register');
    Route::post('staf/store', 'store')->name('staf_store');
    Route::get('/staf/login', 'login')->name('staf_login');
    Route::post('/staf/authenticate', 'authenticate')->name('staf_authenticate');
    Route::get('/staf/dashboard', 'dashboard')->name('staf_dashboard');
    Route::post('/staf/logout', 'logout')->name('staf_logout');
});

Route::middleware(['auth', 'admin-service:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.home');


   // ------Banner Image---------
    Route::get('/banner-image', [BannerImageContoller::class, 'bannerImageShow'])->name('bannerImageShow');
    Route::get('/banner-image-add', [BannerImageContoller::class, 'bannerImageAdd'])->name('bannerImageAdd');
    Route::post('/banner-image-store', [BannerImageContoller::class, 'bannerImageStore'])->name('bannerImageStore');
    Route::get('/banner-image-edit/{id}', [BannerImageContoller::class, 'bannerImageEdit'])->name('bannerImageEdit');
    Route::put('/banner-image-update/{id}', [BannerImageContoller::class, 'bannerImageUpdate'])->name('bannerImageUpdate');
    Route::get('/banner-image-destory/{id}', [BannerImageContoller::class, 'bannerImageDestory'])->name('bannerImageDestory');
    Route::post('/banner-action-update/{id}', [BannerImageContoller::class, 'banneActionUpdate'])->name('banneActionUpdate');

    // ------Happy Client---------
    Route::get('/client-say', [HappyClientController::class, 'clientSay'])->name('clientSay');
    Route::get('/client-say-add', [HappyClientController::class, 'clientSayAdd'])->name('clientSayAdd');
    Route::post('/client-say-store', [HappyClientController::class, 'clientSayStore'])->name('clientSayStore');
    Route::get('/client-say-edit/{id}', [HappyClientController::class, 'clientSayEdit'])->name('clientSayEdit');
    Route::get('/client-say-destory/{id}', [HappyClientController::class, 'clientSayDestory'])->name('clientSayDestory');
    Route::put('/client-say-update/{id}', [HappyClientController::class, 'clientSayUpdate'])->name('clientSayUpdate');
    Route::post('/client-say-action-update/{id}', [HappyClientController::class, 'clientSayActionUpdate'])->name('clientSayActionUpdate');

   // ---------Fabrication--------
   Route::get('/fabrication', [FabricationController::class, 'fabrication_show'])->name('fabrication_show');
   Route::get('/fabrication-edit/{id}', [FabricationController::class, 'fabrication_edit'])->name('fabrication_edit');
   Route::put('/fabrication-update/{id}', [FabricationController::class, 'fabrication_update'])->name('fabrication_update');

   // ---------Fabrication Image--------
   Route::get('/fabrication-img', [FabricationImageController::class, 'fabrication_img_show'])->name('fabrication_img_show');
   Route::get('/fabrication-img-add', [FabricationImageController::class, 'fabrication_img_add'])->name('fabrication_img_add');
   Route::post('/fabrication-img-store', [FabricationImageController::class, 'fabrication_img_store'])->name('fabrication_img_store');
   Route::get('/fabrication-img-edit/{id}', [FabricationImageController::class, 'fabrication_img_edit'])->name('fabrication_img_edit');
   Route::put('/fabrication-img-update/{id}', [FabricationImageController::class, 'fabrication_img_update'])->name('fabrication_img_update');
   Route::get('/fabrication-img-destory/{id}', [FabricationImageController::class, 'fabrication_img_destory'])->name('fabrication_img_destory');
   Route::post('/fabrication-img-action-update/{id}', [FabricationImageController::class, 'fabrication_img_action_update'])->name('fabrication_img_action_update');

   // -------Experience Company--------
  //  Route::get('/experience', [ExperienceController::class, 'experience_show'])->name('experience_show');
  //  Route::get('/experience-edit/{id}', [ExperienceController::class, 'experience_edit'])->name('experience_edit');
  //  Route::put('/experience-update/{id}', [ExperienceController::class, 'experience_update'])->name('experience_update');

  // -------Experience Company logo--------
  Route::get('/experience-logo', [ExperienceController::class, 'experience_logo'])->name('experience_logo');
  Route::get('/experience-logo-edit/{id}', [ExperienceController::class, 'experience_logo_edit'])->name('experience_logo_edit');
  Route::put('/experience-logo-update/{id}', [ExperienceController::class, 'experience_logo_update'])->name('experience_logo_update');


    // ------At-Alumaye---------
    Route::get('/alumaye', [AlumayeController::class, 'alumayeShow'])->name('alumaye_index');
    Route::get('/alumaye-edit/{id}', [AlumayeController::class, 'alumayeEdit'])->name('alumaye_Edit');
    Route::put('/alumaye-update/{id}', [AlumayeController::class, 'alumayeUpdate'])->name('alumaye_Update');



    // ------our-project---------
    Route::get('/our-project', [OurProjectController::class, 'OurProject'])->name('OurProject_index');
    Route::get('/our-project-edit/{id}', [OurProjectController::class, 'OurProjectEdit'])->name('OurProject_Edit');
    Route::put('/our-project-update/{id}', [OurProjectController::class, 'OurProjectUpdate'])->name('OurProject_Update');
    
    // ------------About----------------
    Route::get('/our-values', [OurValuesController::class, 'OurValues'])->name('OurValues_index');
    Route::get('/our-values-edit/{id}', [OurValuesController::class, 'OurValuesEdit'])->name('OurValues_Edit');
    Route::put('/our-values-update/{id}', [OurValuesController::class, 'OurValuesUpdate'])->name('OurValues_Update');


    // -------History---------
    Route::get('/history', [HistoryController::class, 'historyIndex'])->name('History_index');
    Route::get('/history-add', [HistoryController::class, 'historyAdd'])->name('history_Add');
    Route::post('/history-store', [HistoryController::class, 'historyStore'])->name('history_Store');
    Route::get('/history-edit/{id}', [HistoryController::class, 'historyEdit'])->name('history_Edit');
    Route::put('/history-update/{id}', [HistoryController::class, 'historyUpdate'])->name('history_Update');
    Route::get('/history-destory/{id}', [HistoryController::class, 'historyDestory'])->name('history_Destory');
    Route::post('/history-action-update/{id}', [HistoryController::class, 'historyActionUpdate'])->name('history_Action');

    // --------Our Values About----------

    Route::get('/values-details', [ValuesDetailsContoller::class, 'valuesIndex'])->name('Values_index');
    Route::get('/values-details-add', [ValuesDetailsContoller::class, 'valuesAdd'])->name('values_Add');
    Route::post('/values-details-store', [ValuesDetailsContoller::class, 'valuesStore'])->name('values_Store');
    Route::get('/values-details-edit/{id}', [ValuesDetailsContoller::class, 'valuesEdit'])->name('values_Edit');
    Route::put('/values-details-update/{id}', [ValuesDetailsContoller::class, 'valuesUpdate'])->name('values_Update');
    Route::get('/values-details-destory/{id}', [ValuesDetailsContoller::class, 'valuesDestory'])->name('values_Destory');
    Route::post('/values-details-action-update/{id}', [ValuesDetailsContoller::class, 'valuesActionUpdate'])->name('values_Action');

    // ----------Team--------
    Route::get('/team', [TeamController::class, 'teamIndex'])->name('Team_index');
    Route::get('/team-add', [TeamController::class, 'teamAdd'])->name('team_Add');
    Route::post('/team-store', [TeamController::class, 'teamStore'])->name('team_Store');
    Route::get('/team-edit/{id}', [TeamController::class, 'teamEdit'])->name('team_Edit');
    Route::put('/team-update/{id}', [TeamController::class, 'teamUpdate'])->name('team_Update');
    Route::get('/team-destory/{id}', [TeamController::class, 'teamDestory'])->name('team_Destory');
    Route::post('/team-action-update/{id}', [TeamController::class, 'teamActionUpdate'])->name('team_Action');

    // -------------About Info-------------

    Route::get('/about-info', [AboutInfoController::class, 'aboutInfoIndex'])->name('AboutInfo_index');
    Route::get('/about-info-add', [AboutInfoController::class, 'aboutInfoAdd'])->name('AboutInfo_Add');
    Route::post('/about-info-store', [AboutInfoController::class, 'aboutInfoStore'])->name('AboutInfo_Store');
    Route::get('/about-info-edit/{id}', [AboutInfoController::class, 'aboutInfoEdit'])->name('AboutInfo_Edit');
    Route::put('/about-info-update/{id}', [AboutInfoController::class, 'aboutInfoUpdate'])->name('AboutInfo_Update');
    Route::get('/about-info-destory/{id}', [AboutInfoController::class, 'aboutInfoDestory'])->name('AboutInfo_Destory');
    Route::post('/about-info-action-update/{id}', [AboutInfoController::class, 'aboutInfoActionUpdate'])->name('AboutInfo_Action');

       // -------------About Details-------------
    Route::get('/about-details', [AboutDetailsController::class, 'aboutDetailsIndex'])->name('aboutDetail_index');
    Route::get('/about-details-edit/{id}', [AboutDetailsController::class, 'aboutDetailEdit'])->name('aboutDetail_Edit');
    Route::put('/about-details-update/{id}', [AboutDetailsController::class, 'aboutDetailUpdate'])->name('aboutDetail_Update');


    // -------Product------------
    Route::get('/product', [ProductController::class, 'productIndex'])->name('Product_index');
    Route::get('/product-add', [ProductController::class, 'productAdd'])->name('product_Add');
    Route::post('/product-store', [ProductController::class, 'productStore'])->name('product_Store');
    Route::get('/product-edit/{id}', [ProductController::class, 'productEdit'])->name('product_Edit');
    Route::put('/product-update/{id}', [ProductController::class, 'productUpdate'])->name('product_Update');
    Route::get('/product-destory/{id}', [ProductController::class, 'productDestory'])->name('product_Destory');
    Route::post('/product-action-update/{id}', [ProductController::class, 'productActionUpdate'])->name('product_Action');
    Route::get('/product-images/{id}', [ProductController::class, 'show_product_images'])->name('show_product_images');
    Route::post('/add-product-image', [ProductController::class, 'add_product_image'])->name('add_product_image');
    Route::get('/delete-product-image/{id}', [ProductController::class, 'delete_product_image'])->name('delete_product_image');
    Route::get('/product-projects/{id}', [ProductController::class, 'show_product_projects'])->name('show_product_projects');
    Route::post('/add-product-project', [ProductController::class, 'add_product_project'])->name('add_product_project');
    Route::get('/delete-product-project/{id}', [ProductController::class, 'delete_product_project'])->name('delete_product_project');

    // ---------Product-Details---------
    Route::get('/product-details', [ProductDetailsController::class, 'productdetailsIndex'])->name('Productdetails_index');
    Route::get('/product-details-add', [ProductDetailsController::class, 'productdetailsAdd'])->name('Productdetails_Add');
    Route::post('/product-details-store', [ProductDetailsController::class, 'productdetailsStore'])->name('Productdetails_Store');
    Route::get('/product-details-edit/{id}', [ProductDetailsController::class, 'productdetailsEdit'])->name('Productdetails_Edit');
    Route::put('/product-details-update/{id}', [ProductDetailsController::class, 'productdetailsUpdate'])->name('Productdetails_Update');
    Route::get('/product-details-destory/{id}', [ProductDetailsController::class, 'productdetailsDestory'])->name('Productdetails_Destory');
    Route::post('/product-details-action-update/{id}', [ProductDetailsController::class, 'productdetailsActionUpdate'])->name('Productdetails_Action');


  // ---------------Projects-------
  Route::get('/project', [ProjectsController::class, 'projectIndex'])->name('Project_index');
  Route::get('/project-add', [ProjectsController::class, 'projectAdd'])->name('project_Add');
  Route::post('/project-store', [ProjectsController::class, 'projectStore'])->name('project_Store');
  Route::get('/project-edit/{id}', [ProjectsController::class, 'projectEdit'])->name('project_Edit');
  Route::put('/project-update/{id}', [ProjectsController::class, 'projectUpdate'])->name('project_Update');
  Route::get('/project-destory/{id}', [ProjectsController::class, 'projectDestory'])->name('project_Destory');
  Route::post('/project-action-upadte/{id}', [ProjectsController::class, 'projectActionUpadte'])->name('project_Action');

  Route::get('/project-image/{id}', [ProjectsController::class, 'project_Image'])->name('project_Image');
  Route::post('/add-project-image/{id}', [ProjectsController::class, 'addProjectImage'])->name('project_Image_add');
  Route::get('/delete-project-image/{id}', [ProjectsController::class, 'delete_project_image'])->name('delete_project_image');


  Route::post('/project-home-action-upadte/{id}', [ProjectsController::class, 'projectHomeActionUpadte'])->name('project_Home_Action');
  Route::put('/projects/{id}/activate', [ProjectsController::class, 'updateStatusActive'])->name('projects.activate');
  Route::put('/projects/{id}/deactivate', [ProjectsController::class, 'updateStatusInactive'])->name('projects.deactivate');

  // -----------manufacturing------------
  Route::get('/manufacturing', [ManufacturingDataController::class, 'manufacturingIndex'])->name('Manufacturing_index');
  Route::get('/manufacturing-edit/{id}', [ManufacturingDataController::class, 'manufacturingEdit'])->name('manufacturing_Edit');
  Route::put('/manufacturing-update/{id}', [ManufacturingDataController::class, 'manufacturingUpdate'])->name('manufacturing_Update');

  // ----------Strength--------
  Route::get('/strength', [StrengthController::class, 'strengthIndex'])->name('Strength_index');
  Route::get('/strength-add', [StrengthController::class, 'strengthAdd'])->name('strength_Add');
  Route::post('/strength-store', [StrengthController::class, 'strengthStore'])->name('strength_Store');
  Route::get('/strength-edit/{id}', [StrengthController::class, 'strengthEdit'])->name('strength_Edit');
  Route::put('/strength-update/{id}', [StrengthController::class, 'strengthUpdate'])->name('strength_Update');
  Route::get('/strength-destory/{id}', [StrengthController::class, 'strengthDestory'])->name('strength_Destory');
  Route::post('/strength-action-update/{id}', [StrengthController::class, 'strengthActionUpdate'])->name('strength_Action');

  // ------Facility------
  Route::get('/facility', [FacilityController::class, 'facilityIndex'])->name('Facility_index');
  Route::get('/facility-edit{id}', [FacilityController::class, 'facilityEdit'])->name('facility_Edit');
  Route::put('/facility-update{id}', [FacilityController::class, 'facilityUpdate'])->name('facility_Update');

  // ------Facility Details------
  Route::get('/facility-details', [FacilityDetailsController::class, 'facilityDetailsIndex'])->name('facilityDetails_index');
  Route::get('/facility-details-add', [FacilityDetailsController::class, 'facilityDetailsAdd'])->name('facilityDetails_Add');
  Route::post('/facility-details-store', [FacilityDetailsController::class, 'facilityDetailsStore'])->name('facilityDetails_Store');
  Route::get('/facility-details-edit/{id}', [FacilityDetailsController::class, 'facilityDetailsEdit'])->name('facilityDetails_Edit');
  Route::put('/facility-details-update/{id}', [FacilityDetailsController::class, 'facilityDetailsUpdate'])->name('facilityDetails_Update');
  Route::get('/facility-details-destory/{id}', [FacilityDetailsController::class, 'facilityDetailsDestory'])->name('facilityDetails_Destory');
  Route::post('/facility-details-action-update/{id}', [FacilityDetailsController::class, 'facilityDetailsActionUpdate'])->name('facilityDetails_Action');

  // ---------Italy State ----------
  Route::get('/italy-State', [ItalySController::class, 'italyIndex'])->name('Italy_index');
  Route::get('/italy-State-add', [ItalySController::class, 'italyAdd'])->name('Italy_Add');
  Route::post('/italy-State-store', [ItalySController::class, 'italyStore'])->name('Italy_Store');
  Route::get('/italy-State-edit/{id}', [ItalySController::class, 'italyEdit'])->name('Italy_Edit');
  Route::put('/italy-State-update/{id}', [ItalySController::class, 'italyUpdate'])->name('Italy_Update');
  Route::get('/italy-State-destory/{id}', [ItalySController::class, 'italyDestory'])->name('Italy_Destory');
  Route::post('/italy-State-action-update/{id}', [ItalySController::class, 'italyActionUpdate'])->name('Italy_Action');

  // ---------India State ----------
  Route::get('/india-State', [IndiaSController::class, 'indiaIndex'])->name('India_index');
  Route::get('/india-State-add', [IndiaSController::class, 'indiaAdd'])->name('India_Add');
  Route::post('/india-State-store', [IndiaSController::class, 'indiaStore'])->name('India_Store');
  Route::get('/india-State-edit/{id}', [IndiaSController::class, 'indiaEdit'])->name('India_Edit');
  Route::put('/india-State-update/{id}', [IndiaSController::class, 'indiaUpdate'])->name('India_Update');
  Route::get('/india-State-destory/{id}', [IndiaSController::class, 'indiaDestory'])->name('India_Destory');
  Route::post('/india-State-action-update/{id}', [IndiaSController::class, 'indiaActionUpdate'])->name('India_Action');


  // ---------China State ----------
  Route::get('/china-State', [ChinaSController::class, 'chinaIndex'])->name('China_index');
  Route::get('/china-State-add', [ChinaSController::class, 'chinaAdd'])->name('China_Add');
  Route::post('/china-State-store', [ChinaSController::class, 'chinaStore'])->name('China_Store');
  Route::get('/china-State-edit/{id}', [ChinaSController::class, 'chinaEdit'])->name('China_Edit');
  Route::put('/china-State-update/{id}', [ChinaSController::class, 'chinaUpdate'])->name('China_Update');
  Route::get('/china-State-destory/{id}', [ChinaSController::class, 'chinaDestory'])->name('China_Destory');
  Route::post('/china-State-action-update/{id}', [ChinaSController::class, 'chinaActionUpdate'])->name('China_Action');


  // ---------USA State ----------
  Route::get('/usa-State', [USAController::class, 'usaIndex'])->name('USA_index');
  Route::get('/usa-State-add', [USAController::class, 'usaAdd'])->name('USA_Add');
  Route::post('/usa-State-store', [USAController::class, 'usaStore'])->name('USA_Store');
  Route::get('/usa-State-edit/{id}', [USAController::class, 'usaEdit'])->name('USA_Edit');
  Route::put('/usa-State-update/{id}', [USAController::class, 'usaUpdate'])->name('USA_Update');
  Route::get('/usa-State-destory/{id}', [USAController::class, 'usaDestory'])->name('USA_Destory');
  Route::post('/usa-State-action-update/{id}', [USAController::class, 'usaActionUpdate'])->name('USA_Action');


  // ---------Canada State ----------
  Route::get('/canada-State', [CanadSController::class, 'canadaIndex'])->name('Canada_index');
  Route::get('/canada-State-add', [CanadSController::class, 'canadaAdd'])->name('Canada_Add');
  Route::post('/canada-State-store', [CanadSController::class, 'canadaStore'])->name('Canada_Store');
  Route::get('/canada-State-edit/{id}', [CanadSController::class, 'canadaEdit'])->name('Canada_Edit');
  Route::put('/canada-State-update/{id}', [CanadSController::class, 'canadaUpdate'])->name('Canada_Update');
  Route::get('/canada-State-destory/{id}', [CanadSController::class, 'canadaDestory'])->name('Canada_Destory');
  Route::post('/canada-State-action-update/{id}', [CanadSController::class, 'canadaActionUpdate'])->name('Canada_Action');


  // ---------Location Details ----------
  Route::get('/location', [LocationController::class, 'locationIndex'])->name('Location_index');
  Route::get('/location-edit/{id}', [LocationController::class, 'locationEdit'])->name('Location_Edit');
  Route::put('/location-update/{id}', [LocationController::class, 'locationUpdate'])->name('Location_Update');


  // ------Design-System------
  Route::get('/design', [DesignController::class, 'designIndex'])->name('Design_index');
  Route::get('/design-edit{id}', [DesignController::class, 'designEdit'])->name('Design_Edit');
  Route::put('/design-update{id}', [DesignController::class, 'designUpdate'])->name('Design_Update');

  // ------------Design-Details----
  Route::get('/design-details', [DesignDetailsController::class, 'designDetailIndex'])->name('DesignDetail_index');
  Route::get('/design-details-add', [DesignDetailsController::class, 'designDetailAdd'])->name('DesignDetail_Add');
  Route::post('/design-details-store', [DesignDetailsController::class, 'designDetailStore'])->name('DesignDetail_Store');
  Route::get('/design-details-edit/{id}', [DesignDetailsController::class, 'designDetailEdit'])->name('DesignDetail_Edit');
  Route::put('/design-details-update/{id}', [DesignDetailsController::class, 'designDetailUpdate'])->name('DesignDetail_Update');
  Route::get('/design-details-destory/{id}', [DesignDetailsController::class, 'designDetailDestory'])->name('DesignDetail_Destory');
  Route::post('/design-details-action-update/{id}', [DesignDetailsController::class, 'designDetailActionUpdate'])->name('DesignDetail_Action');

 // ------Design-System------
  Route::get('/expert-design', [ExpertDesignController::class, 'expertDesignIndex'])->name('ExpertDesign_index');
  Route::get('/expert-design-edit{id}', [ExpertDesignController::class, 'expertDesignEdit'])->name('ExpertDesign_Edit');
  Route::put('/expert-design-update{id}', [ExpertDesignController::class, 'expertDesignUpdate'])->name('ExpertDesign_Update');


  // ------Working------
  Route::get('/working', [WorkingController::class, 'workingIndex'])->name('Working_index');
  Route::get('/working-edit/{id}', [WorkingController::class, 'workingEdit'])->name('working_Edit');
  Route::put('/working-update/{id}', [WorkingController::class, 'workingUpdate'])->name('working_Update');

  // ------Logistical ------
  Route::get('/logistical', [LogisticalController::class, 'logisticalIndex'])->name('Logistical_index');
  Route::get('/logistical-edit/{id}', [LogisticalController::class, 'logisticalEdit'])->name('logistical_Edit');
  Route::put('/logistical-update/{id}', [LogisticalController::class, 'logisticalUpdate'])->name('logistical_Update');

  // ------Quality Checks ------
  Route::get('/quality-checks', [QualitychecksController::class, 'qualitychecksIndex'])->name('Qualitychecks_index');
  Route::get('/quality-checks-edit{id}', [QualitychecksController::class, 'qualitychecksEdit'])->name('Qualitychecks_Edit');
  Route::put('/quality-checks-update{id}', [QualitychecksController::class, 'qualitychecksUpdate'])->name('Qualitychecks_Update');

    // ------Quality Image ------
    Route::get('/quality-image', [QualityImageController::class, 'QualityimageIndex'])->name('Qualityimage_index');
    Route::get('/quality-image-add', [QualityImageController::class, 'QualityimageAdd'])->name('qualityimage_Add');
    Route::post('/quality-image-store', [QualityImageController::class, 'QualityimageStore'])->name('qualityimage_Store');
    Route::get('/quality-image-edit/{id}', [QualityImageController::class, 'QualityimageEdit'])->name('qualityimage_Edit');
    Route::put('/quality-image-update/{id}', [QualityImageController::class, 'QualityimageUpdate'])->name('qualityimage_Update');
    Route::get('/quality-image-destory/{id}', [QualityImageController::class, 'QualityimageDestory'])->name('qualityimage_Destory');
    Route::post('/quality-image-action-update/{id}', [QualityImageController::class, 'QualityimageActionUpdate'])->name('qualityimage_Action');


  // ------Clients Image ------
  Route::get('/clients-image', [ClientsImageController::class, 'ClientsimageIndex'])->name('Clientsimage_index');
  Route::get('/clients-image-add', [ClientsImageController::class, 'ClientsyimageAdd'])->name('Clientsimage_Add');
  Route::post('/clients-image-store', [ClientsImageController::class, 'ClientsimageStore'])->name('Clientsimage_Store');
  Route::get('/clients-image-edit/{id}', [ClientsImageController::class, 'ClientsimageEdit'])->name('Clientsimage_Edit');
  Route::put('/clients-image-update/{id}', [ClientsImageController::class, 'ClientsimageUpdate'])->name('Clientsimage_Update');
  Route::get('/clients-image-destory/{id}', [ClientsImageController::class, 'ClientsimageDestory'])->name('Clientsimage_Destory');
  Route::post('/clients-image-action-update/{id}', [ClientsImageController::class, 'ClientsimageActionUpdate'])->name('Clientsimage_Action');

  // ------About Vison ------
  Route::get('/about-vision', [AboutVisionController::class, 'aboutVisonIndex'])->name('AboutVison_index');
  Route::get('/about-vision-edit/{id}', [AboutVisionController::class, 'aboutVisonEdit'])->name('AboutVison_Edit');
  Route::put('/about-vision-update/{id}', [AboutVisionController::class, 'aboutVisonUpdate'])->name('AboutVison_Update');


  // ------About Mission ------
  Route::get('/about-mission', [AboutMissionController::class, 'aboutMissionIndex'])->name('AboutMission_index');
  Route::get('/about-mission-edit/{id}', [AboutMissionController::class, 'aboutMissionEdit'])->name('AboutMission_Edit');
  Route::put('/about-mission-update/{id}', [AboutMissionController::class, 'aboutMissionUpdate'])->name('AboutMission_Update');

 // ------Quality Details ------
 Route::get('/quality-details', [QualityDetailsController::class, 'qualityDetailsIndex'])->name('qualityDetails_index');
 Route::get('/quality-details-edit/{id}', [QualityDetailsController::class, 'qualityDetailsEdit'])->name('qualityDetails_Edit');
 Route::put('/quality-details-update/{id}', [QualityDetailsController::class, 'qualityDetailsUpdate'])->name('qualityDetails_Update');


 // ------client Details ------
  Route::get('/clients-details', [ClientDetailsController::class, 'clientsDetailsIndex'])->name('clientsDetails_index');
  Route::get('/clients-details-edit/{id}', [ClientDetailsController::class, 'clientsDetailsEdit'])->name('clientsDetails_Edit');
  Route::put('/clients-details-update/{id}', [ClientDetailsController::class, 'clientsDetailsUpdate'])->name('clientsDetails_Update');

 // ------client region ------
 Route::get('/clients-region', [ClientRegionController::class, 'clientsRegionIndex'])->name('clientsRegion_index');
//  Route::get('/clients-region-add', [ClientRegionController::class, 'clientsRegionAdd'])->name('clientsRegion_Add');
//  Route::post('/clients-region-store', [ClientRegionController::class, 'clientsRegionStore'])->name('clientsRegion_Store');
 Route::get('/clients-region-edit/{id}', [ClientRegionController::class, 'clientsRegionEdit'])->name('clientsRegion_Edit');
 Route::put('/clients-region-update/{id}', [ClientRegionController::class, 'clientsRegionUpdate'])->name('clientsRegion_Update');
//  Route::get('/clients-region-destory/{id}', [ClientRegionController::class, 'clientsRegionDestory'])->name('clientsRegion_Destory');
//  Route::post('/clients-region-action-update/{id}', [ClientRegionController::class, 'clientsRegionActionUpdate'])->name('clientsRegion_Action');


  // ------client-second region ------
  Route::get('/clients-second', [ClientRegionSecondController::class, 'clientsSecondIndex'])->name('clientsSecond_index');
  // Route::get('/clients-second-add', [ClientRegionSecondController::class, 'clientsSecondAdd'])->name('clientsSecond_Add');
  // Route::post('/clients-second-store', [ClientRegionSecondController::class, 'clientsSecondStore'])->name('clientsSecond_Store');
  Route::get('/clients-second-edit/{id}', [ClientRegionSecondController::class, 'clientsSecondEdit'])->name('clientsSecond_Edit');
  Route::put('/clients-second-update/{id}', [ClientRegionSecondController::class, 'clientsSecondUpdate'])->name('clientsSecond_Update');
  // Route::get('/clients-second-destory/{id}', [ClientRegionSecondController::class, 'clientsSecondDestory'])->name('clientsSecond_Destory');
  // Route::post('/clients-second-action-update/{id}', [ClientRegionSecondController::class, 'clientsSecondActionUpdate'])->name('clientsSecond_Action');


   // ------client-second region ------
   Route::get('/clients-map', [ClientMapController::class, 'clientsMapIndex'])->name('clientsMap_index');
   Route::get('/clients-map-edit/{id}', [ClientMapController::class, 'clientsMapEdit'])->name('clientsMap_Edit');
   Route::put('/clients-map-update/{id}', [ClientMapController::class, 'clientsMapUpdate'])->name('clientsMap_Update');

    // ------Leadership  ------
    Route::get('/leadership', [LeaderShipController::class, 'leadershipIndex'])->name('leadership_index');
    Route::get('/leadership-edit/{id}', [LeaderShipController::class, 'leadershipEdit'])->name('leadership_Edit');
    Route::put('/leadership-update/{id}', [LeaderShipController::class, 'leadershipUpdate'])->name('leadership_Update');

  // ------Leadership  ------
  Route::get('/number', [NumberController::class, 'numberIndex'])->name('Number_index');
  Route::get('/number-edit/{id}', [NumberController::class, 'numberEdit'])->name('Number_Edit');
  Route::put('/number-update/{id}', [NumberController::class, 'numberUpdate'])->name('Number_Update');

   // ------Number-Details ------
   Route::get('/number-details', [NumberDetailsController::class, 'numberDetailsIndex'])->name('numberDetails_index');
   Route::get('/number-details-edit/{id}', [NumberDetailsController::class, 'numberDetailsEdit'])->name('numberDetails_Edit');
   Route::put('/number-details-update/{id}', [NumberDetailsController::class, 'numberDetailsUpdate'])->name('numberDetails_Update');
  

      // ------Home-page-icon ------
    Route::get('/home-icon', [HomePageIconController::class, 'homeIconIndex'])->name('homeIcon_index');
    // Route::get('/home-icon-add', [HomePageIconController::class, 'homeIconAdd'])->name('homeIcon_Add');
    // Route::post('/home-icon-store', [HomePageIconController::class, 'homeIconStore'])->name('homeIcon_Store');
    Route::get('/home-icon-edit/{id}', [HomePageIconController::class, 'homeIconEdit'])->name('homeIcon_Edit');
    Route::put('/home-icon-update/{id}', [HomePageIconController::class, 'homeIconUpdate'])->name('homeIcon_Update');
    // Route::get('/home-icon-destory/{id}', [HomePageIconController::class, 'homeIconDestory'])->name('homeIcon_Destory');
    // Route::post('/home-icon-update/{id}', [HomePageIconController::class, 'homeIconActionUpdate'])->name('homeIcon_Action');

    // ------Contact Us------
  Route::get('/contact-page', [ContactUsController::class, 'contactIndex'])->name('contact_index');
  Route::get('/contact-edit/{id}', [ContactUsController::class, 'contactEdit'])->name('contact_Edit');
  Route::put('/contact-update/{id}', [ContactUsController::class, 'contactUpdate'])->name('contact_Update');

  // ------Production ------
  Route::get('/production', [ProductionController::class, 'productionIndex'])->name('production_index');
  Route::get('/production-add', [ProductionController::class, 'productionAdd'])->name('production_Add');
  Route::post('/production-store', [ProductionController::class, 'productionStore'])->name('production_Store');
  Route::get('/production-edit/{id}', [ProductionController::class, 'productionEdit'])->name('production_Edit');
  Route::put('/production-update/{id}', [ProductionController::class, 'productionUpdate'])->name('production_Update');
  Route::get('/production-destory/{id}', [ProductionController::class, 'productionDestory'])->name('production_Destory');
  Route::post('/production-update/{id}', [ProductionController::class, 'productionActionUpdate'])->name('production_Action');

   // ------Production-title ------
   Route::get('/production-title', [ProductionController::class, 'production_title'])->name('production_title');
   Route::get('/production-title-edit/{id}', [ProductionController::class, 'production_title_Edit'])->name('production_title_Edit');
   Route::put('/production-title-update/{id}', [ProductionController::class, 'production_title_update'])->name('production_title_update');


    // ------In House ------
    Route::get('/in-house', [InHouseController::class, 'inhouseIndex'])->name('inhouse_index');
    Route::get('/in-house-edit/{id}', [InHouseController::class, 'inhouseEdit'])->name('inhouse_Edit');
    Route::put('/in-house-update/{id}', [InHouseController::class, 'inhouseUpdate'])->name('inhouse_Update');

    Route::get('/contact-list', [ContactFormController::class, 'contactlisting'])->name('contact_listing');

});









//  Route::middleware(['auth', 'staff-service:staff'])->group(function () {
//     Route::get('/admin/home', [AdminController::class, 'staff'])->name('staff.home');
//  });
