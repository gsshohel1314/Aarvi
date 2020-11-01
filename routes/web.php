<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

//website routes start
Route::get('/', 'WebsiteController@index')->name('');
Route::get('about', 'WebsiteController@about')->name('');
Route::get('team', 'WebsiteController@team')->name('');
Route::get('project', 'WebsiteController@project')->name('');
Route::get('media/gallery', 'WebsiteController@gallery')->name('');
Route::get('media/video', 'WebsiteController@video_gallery')->name('');
Route::get('media/instagram', 'WebsiteController@instagram')->name('');
Route::get('event', 'WebsiteController@event')->name('');
Route::get('event/past', 'WebsiteController@event_past')->name('');
Route::get('involved', 'WebsiteController@involved')->name('');
Route::get('volunteer', 'WebsiteController@volunteer')->name('');
Route::get('career', 'WebsiteController@career')->name('');
Route::get('fundrise', 'WebsiteController@fundrise')->name('');
Route::get('award', 'WebsiteController@award')->name('');
Route::get('award/details/{award_slug}', 'WebsiteController@award_details')->name('');
Route::get('contact', 'WebsiteController@contact')->name('');
Route::get('donate', 'WebsiteController@donate')->name('');

Route::get('award/apply', 'WebsiteController@apply_award')->name('');

Route::post('contact/submit', 'ProcessController@contact')->name('');
Route::post('newsletter/submit', 'ProcessController@newsletter')->name('');
Route::post('award/apply/submit', 'ProcessController@apply_award')->name('');
Route::post('volunteer/registration/submit', 'ProcessController@volunteer_registration')->name('');
//admin panel routes start
Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard', 'DashboardController@index')->name('');

Route::get('dashboard/user', 'UserController@index')->name('');
Route::get('dashboard/user/add', 'UserController@add')->name('');
Route::get('dashboard/user/edit/{user}', 'UserController@edit')->name('');
Route::get('dashboard/user/view/{user}', 'UserController@view')->name('');
Route::post('dashboard/user/submit', 'UserController@insert')->name('');
Route::post('dashboard/user/update', 'UserController@update')->name('');
Route::post('dashboard/user/softdelete', 'UserController@softdelete')->name('');
Route::post('dashboard/user/restore', 'UserController@restore')->name('');
Route::post('dashboard/user/delete', 'UserController@delete')->name('');

Route::get('dashboard/banner', 'BannerController@index')->name('');
Route::get('dashboard/banner/add', 'BannerController@add')->name('');
Route::get('dashboard/banner/edit/{slug}', 'BannerController@edit')->name('');
Route::get('dashboard/banner/view/{slug}', 'BannerController@view')->name('');
Route::post('dashboard/banner/submit', 'BannerController@insert')->name('');
Route::post('dashboard/banner/update', 'BannerController@update')->name('');
Route::post('dashboard/banner/publish', 'BannerController@publish')->name('');
Route::post('dashboard/banner/unpublish', 'BannerController@unpublish')->name('');
Route::post('dashboard/banner/softdelete', 'BannerController@softdelete')->name('');
Route::post('dashboard/banner/restore', 'BannerController@restore')->name('');
Route::post('dashboard/banner/delete', 'BannerController@delete')->name('');

Route::get('dashboard/manage/basic', 'ManageController@basic')->name('');
Route::post('dashboard/manage/basic/update', 'ManageController@update_basic')->name('');
Route::get('dashboard/manage/social', 'ManageController@social_media')->name('');
Route::post('dashboard/manage/social/update', 'ManageController@update_social_media')->name('');
Route::get('dashboard/manage/contact', 'ManageController@contact')->name('');
Route::post('dashboard/manage/contact/update', 'ManageController@update_contact')->name('');
Route::get('dashboard/manage/copyright', 'ManageController@copyright')->name('');
Route::post('dashboard/manage/copyright/update', 'ManageController@update_copyright')->name('');

Route::get('dashboard/page', 'PageController@index')->name('');

Route::get('dashboard/page/content', 'PageContentController@index')->name('');
Route::get('dashboard/page/content/edit/{slug}', 'PageContentController@edit')->name('');
Route::post('dashboard/page/content/update', 'PageContentController@update')->name('');

Route::get('dashboard/gallery/category', 'GalleryCategoryController@index')->name('');
Route::get('dashboard/gallery/category/add', 'GalleryCategoryController@add')->name('');
Route::get('dashboard/gallery/category/edit/{slug}', 'GalleryCategoryController@edit')->name('');
Route::get('dashboard/gallery/category/view/{slug}', 'GalleryCategoryController@view')->name('');
Route::post('dashboard/gallery/category/submit', 'GalleryCategoryController@insert')->name('');
Route::post('dashboard/gallery/category/update', 'GalleryCategoryController@update')->name('');
Route::post('dashboard/gallery/category/softdelete', 'GalleryCategoryController@softdelete')->name('');
Route::post('dashboard/gallery/category/restore', 'GalleryCategoryController@restore')->name('');
Route::post('dashboard/gallery/category/delete', 'GalleryCategoryController@delete')->name('');

Route::get('dashboard/gallery', 'GalleryController@index')->name('');
Route::get('dashboard/gallery/add', 'GalleryController@add')->name('');
Route::get('dashboard/gallery/edit/{slug}', 'GalleryController@edit')->name('');
Route::get('dashboard/gallery/view/{slug}', 'GalleryController@view')->name('');
Route::post('dashboard/gallery/submit', 'GalleryController@insert')->name('');
Route::post('dashboard/gallery/update', 'GalleryController@update')->name('');
Route::post('dashboard/gallery/softdelete', 'GalleryController@softdelete')->name('');
Route::post('dashboard/gallery/restore', 'GalleryController@restore')->name('');
Route::post('dashboard/gallery/delete', 'GalleryController@delete')->name('');

Route::get('dashboard/blog/post', 'BlogPostController@index')->name('');
Route::get('dashboard/blog/post/add', 'BlogPostController@add')->name('');
Route::get('dashboard/blog/post/edit/{slug}', 'BlogPostController@edit')->name('');
Route::get('dashboard/blog/post/view/{slug}', 'BlogPostController@view')->name('');
Route::post('dashboard/blog/post/submit', 'BlogPostController@insert')->name('');
Route::post('dashboard/blog/post/update', 'BlogPostController@update')->name('');
Route::post('dashboard/blog/post/softdelete', 'BlogPostController@softdelete')->name('');
Route::post('dashboard/blog/post/restore', 'BlogPostController@restore')->name('');
Route::post('dashboard/blog/post/delete', 'BlogPostController@delete')->name('');

Route::get('dashboard/blog/category', 'BlogCategoryController@index')->name('');
Route::get('dashboard/blog/category/add', 'BlogCategoryController@add')->name('');
Route::get('dashboard/blog/category/edit/{slug}', 'BlogCategoryController@edit')->name('');
Route::get('dashboard/blog/category/view/{slug}', 'BlogCategoryController@view')->name('');
Route::post('dashboard/blog/category/submit', 'BlogCategoryController@insert')->name('');
Route::post('dashboard/blog/category/update', 'BlogCategoryController@update')->name('');
Route::post('dashboard/blog/category/softdelete', 'BlogCategoryController@softdelete')->name('');
Route::post('dashboard/blog/category/restore', 'BlogCategoryController@restore')->name('');
Route::post('dashboard/blog/category/delete', 'BlogCategoryController@delete')->name('');

Route::get('dashboard/blog/tag', 'TagController@index')->name('');
Route::get('dashboard/blog/tag/add', 'TagController@add')->name('');
Route::get('dashboard/blog/tag/edit/{slug}', 'TagController@edit')->name('');
Route::get('dashboard/blog/tag/view/{slug}', 'TagController@view')->name('');
Route::post('dashboard/blog/tag/submit', 'TagController@insert')->name('');
Route::post('dashboard/blog/tag/update', 'TagController@update')->name('');
Route::post('dashboard/blog/tag/softdelete', 'TagController@softdelete')->name('');
Route::post('dashboard/blog/tag/restore', 'TagController@restore')->name('');
Route::post('dashboard/blog/tag/delete', 'TagController@delete')->name('');

Route::get('dashboard/service', 'ServiceController@index')->name('');
Route::get('dashboard/service/add', 'ServiceController@add')->name('');
Route::get('dashboard/service/edit/{slug}', 'ServiceController@edit')->name('');
Route::get('dashboard/service/view/{slug}', 'ServiceController@view')->name('');
Route::post('dashboard/service/submit', 'ServiceController@insert')->name('');
Route::post('dashboard/service/update', 'ServiceController@update')->name('');
Route::post('dashboard/service/softdelete', 'ServiceController@softdelete')->name('');
Route::post('dashboard/service/restore', 'ServiceController@restore')->name('');
Route::post('dashboard/service/delete', 'ServiceController@delete')->name('');

Route::get('dashboard/video', 'VideoController@index')->name('');
Route::get('dashboard/video/add', 'VideoController@add')->name('');
Route::get('dashboard/video/edit/{slug}', 'VideoController@edit')->name('');
Route::get('dashboard/video/view/{slug}', 'VideoController@view')->name('');
Route::post('dashboard/video/submit', 'VideoController@insert')->name('');
Route::post('dashboard/video/update', 'VideoController@update')->name('');
Route::post('dashboard/video/softdelete', 'VideoController@softdelete')->name('');
Route::post('dashboard/video/restore', 'VideoController@restore')->name('');
Route::post('dashboard/video/delete', 'VideoController@delete')->name('');

Route::get('dashboard/video/category', 'VideoCategoryController@index')->name('');
Route::get('dashboard/video/category/add', 'VideoCategoryController@add')->name('');
Route::get('dashboard/video/category/edit/{slug}', 'VideoCategoryController@edit')->name('');
Route::post('dashboard/video/category/submit', 'VideoCategoryController@insert')->name('');
Route::post('dashboard/video/category/update', 'VideoCategoryController@update')->name('');
Route::post('dashboard/video/category/softdelete', 'VideoCategoryController@softdelete')->name('');
Route::post('dashboard/video/category/restore', 'VideoCategoryController@restore')->name('');
Route::post('dashboard/video/category/delete', 'VideoCategoryController@delete')->name('');

Route::get('dashboard/event', 'EventController@index')->name('');
Route::get('dashboard/event/add', 'EventController@add')->name('');
Route::get('dashboard/event/edit/{slug}', 'EventController@edit')->name('');
Route::get('dashboard/event/view/{slug}', 'EventController@view')->name('');
Route::post('dashboard/event/submit', 'EventController@insert')->name('');
Route::post('dashboard/event/update', 'EventController@update')->name('');
Route::post('dashboard/event/softdelete', 'EventController@softdelete')->name('');
Route::post('dashboard/event/restore', 'EventController@restore')->name('');
Route::post('dashboard/event/delete', 'EventController@delete')->name('');

Route::get('dashboard/award', 'AwardController@index')->name('');
Route::get('dashboard/award/add', 'AwardController@add')->name('');
Route::get('dashboard/award/edit/{slug}', 'AwardController@edit')->name('');
Route::get('dashboard/award/view/{slug}', 'AwardController@view')->name('');
Route::post('dashboard/award/submit', 'AwardController@insert')->name('');
Route::post('dashboard/award/update', 'AwardController@update')->name('');
// Route::post('dashboard/award/softdelete', 'AwardController@softdelete')->name('');
// Route::post('dashboard/award/restore', 'AwardController@restore')->name('');
Route::post('dashboard/award/delete', 'AwardController@delete')->name('');

Route::get('dashboard/team', 'TeamsController@index')->name('');
Route::get('dashboard/team/add', 'TeamsController@add')->name('');
Route::get('dashboard/team/edit/{id}', 'TeamsController@edit')->name('');
Route::get('dashboard/team/view/{id}', 'TeamsController@view')->name('');
Route::post('dashboard/team/submit', 'TeamsController@insert')->name('');
Route::post('dashboard/team/update', 'TeamsController@update')->name('');
Route::post('dashboard/team/softdelete', 'TeamsController@softdelete')->name('');
Route::post('dashboard/team/restore', 'TeamsController@restore')->name('');
Route::post('dashboard/team/delete', 'TeamsController@delete')->name('');

Route::get('dashboard/team/category', 'TeamCategoryController@index')->name('');
Route::get('dashboard/team/category/add', 'TeamCategoryController@add')->name('');
Route::get('dashboard/team/category/edit/{slug}', 'TeamCategoryController@edit')->name('');
Route::get('dashboard/team/category/view/{slug}', 'TeamCategoryController@view')->name('');
Route::post('dashboard/team/category/submit', 'TeamCategoryController@insert')->name('');
Route::post('dashboard/team/category/update', 'TeamCategoryController@update')->name('');
Route::post('dashboard/team/category/softdelete', 'TeamCategoryController@softdelete')->name('');
Route::post('dashboard/team/category/restore', 'TeamCategoryController@restore')->name('');
Route::post('dashboard/team/category/delete', 'TeamCategoryController@delete')->name('');

Route::get('dashboard/partner/category', 'PartnerCategoryController@index')->name('');
Route::get('dashboard/partner/category/add', 'PartnerCategoryController@add')->name('');
Route::get('dashboard/partner/category/edit/{slug}', 'PartnerCategoryController@edit')->name('');
Route::get('dashboard/partner/category/view/{slug}', 'PartnerCategoryController@view')->name('');
Route::post('dashboard/partner/category/submit', 'PartnerCategoryController@insert')->name('');
Route::post('dashboard/partner/category/update', 'PartnerCategoryController@update')->name('');
Route::post('dashboard/partner/category/softdelete', 'PartnerCategoryController@softdelete')->name('');
Route::post('dashboard/partner/category/restore', 'PartnerCategoryController@restore')->name('');
Route::post('dashboard/partner/category/delete', 'PartnerCategoryController@delete')->name('');

Route::get('dashboard/partner', 'PartnerController@index')->name('');
Route::get('dashboard/partner/add', 'PartnerController@add')->name('');
Route::get('dashboard/partner/edit/{slug}', 'PartnerController@edit')->name('');
Route::get('dashboard/partner/view/{slug}', 'PartnerController@view')->name('');
Route::post('dashboard/partner/submit', 'PartnerController@insert')->name('');
Route::post('dashboard/partner/update', 'PartnerController@update')->name('');
Route::post('dashboard/partner/softdelete', 'PartnerController@softdelete')->name('');
Route::post('dashboard/partner/restore', 'PartnerController@restore')->name('');
Route::post('dashboard/partner/delete', 'PartnerController@delete')->name('');

Route::get('dashboard/client', 'ClientController@index')->name('');
Route::get('dashboard/client/add', 'ClientController@add')->name('');
Route::get('dashboard/client/edit/{slug}', 'ClientController@edit')->name('');
Route::get('dashboard/client/view/{slug}', 'ClientController@view')->name('');
Route::post('dashboard/client/submit', 'ClientController@insert')->name('');
Route::post('dashboard/client/update', 'ClientController@update')->name('');
Route::post('dashboard/client/softdelete', 'ClientController@softdelete')->name('');
Route::post('dashboard/client/restore', 'ClientController@restore')->name('');
Route::post('dashboard/client/delete', 'ClientController@delete')->name('');

Route::get('dashboard/testimonial', 'TestimonialController@index')->name('');
Route::get('dashboard/testimonial/add', 'TestimonialController@add')->name('');
Route::get('dashboard/testimonial/edit/{slug}', 'TestimonialController@edit')->name('');
Route::get('dashboard/testimonial/view/{slug}', 'TestimonialController@view')->name('');
Route::post('dashboard/testimonial/submit', 'TestimonialController@insert')->name('');
Route::post('dashboard/testimonial/update', 'TestimonialController@update')->name('');
Route::post('dashboard/testimonial/softdelete', 'TestimonialController@softdelete')->name('');
Route::post('dashboard/testimonial/restore', 'TestimonialController@restore')->name('');
Route::post('dashboard/testimonial/delete', 'TestimonialController@delete')->name('');

Route::get('dashboard/faq', 'FaqController@index')->name('');
Route::get('dashboard/faq/add', 'FaqController@add')->name('');
Route::get('dashboard/faq/edit/{slug}', 'FaqController@edit')->name('');
Route::get('dashboard/faq/view/{slug}', 'FaqController@view')->name('');
Route::post('dashboard/faq/submit', 'FaqController@insert')->name('');
Route::post('dashboard/faq/update', 'FaqController@update')->name('');
Route::post('dashboard/faq/softdelete', 'FaqController@softdelete')->name('');
Route::post('dashboard/faq/restore', 'FaqController@restore')->name('');
Route::post('dashboard/faq/delete', 'FaqController@delete')->name('');

Route::get('dashboard/contactus', 'ContactUsController@index')->name('');
Route::get('dashboard/contactus/view/{slug}', 'ContactUsController@view')->name('');
Route::post('dashboard/contactus/softdelete', 'ContactUsController@softdelete')->name('');
Route::post('dashboard/contactus/softdelete', 'ContactUsController@softdelete')->name('');
Route::post('dashboard/contactus/restore', 'ContactUsController@restore')->name('');
Route::post('dashboard/contactus/delete', 'ContactUsController@delete')->name('');
Route::get('dashboard/contactus/allprint', 'ContactUsController@allprint')->name('');
Route::get('dashboard/contactus/print/{slug}', 'ContactUsController@print')->name('');
Route::get('dashboard/contactus/excel', 'ContactUsController@export')->name('');
Route::get('dashboard/contactus/pdf', 'ContactUsController@pdf')->name('');

Route::get('dashboard/recycle', 'RecycleController@index')->name('');
Route::get('dashboard/recycle/user', 'RecycleController@user')->name('');
Route::get('dashboard/recycle/banner', 'RecycleController@banner')->name('');
Route::get('dashboard/recycle/contactus', 'RecycleController@contactus')->name('');
Route::get('dashboard/recycle/service', 'RecycleController@service')->name('');
Route::get('dashboard/recycle/video', 'RecycleController@video')->name('');
Route::get('dashboard/recycle/video/category', 'RecycleController@videoCategory')->name('');
Route::get('dashboard/recycle/event', 'RecycleController@event')->name('');
Route::get('dashboard/recycle/team', 'RecycleController@team')->name('');
Route::get('dashboard/recycle/team/category', 'RecycleController@teamCategory')->name('');
Route::get('dashboard/recycle/partner', 'RecycleController@partner')->name('');
Route::get('dashboard/recycle/partner/category', 'RecycleController@partnerCategory')->name('');
Route::get('dashboard/recycle/client', 'RecycleController@client')->name('');
Route::get('dashboard/recycle/gallery', 'RecycleController@gallery')->name('');
Route::get('dashboard/recycle/gallery/category', 'RecycleController@gallery_category')->name('');
Route::get('dashboard/recycle/testimonial', 'RecycleController@testimonial')->name('');
Route::get('dashboard/recycle/faq', 'RecycleController@faq')->name('');
Route::get('dashboard/recycle/blog/post', 'RecycleController@post')->name('');
Route::get('dashboard/recycle/blog/category', 'RecycleController@blog_category')->name('');
Route::get('dashboard/recycle/blog/tag', 'RecycleController@tag')->name('');
Route::get('dashboard/recycle/projecttype', 'RecycleController@projecttype')->name('');
Route::get('dashboard/recycle/project', 'RecycleController@project')->name('');
Route::get('dashboard/recycle/about', 'RecycleController@about')->name('');
Route::get('dashboard/recycle/career', 'RecycleController@career')->name('');

Route::get('dashboard/newsletter/subscribe', 'NewsletterSubscribeController@index')->name('');

Route::get('dashboard/award/registration', 'AwardRegistrationController@index')->name('');
Route::get('dashboard/award/registration/view/{slug}', 'AwardRegistrationController@view')->name('');

Route::get('dashboard/profile', 'ProfileController@index')->name('');
Route::get('dashboard/permission', 'DashboardController@permission')->name('');


Route::get('dashboard/body_texts', 'BodyTextsController@index')->name('');
Route::post('dashboard/body_texts', 'BodyTextsController@update')->name('');

Route::get('dashboard/icons', 'IconsController@index')->name('');
Route::post('dashboard/icons', 'IconsController@update')->name('');

Route::get('dashboard/projecttype', 'ProjectTypeController@index')->name('');
Route::get('dashboard/projecttype/add', 'ProjectTypeController@add')->name('');
Route::get('dashboard/projecttype/edit/{id}', 'ProjectTypeController@edit')->name('');
Route::get('dashboard/projecttype/view/{id}', 'ProjectTypeController@view')->name('');
Route::post('dashboard/projecttype/submit', 'ProjectTypeController@insert')->name('');
Route::post('dashboard/projecttype/update', 'ProjectTypeController@update')->name('');
Route::post('dashboard/projecttype/softdelete', 'ProjectTypeController@softdelete')->name('');
Route::post('dashboard/projecttype/restore', 'ProjectTypeController@restore')->name('');
Route::post('dashboard/projecttype/delete', 'ProjectTypeController@delete')->name('');

Route::get('dashboard/project', 'ProjectController@index')->name('');
Route::get('dashboard/project/add', 'ProjectController@add')->name('');
Route::get('dashboard/project/edit/{id}', 'ProjectController@edit')->name('');
Route::get('dashboard/project/view/{id}', 'ProjectController@view')->name('');
Route::post('dashboard/project/submit', 'ProjectController@insert')->name('');
Route::post('dashboard/project/update', 'ProjectController@update')->name('');
Route::post('dashboard/project/softdelete', 'ProjectController@softdelete')->name('');
Route::post('dashboard/project/restore', 'ProjectController@restore')->name('');
Route::post('dashboard/project/delete', 'ProjectController@delete')->name('');

Route::get('dashboard/about', 'AboutController@index')->name('');
Route::get('dashboard/about/add', 'AboutController@add')->name('');
Route::get('dashboard/about/edit/{slug}', 'AboutController@edit')->name('');
Route::get('dashboard/about/view/{slug}', 'AboutController@view')->name('');
Route::post('dashboard/about/submit', 'AboutController@insert')->name('');
Route::post('dashboard/about/update', 'AboutController@update')->name('');
Route::post('dashboard/about/softdelete', 'AboutController@softdelete')->name('');
Route::post('dashboard/about/restore', 'AboutController@restore')->name('');
Route::post('dashboard/about/delete', 'AboutController@delete')->name('');

Route::get('dashboard/career', 'CareerController@index')->name('');
Route::get('dashboard/career/add', 'CareerController@add')->name('');
Route::get('dashboard/career/edit/{id}', 'CareerController@edit')->name('');
Route::get('dashboard/career/view/{id}', 'CareerController@view')->name('');
Route::post('dashboard/career/submit', 'CareerController@insert')->name('');
Route::post('dashboard/career/update', 'CareerController@update')->name('');
Route::post('dashboard/career/softdelete', 'CareerController@softdelete')->name('');
Route::post('dashboard/career/restore', 'CareerController@restore')->name('');
Route::post('dashboard/career/delete', 'CareerController@delete')->name('');

Route::get('dashboard/fund', 'FundController@index')->name('');
Route::get('dashboard/fund/add', 'FundController@add')->name('');
Route::get('dashboard/fund/edit/{id}', 'FundController@edit')->name('');
Route::get('dashboard/fund/view/{id}', 'FundController@view')->name('');
Route::post('dashboard/fund/submit', 'FundController@insert')->name('');
Route::post('dashboard/fund/update', 'FundController@update')->name('');
Route::post('dashboard/fund/softdelete', 'FundController@softdelete')->name('');
Route::post('dashboard/fund/restore', 'FundController@restore')->name('');
Route::post('dashboard/fund/delete', 'FundController@delete')->name('');

Route::get('dashboard/fundcost', 'FundcostController@index')->name('');
Route::get('dashboard/fundcost/add', 'FundcostController@add')->name('');
Route::get('dashboard/fundcost/edit/{id}', 'FundcostController@edit')->name('');
Route::get('dashboard/fundcost/view/{id}', 'FundcostController@view')->name('');
Route::post('dashboard/fundcost/submit', 'FundcostController@insert')->name('');
Route::post('dashboard/fundcost/update', 'FundcostController@update')->name('');
Route::post('dashboard/fundcost/softdelete', 'FundcostController@softdelete')->name('');
Route::post('dashboard/fundcost/restore', 'FundcostController@restore')->name('');
Route::post('dashboard/fundcost/delete', 'FundcostController@delete')->name('');

Route::get('dashboard/prefund', 'PrefundController@index')->name('');
Route::get('dashboard/prefund/add', 'PrefundController@add')->name('');
Route::get('dashboard/prefund/edit/{id}', 'PrefundController@edit')->name('');
Route::get('dashboard/prefund/view/{id}', 'PrefundController@view')->name('');
Route::post('dashboard/prefund/submit', 'PrefundController@insert')->name('');
Route::post('dashboard/prefund/update', 'PrefundController@update')->name('');
Route::post('dashboard/prefund/softdelete', 'PrefundController@softdelete')->name('');
Route::post('dashboard/prefund/restore', 'PrefundController@restore')->name('');
Route::post('dashboard/prefund/delete', 'PrefundController@delete')->name('');

Route::get('dashboard/volunteer-history', 'VolunteerHistoryController@index')->name('');
Route::get('dashboard/volunteer-history/add', 'VolunteerHistoryController@add')->name('');
Route::get('dashboard/volunteer-history/edit/{id}', 'VolunteerHistoryController@edit')->name('');
Route::get('dashboard/volunteer-history/view/{id}', 'VolunteerHistoryController@view')->name('');
Route::post('dashboard/volunteer-history/submit', 'VolunteerHistoryController@insert')->name('');
Route::post('dashboard/volunteer-history/update', 'VolunteerHistoryController@update')->name('');
Route::post('dashboard/volunteer-history/softdelete', 'VolunteerHistoryController@softdelete')->name('');
Route::post('dashboard/volunteer-history/restore', 'VolunteerHistoryController@restore')->name('');
Route::post('dashboard/volunteer-history/delete', 'VolunteerHistoryController@delete')->name('');

Route::get('dashboard/volunteer-skill', 'VolunteerSkillController@index')->name('');
Route::get('dashboard/volunteer-skill/add', 'VolunteerSkillController@add')->name('');
Route::get('dashboard/volunteer-skill/edit/{id}', 'VolunteerSkillController@edit')->name('');
Route::get('dashboard/volunteer-skill/view/{id}', 'VolunteerSkillController@view')->name('');
Route::post('dashboard/volunteer-skill/submit', 'VolunteerSkillController@insert')->name('');
Route::post('dashboard/volunteer-skill/update', 'VolunteerSkillController@update')->name('');
Route::post('dashboard/volunteer-skill/softdelete', 'VolunteerSkillController@softdelete')->name('');
Route::post('dashboard/volunteer-skill/restore', 'VolunteerSkillController@restore')->name('');
Route::post('dashboard/volunteer-skill/delete', 'VolunteerSkillController@delete')->name('');

Route::get('dashboard/cause', 'CauseController@index')->name('');
Route::get('dashboard/cause/add', 'CauseController@add')->name('');
Route::get('dashboard/cause/edit/{id}', 'CauseController@edit')->name('');
Route::get('dashboard/cause/view/{id}', 'CauseController@view')->name('');
Route::post('dashboard/cause/submit', 'CauseController@insert')->name('');
Route::post('dashboard/cause/update', 'CauseController@update')->name('');
Route::post('dashboard/cause/softdelete', 'CauseController@softdelete')->name('');
Route::post('dashboard/cause/restore', 'CauseController@restore')->name('');
Route::post('dashboard/cause/delete', 'CauseController@delete')->name('');

Route::get('dashboard/mission', 'OurMissionController@index')->name('');
Route::get('dashboard/mission/add', 'OurMissionController@add')->name('');
Route::get('dashboard/mission/edit/{id}', 'OurMissionController@edit')->name('');
Route::post('dashboard/mission/submit', 'OurMissionController@insert')->name('');
Route::post('dashboard/mission/update', 'OurMissionController@update')->name('');
Route::post('dashboard/mission/delete', 'OurMissionController@delete')->name('');

Route::get('dashboard/settings/all', 'SettingController@all')->name('');
Route::get('dashboard/settings/home', 'SettingController@home')->name('');
Route::get('dashboard/settings/about', 'SettingController@about')->name('');
Route::get('dashboard/settings/volunteer', 'SettingController@volunteer')->name('');
Route::get('dashboard/settings/career', 'SettingController@career')->name('');
Route::get('dashboard/settings/fundrise', 'SettingController@fundrise')->name('');
Route::get('dashboard/settings/apply', 'SettingController@apply')->name('');
Route::get('dashboard/settings/contactus', 'SettingController@contactus')->name('');
Route::get('dashboard/settings/footer', 'SettingController@footer')->name('');
Route::post('dashboard/settings/update', 'SettingController@update')->name('');