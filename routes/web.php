<?php


//use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\admin\BankController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\hotel\RoomController;
use App\Http\Controllers\web\SearchController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\agent\AgentController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\admin\SourceController;
use App\Http\Controllers\admin\WalletController;
use App\Http\Controllers\hotel\BranchController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\agent\ProfileController;
use App\Http\Controllers\hotel\BookingController;
use App\Http\Controllers\admin\CurrencyController;
use App\Http\Controllers\agent\RechargeController;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\AdminTourController;
use App\Http\Controllers\admin\TourHotelController;
use App\Http\Controllers\agent\AgentAuthController;
use App\Http\Controllers\admin\AdminTableController;
use App\Http\Controllers\admin\CommissionController;
use App\Http\Controllers\restaurant\TableController;
use App\Http\Controllers\admin\AdminOutletController;
use App\Http\Controllers\restaurant\OutletController;
use App\Http\Controllers\admin\AdminProfileController;
//use App\Http\Controllers\SearchController;
//use App\Http\Controllers\VendorController;


use App\Http\Controllers\agent\HotelBookingController;
use App\Http\Controllers\admin\AdminFoodMenuController;
use App\Http\Controllers\admin\AdminTimeSlotController;

use App\Http\Controllers\admin\FlightBookingController;

use App\Http\Controllers\restaurant\FoodMenuController;
use App\Http\Controllers\restaurant\TimeSlotController;
use App\Http\Controllers\admin\AdminRestaurantController;
use App\Http\Controllers\admin\HotelCommissionController;
use App\Http\Controllers\authentication\VendorController;
use App\Http\Controllers\restaurant\RestaurantController;
use App\Http\Controllers\admin\AdminHotelBookingController;
use App\Http\Controllers\restaurant\TableBookingController;
use App\Http\Controllers\agent\BookedCustomerInfoController;
use App\Http\Controllers\agent\FlightBookingAgentController;
use App\Http\Controllers\restaurant\VendorProfileController;
use App\Http\Controllers\agent\AgentRestaurantBookingController;
use App\Http\Controllers\restaurant\RestaurantBookingController;
use App\Http\Controllers\admin\AdminBookedCustomerInfoController;


// Route::get('/strg_lnk', function () {
//     Artisan::call('storage:link');  
// });

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
  
    dd("Cache Clear All");
});

//===================Web routes===============
Route::get('/', [HomeController::class, 'IndexView'])->name('index.user');
Route::get('/about', [HomeController::class, 'AboutView']);
Route::get('/book_air_tickets', [HomeController::class, 'BookAirTicketsView']);
Route::get('/reserve_hotel', [HomeController::class, 'ReserveHotelView']);
Route::get('/book_train_tickets', [HomeController::class, 'BookTrainTicketsView']);
Route::get('/book_bus_tickets', [HomeController::class, 'BookBusTicketsView']);
Route::get('/restaurant_reservasion', [HomeController::class, 'RestaurantReservasionView']);
Route::get('/tour_service', [HomeController::class, 'TourServiceView']);
Route::get('/contact', [HomeController::class, 'ContactView']);
Route::get('/faqs', [HomeController::class, 'FaqView']);
Route::get('/privacy_policy', [HomeController::class, 'PrivacyPolicyView']);
Route::get('/tour_details', [HomeController::class, 'TourDetailsView']);
Route::get('/hotel_details', [HomeController::class, 'HotelDetailsView']);
Route::get('/restaurant_details', [HomeController::class, 'RestaurantDetailsView']);
Route::get('/search_result', [HomeController::class, 'SearchResultView']);
Route::get('/tour_list', [HomeController::class, 'TourListView']);
Route::get('/search_result', [SearchController::class, 'SearchResultView']);



//user auth
Route::get('/login', [HomeController::class, 'LoginView']);

// search hotel
Route::get('/search_hotel', [SearchController::class, 'SearchHotel'])->name('search.SearchHotel');
Route::get('/branch_wise_room_list/{id}', [SearchController::class, 'BranchWiseRoomList']);
//===================/Web routes===============

//=========Vendor auth======
Route::prefix('vendor/')->group(function () {
    Route::get('login', [VendorController::class, 'LoginView']);
    Route::post('login', [VendorController::class, 'LogIn'])->name('vendor.login');
    Route::get('register', [VendorController::class, 'RegisterView']);
    Route::post('register', [VendorController::class, 'Register'])->name('vendor.register');
    Route::get('logout', [VendorController::class, 'onLogout']);
});
//=========/Vendor auth======

//===================vendor_hotel===============
Route::group(['prefix' => 'vendor/hotel', 'middleware' => ['vendor_hotel_auth', 'prevent-back-history']], function () {
    // hotel invoice
    Route::get('invoice/{id}', [RoomController::class, 'HotelInvoiceView']);
    Route::get('cancel/{id}', [RoomController::class, 'CancelRoom']);

    //dashboard
    Route::get('dashboard', [VendorController::class, 'IndexView']);
    //Manage room
    Route::get('roomlist', [RoomController::class, 'RoomView']);
    Route::get('available_rooms', [RoomController::class, 'AvailableRoomsView']);
    Route::POST('search_rooms', [RoomController::class, 'RoomSearch'])->name('room.Search');
    Route::get('booked_rooms', [RoomController::class, 'BookedRoomsView']);
    Route::get('manage_room', [RoomController::class, 'ManageRoomView']);
    Route::get('manage_room/{id}', [RoomController::class, 'ManageRoomView']);
    Route::post('manage_room_process', [RoomController::class, 'ManageRoomProcess'])->name('room.ManageRoomProcess');
    Route::get('room/status/{status}/{id}', [RoomController::class, 'status']);
    Route::get('room/delete/{id}', [RoomController::class, 'DeleteRoom']);
    //Manage branch
    Route::get('branch_list', [BranchController::class, 'BranchListView']);
    Route::get('manage_branch', [BranchController::class, 'ManageBranchView']);
    Route::post('manage_branch_process', [BranchController::class, 'ManageBranchProcess'])->name('hotel.ManageBranchProcess.Vendor');
    Route::get('manage_branch/{id}', [BranchController::class, 'ManageBranchView']);
    Route::get('branch/delete/{id}', [BranchController::class, 'DeleteBranch']);
    Route::get('status/{status}/{id}', [BranchController::class, 'status']);
    Route::get('branch_view/{id}', [BranchController::class, 'BranchView']);
    //booking
    Route::get('booking_form/{id}', [BookingController::class, 'BookingFormView']);
    Route::post('manage_book_process_new', [BookingController::class, 'ManageBookProcess'])->name('room.ManageBookProcessHotel');
    Route::get('room/booking_status/{status}/{id}', [BookingController::class, 'UpdateBookingStatus']);

    //vendor profile
    Route::get('profile', [VendorProfileController::class, 'ProfileView']);
    Route::get('update_profile/{id}', [VendorProfileController::class, 'UpdateProfileView']);
    Route::post('update_profile', [VendorProfileController::class, 'UpdateProfile'])->name('vendor.UpdateProfile');
    //change password
    Route::post('change_password', [VendorProfileController::class, 'ChangePassword'])->name('vendor.ChangePassword');
});

//===================/vendor_hotel===============

//===================bus service===============
Route::group(['prefix' => 'vendor/bus', 'middleware' => ['vendor_bus_auth', 'prevent-back-history']], function () {
    Route::get('dashboard', [BusServiceController::class, 'IndexView']);
});
//===================/bus service===============

//===================train service===============
Route::group(['prefix' => 'vendor/train', 'middleware' => ['vendor_train_auth', 'prevent-back-history']], function () {
    Route::get('dashboard', [BusServiceController::class, 'IndexView']);
});
//===================/train service===============

//===================air  service===============
Route::group(['prefix' => 'vendor/air', 'middleware' => ['vendor_air_auth', 'prevent-back-history']], function () {
    Route::get('dashboard', [BusServiceController::class, 'IndexView']);
});
//===================/air service===============

//=================== restaurant service starts===============
Route::group(['prefix' => 'vendor/restaurant', 'middleware' => ['vendor_restaurant_auth', 'prevent-back-history']], function () {
    Route::get('dashboard', [RestaurantController::class, 'IndexView']);


    //resturantInvoice
    Route::get('invoice/{id}', [RestaurantBookingController::class, 'RestaurantInvoiceView']);
    //vendor profile
    Route::get('profile', [VendorProfileController::class, 'ProfileView']);
    Route::get('update_profile/{id}', [VendorProfileController::class, 'UpdateProfileView']);
    Route::post('update_profile', [VendorProfileController::class, 'UpdateProfile'])->name('vendor.UpdateProfile');
    //change password
    Route::post('change_password', [VendorProfileController::class, 'ChangePassword'])->name('vendor.ChangePassword');

    //Food Menu starts
    //food_categories
    Route::get('food_categories', [FoodMenuController::class, 'FoodCategoryView']);
    Route::get('manage_food_category', [FoodMenuController::class, 'ManageFoodCategoryView']);
    Route::get('manage_food_category/{id}', [FoodMenuController::class, 'ManageFoodCategoryView']);
    Route::post('manage_food_category_process', [FoodMenuController::class, 'ManageFoodCategoryProcess'])->name('Category.ManageFoodCategoryProcess');
    Route::get('food_category/delete/{id}', [FoodMenuController::class, 'DeleteCategory']);
    Route::get('food_category/status/{status}/{id}', [FoodMenuController::class, 'CategoryStatus']);

    //meal_items
    //farid
    Route::get('manage_booking/{id}', [RestaurantBookingController::class, 'manage_restaurant'])->name('manage.booking');
    Route::post('manage_booking_edit', [RestaurantBookingController::class, 'manage_restaurant_edit'])->name('manage.booking.edit');

    Route::get('meal_items', [FoodMenuController::class, 'MealItemView']);
    Route::get('manage_meal_items', [FoodMenuController::class, 'ManageMealItemView']);
    Route::get('manage_meal_items/{id}', [FoodMenuController::class, 'ManageMealItemView']);
    Route::post('manage_meal_items_process', [FoodMenuController::class, 'ManageMealItemProcess'])->name('Item.ManageMealItemProcess');
    Route::get('meal_items/delete/{id}', [FoodMenuController::class, 'DeleteMealItem']);
    Route::get('meal_items/status/{status}/{id}', [FoodMenuController::class, 'MealItemStatus']);
    //Food Menu ends

    //restaurant booking
    Route::get('restaurant_booking', [RestaurantBookingController::class, 'RestaurantBookingView']);

    Route::post('restaurant_booking/find', [RestaurantBookingController::class, 'CheckAvailableSlot'])->name('restaurant.find');
    Route::post('restaurant_booking/booking_details', [RestaurantBookingController::class, 'BookingDetails'])->name('restaurant.details');
    Route::post('restaurant_booking/user_info', [RestaurantBookingController::class, 'BookingUserDetails'])->name('restaurant.user.details');

    Route::post('restaurant_booking/user_info/save', [RestaurantBookingController::class, 'UserDetailsSave'])->name('restaurant.save.book');

    Route::get('restaurant_booking/list', [RestaurantBookingController::class, 'AllBookingList'])->name('restaurant.book.list');
    Route::get('restaurant_booking/find/getEmptyTables/{m}/{d}/{y}/{slotId}', [RestaurantBookingController::class, 'getEmptyTables'])->name('restaurant.empty.table.list');
    Route::get('restaurant_booking/delete/{id}', [RestaurantBookingController::class, 'DeleteBookingList'])->name('restaurant.booking.delete');
    // Route::get('restaurant_booking/edit/{id}', [RestaurantBookingEditController::class, 'EditBookingList'])->name('restaurant.booking.edit');
    //added by ragib end

    //manage outlet
    Route::get('outlet_list', [OutletController::class, 'OutletListView'])->name('outlet.list');
    Route::get('outlet_list/ajax', [OutletController::class, 'OutletListViewAjax'])->name('outlet.ajax');
    Route::get('manage_outlet', [OutletController::class, 'ManageOutletView']);
    Route::post('manage_outlet_process', [OutletController::class, 'ManageOutletProcess'])->name('outlet.ManageOutletProcess');
    Route::get('manage_outlet/{id}', [OutletController::class, 'ManageOutletView']);
    Route::get('outlet/delete/{id}', [OutletController::class, 'DeleteOutlet']);
    Route::get('outlet/status/{status}/{id}', [OutletController::class, 'status']);

    //Manage table
    Route::get('table_list', [TableController::class, 'TableListView']);
    Route::get('available_table', [TableController::class, 'AvailableTableView']);
    //    Route::POST('search_rooms',[RoomController::class,'RoomSearch'])->name('room.Search');
    //    Route::get('booked_rooms',[RoomController::class,'BookedRoomsView']);
    Route::get('manage_table', [TableController::class, 'ManageTableView']);
    Route::get('manage_table/{id}', [TableController::class, 'ManageTableView']);
    Route::post('manage_table_process', [TableController::class, 'ManageTableProcess'])->name('table.ManageTableProcess');
    Route::get('table/status/{status}/{id}', [TableController::class, 'status']);
    Route::get('table/delete/{id}', [TableController::class, 'DeleteTable']);

    //Manage slot
    Route::get('slot_list', [TimeSlotController::class, 'SlotListView']);

    Route::get('manage_slot', [TimeSlotController::class, 'ManageSlotView']);
    Route::get('manage_slot/{id}', [TimeSlotController::class, 'ManageSlotView']);
    Route::post('manage_slot_process', [TimeSlotController::class, 'ManageSlotProcess'])->name('slot.ManageSlotProcess');
    Route::get('slot/delete/{id}', [TimeSlotController::class, 'DeleteSlot']);
    Route::get('time_slot/status/{status}/{id}', [TimeSlotController::class, 'status']);
    //booking
    Route::get('booking_form/{id}', [TableBookingController::class, 'BookingFormView']);
});
//===================/restaurant service===============


//=================== tour service===============
Route::group(['prefix' => 'vendor/tour', 'middleware' => ['vendor_tour_auth', 'prevent-back-history']], function () {
    Route::get('dashboard', [BusServiceController::class, 'IndexView']);
});
//===================/tour service===============


//=================== Agent===============

// agent auth
Route::prefix('agent/')->group(function () {
    Route::get('login', [AgentAuthController::class, 'LoginView']);
    Route::post('login', [AgentAuthController::class, 'LogIn'])->name('agent.login');
    Route::get('register', [AgentAuthController::class, 'RegisterView']);
    Route::post('register', [AgentAuthController::class, 'Register'])->name('agent.register');
    Route::get('logout', [AgentAuthController::class, 'onLogout']);
});

Route::group(['prefix' => 'agent', 'middleware' => ['agent_auth', 'prevent-back-history']], function () {
    Route::get('dashboard', [AgentController::class, 'IndexView']);
    //profile
    Route::get('profile', [ProfileController::class, 'ProfileView']);
    Route::get('update_profile/{id}', [ProfileController::class, 'UpdateProfileView']);
    Route::post('update_profile', [ProfileController::class, 'UpdateProfile'])->name('agent.UpdateProfile');

    //change password
    Route::post('change_password', [ProfileController::class, 'ChangePassword'])->name('agent.ChangePassword');
    Route::get('passenger_database', [AgentController::class, 'PassengerDatabaseView']);

    // //flight booking
    // Route::get('flight_booking', [AgentController::class, 'FlightBookingView']);

    //booking starts

    //flight booking

    Route::get('flight_booking', [FlightBookingAgentController::class, 'FlightBookingViewAgent']); //working
    // Route::get('flight_search_result', [FlightBookingAgentController::class, 'FlightSearchResultView']);
    //search oneway
    Route::get('flight_search_result', [FlightBookingAgentController::class, 'FlightSearchResultViewAgent']);
    Route::post('flight_search', [FlightBookingAgentController::class, 'OneWayFlightSearchAgent'])->name('agent.OneWayFlightSearch'); //working
    Route::get('flight_search_result_ajax', [FlightBookingAgentController::class, 'FlightSearchResultViewAjaxAgent']);
    Route::get('flight_hub_book', [FlightBookingAgentController::class, 'FlightHubBookViewAgent']);

    //after air search call air rules
    Route::get('flight_air_rules', [FlightBookingAgentController::class, 'FlightAirRulesAgent'])->name('agent.AirRules');

    // after air rules call air promotion
    //Route::get('flight_air_promotion', [FlightBookingAgentController::class, 'FlightAirPromotion'])->name('agent.AirPromotion');
    //after air promotion check air check promotion
    // Route::get('flight_air_check_promotion', [FlightBookingAgentController::class, 'FlightAirCheckPromotion'])->name('agent.AirPromotion');
    //after air promotion check air price
    Route::get('flight_air_price', [FlightBookingAgentController::class, 'FlightAirPriceAgent'])->name('agent.FlightAirPrice');

    //after air price flight prebook
    Route::get('flight_hub_pre_book', [FlightBookingAgentController::class, 'FlightPreBookAgent'])->name('agent.FlightPreBook');
    Route::get('flight_hub_air_book', [FlightBookingAgentController::class, 'FlightAirBookAgent2'])->name('agent.FlightAirBook');
    Route::get('flight_hub_air_retrive/{b_id}', [FlightBookingAgentController::class, 'FlightAirRetriveAgent'])->name('agent.FlightAirRetrive');
    Route::get('flight_hub_invoice/{b_id}', [FlightBookingAgentController::class, 'FlightShowInvoiceAgent'])->name('agent.FlightInvoice');
    Route::get('flight_hub_air_ticketing', [FlightBookingAgentController::class, 'FlightAirTicketAgent'])->name('agent.FlightAirTicket');
    Route::get('flight_hub_air_cancel', [FlightBookingAgentController::class, 'FlightAirTicketCancelAgent'])->name('agent.FlightAirTicketCancel');
    Route::get('hub_success', [FlightBookingAgentController::class, 'HubSuccessViewAgent']);
    // Route::get('flight_hub_book', [FlightBookingAgentController::class, 'FlightHubBookPreiew']);
    //booking ends

    //booked starts
    //hub-booking
    Route::get('hub_booking', [agentController::class, 'HubBookingViewAgent']);
    //air_tickets
    Route::get('air_tickets', [agentController::class, 'AirTicketsViewAgent']);
    //air_tickets
    // Route::get('AirTicketing', [FlightBookingController::class, 'GetTicketView']);
    //booked ends


    //restaurant booking
    Route::get('agent_restaurant_booking', [AgentRestaurantBookingController::class, 'RestaurantBookingView']);
    Route::post('agent_search_restaurant', [AgentRestaurantBookingController::class, 'SearchRestaurant'])->name('agent.restaurant.search');
    Route::get('agent_restaurant_search_result', [AgentRestaurantBookingController::class, 'RestaurantSearchResult']);
    Route::get('agent_restaurant_booking/find/{id}', [AgentRestaurantBookingController::class, 'CheckAvailableSlot'])->name('agent.restaurant.find');
    Route::post('agent_restaurant_booking/booking_details', [AgentRestaurantBookingController::class, 'BookingDetails'])->name('agent.restaurant.details');
    Route::post('agent_restaurant_booking/user_info', [AgentRestaurantBookingController::class, 'BookingUserDetails'])->name('agent.restaurant.user.details');
    Route::post('agent_restaurant_booking/user_info/save', [AgentRestaurantBookingController::class, 'UserDetailsSave'])->name('agent.restaurant.save.book');
    Route::get('agent_restaurant_booking/list', [AgentRestaurantBookingController::class, 'AllBookingList'])->name('agent.restaurant.book.list');
    Route::get('agent_restaurant_booking/find/getEmptyTables/{m}/{d}/{y}/{slotId}', [AgentRestaurantBookingController::class, 'getEmptyTables'])->name('agent.restaurant.empty.table.list');
    Route::get('agent_restaurant_booking/delete/{id}', [AgentRestaurantBookingController::class, 'DeleteBookingList'])->name('agent.restaurant.booking.delete');
    Route::get('restaurant_booking/edit/{id}', [AgentRestaurantBookingController::class, 'EditBookingList'])->name('agent.restaurant.booking.edit');


    //transaction
    Route::get('balance', [AgentController::class, 'BalanceView']);
    Route::get('credit_request', [AgentController::class, 'CreditRequestView']);
    Route::get('voucher_debit', [AgentController::class, 'VoucherDebitView']);
    Route::get('statement', [AgentController::class, 'StatementView']);

    //payments
    Route::get('bank_details', [AgentController::class, 'BankDetailsView']);
    Route::get('offline_payments', [AgentController::class, 'OfflinePaymentsView']);
    Route::get('online_payments', [AgentController::class, 'OnlinePaymentsView']);

    //hotel booking

    Route::get('hotel_booking', [AgentController::class, 'HotelBookingView'])->name('agent.hotel_booking');

    //search hotel
    Route::get('/search_hotel', [HotelBookingController::class, 'SearchHotel'])->name('agent.SearchHotel');
    Route::get('/hotel_search_result', [HotelBookingController::class, 'HotelSearchResultView']);
    Route::get('/room_list/{id}', [HotelBookingController::class, 'HotelWiseRroomListView']);
    Route::get('/block_rooms/{hotel_id}/{id}/{price}/{vendor_id}', [HotelBookingController::class, 'BlockRoomView']);
    //auto-complete search
    // Route::get('/auto-complete-search-query', [HotelBookingController::class, 'query'])->name('autocomplete.search.query');


    Route::post('/booked-customer-infos', [BookedCustomerInfoController::class, 'booked_customer_info'])->name('agent.booked_customer_info');
    Route::get('/hotel-booking-data-list', [HotelBookingController::class, 'index'])->name('agent.data_list');


    //add pay
    Route::get('/add_pay', [HotelBookingController::class, 'AddPay']);
    Route::post('/recharge_request', [RechargeController::class, 'RechargeRequest'])->name('agent.RechargeRequest');
});
//===================/Agent===============



//user start

Route::group(['prefix' => 'user'], function () {

    //hotel booking

    //search hotel
    Route::get('/search_hotel', [UserController::class, 'SearchHotel'])->name('user.SearchHotel');
    //room list
    Route::get('/room_list/{id}', [UserController::class, 'HotelWiseRroomListView']);
    //block rooms
    Route::get('/block_rooms/{hotel_id}/{id}/{price}', [UserController::class, 'BlockRoomView']);
    //booked customer info
    Route::post('/booked-customer-infos', [UserController::class, 'booked_customer_info'])->name('user.booked_customer_info');
    Route::get('hotel_booking', [UserController::class, 'HotelBookingView'])->name('user.hotel_booking');
    // Route::get('/hotel-booking-data-list', [HotelBookingController::class, 'index'])->name('agent.data_list');

    //restaurant booking
    Route::get('user_restaurant_booking', [UserController::class, 'RestaurantBookingView'])->name('user.RestaurantBookingView');


    //flight booking

    Route::post('flight_search', [UserController::class, 'OneWayFlightSearch'])->name('user.OneWayFlightSearch');
    Route::get('flight_hub_book', [UserController::class, 'FlightHubBookViewUser']);
    Route::get('flight_air_price', [UserController::class, 'FlightAirPrice'])->name('user.FlightAirPrice');
    Route::get('flight_hub_pre_book', [UserController::class, 'FlightPreBook'])->name('user.FlightPreBook');
    Route::get('flight_hub_get_ticket/{t_id}', [UserController::class, 'get_ticket'])->name('user.getTicket');
    Route::get('flight_hub_air_book', [UserController::class, 'FlightAirBook'])->name('user.FlightAirBook');
    Route::get('flight_hub_air_ticketing/', [UserController::class, 'FlightAirTicket'])->name('user.FlightAirTicket');
    Route::get('flight_hub_get_ticket/{t_id}', [UserController::class, 'get_ticket'])->name('user.getTicket');
    Route::get('flight_hub_air_cancel', [UserController::class, 'FlightAirTicketCancel'])->name('user.FlightAirTicketCancel');
    Route::get('hub_success', [UserController::class, 'HubSuccessView']);


    //restaurant starts

    Route::post('user_search_restaurant', [UserController::class, 'SearchRestaurant'])->name('user.restaurant.search');
    Route::get('user_restaurant_search_result', [UserController::class, 'RestaurantSearchResult'])->name('user.restaurant.search.result');
    Route::get('user_restaurant_booking/find/{id}', [UserController::class, 'CheckAvailableSlot'])->name('user.restaurant.find');
    Route::post('user_restaurant_booking/booking_details', [UserController::class, 'BookingDetails'])->name('user.restaurant.details');
    Route::get('user_restaurant_booking/find/getEmptyTables/{m}/{d}/{y}/{slotId}', [UserController::class, 'getEmptyTables'])->name('agent.restaurant.empty.table.list');
    Route::post('user_restaurant_booking/user_info/save', [UserController::class, 'UserDetailsSave'])->name('user.restaurant.save.book');

    //web tour
    Route::post('/tour_search', [HomeController::class, 'SearchTour'])->name('user.tour_search');
    Route::get('/country/location/ajax/{id}', [HomeController::class, 'FindLocationAjax']);
    Route::post('/package_details', [HomeController::class, 'PackageDetails'])->name('user.package_details');
    Route::post('/user_package_details', [HomeController::class, 'UserPackageDetails'])->name('user.user_package_details');
    Route::get('/passenger_details', [HomeController::class, 'PassengerDetailsShow'])->name('user.passenger_details.show');
    Route::post('/passenger_details', [HomeController::class, 'PassengerDetailsStore'])->name('user.passenger_details.store');
});

//user end



//===================Admin===============
// admin auth
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'LoginView']);
    Route::post('login', [AdminAuthController::class, 'LogIn'])->name('admin.login');
    // Route::get('register',[AdminAuthController::class,'RegisterView']);
    // Route::post('register',[AdminAuthController::class,'Register'])->name('admin.register');
    Route::get('logout', [AdminAuthController::class, 'onLogout']);
});
Route::group(['prefix' => 'admin', 'middleware' => ['admin_auth', 'prevent-back-history']], function () {
    //dashboard
    Route::get('dashboard', [AdminController::class, 'IndexView']);
    //notice view
    Route::get('notice/view', [NoticeController::class, 'NoticeViewIndex']);


    //settings starts
    //profile
    Route::get('profile', [AdminProfileController::class, 'ProfileView']);
    Route::get('update_profile/{id}', [AdminProfileController::class, 'UpdateProfileView']);
    Route::post('update_profile', [AdminProfileController::class, 'UpdateProfile'])->name('admin.UpdateProfile');
    //change password
    Route::post('change_password', [AdminProfileController::class, 'ChangePassword'])->name('admin.ChangePassword');

    //currency
    Route::get('currency', [CurrencyController::class, 'CurrencyView']);
    Route::get('manage_currency', [CurrencyController::class, 'ManageCurrencyView']);
    Route::get('manage_currency/{id}', [CurrencyController::class, 'ManageCurrencyView']);
    Route::post('manage_currency', [CurrencyController::class, 'ManageCurrencyProcess'])->name('admin.ManageCurrencyProcess');
    Route::get('currency/delete/{id}', [CurrencyController::class, 'DeleteCurrency']);

    //notice
    Route::get('notice', [NoticeController::class, 'NoticeView']);
    Route::get('manage_notice', [NoticeController::class, 'ManageNoticeView']);
    Route::get('manage_notice/{id}', [NoticeController::class, 'ManageNoticeView']);
    Route::post('manage_notice', [NoticeController::class, 'ManageNoticeProcess'])->name('admin.ManageNoticeProcess');
    Route::get('notice/delete/{id}', [NoticeController::class, 'DeleteNotice']);

    //services
    Route::get('service', [ServiceController::class, 'ServiceView']);
    Route::get('manage_service', [ServiceController::class, 'ManageServiceView']);
    Route::get('manage_service/{id}', [ServiceController::class, 'ManageServiceView']);
    Route::post('manage_service', [ServiceController::class, 'ManageServiceProcess'])->name('admin.ManageServiceProcess');
    Route::get('service/delete/{id}', [ServiceController::class, 'DeleteService']);

    //Source
    Route::get('source', [SourceController::class, 'SourceView']);
    Route::get('manage_source', [SourceController::class, 'ManageSourceView']);
    Route::get('manage_source/{id}', [SourceController::class, 'ManageSourceView']);
    Route::post('manage_source', [SourceController::class, 'ManageSourceProcess'])->name('admin.ManageSourceProcess');
    Route::get('source/delete/{id}', [SourceController::class, 'DeleteSource']);
    Route::get('source/status/{status}/{id}', [SourceController::class, 'status']);

    //wallet
    Route::get('wallet', [WalletController::class, 'WalletView']);
    Route::get('manage_wallet', [WalletController::class, 'ManageWalletView']);
    Route::get('manage_wallet/{id}', [WalletController::class, 'ManageWalletView']);
    Route::post('manage_wallet', [WalletController::class, 'ManageWalletProcess'])->name('admin.ManageWalletProcess');
    Route::get('wallet/delete/{id}', [WalletController::class, 'DeleteWallet']);

    //wallet
    Route::get('passenger_database', [AdminController::class, 'PassengerDatabaseView']);

    //settings ends

    //master starts
    //cities
    Route::get('cities', [CityController::class, 'CityView']);
    Route::get('manage_city', [CityController::class, 'ManageCityView']);
    Route::get('manage_city/{id}', [CityController::class, 'ManageCityView']);
    Route::post('manage_city', [CityController::class, 'ManageCityProcess'])->name('admin.ManageCityProcess');
    Route::get('city/delete/{id}', [CityController::class, 'DeleteCity']);

    //banks
    Route::get('banks', [BankController::class, 'BankView']);
    Route::get('manage_bank', [BankController::class, 'ManageBankView']);
    Route::get('manage_bank/{id}', [BankController::class, 'ManageBankView']);
    Route::post('manage_bank', [BankController::class, 'ManageBankProcess'])->name('admin.ManageBankProcess');
    Route::get('bank/delete/{id}', [BankController::class, 'DeleteBank']);

    //customer
    Route::get('customer', [AdminController::class, 'CustomerView']);
    // Route::get('manage_customer',[CustomerController::class,'ManageCustomerView']);
    // Route::get('manage_customer/{id}',[CustomerController::class,'ManageCustomerView']);
    // Route::post('manage_customer',[CustomerController::class,'ManageCustomerProcess'])->name('admin.ManageCustomerProcess');
    // Route::get('customer/delete/{id}',[CustomerController::class,'DeleteCustomer']);
    //master ends


    //booking starts

    //flight booking
    Route::get('flight_booking', [FlightBookingController::class, 'FlightBookingView']);
    // Route::get('flight_search_result', [FlightBookingController::class, 'FlightSearchResultView']);
    //search oneway
    Route::get('flight_search_result', [FlightBookingController::class, 'FlightSearchResultView']);
    Route::post('flight_search', [FlightBookingController::class, 'OneWayFlightSearch'])->name('admin.OneWayFlightSearch');
    Route::get('flight_search_result_ajax', [FlightBookingController::class, 'FlightSearchResultViewAjax']);
    Route::get('flight_hub_book', [FlightBookingController::class, 'FlightHubBookView']);

    //after air search call air rules
    Route::get('flight_air_rules', [FlightBookingController::class, 'FlightAirRules'])->name('admin.AirRules');

    // after air rules call air promotion
    //Route::get('flight_air_promotion', [FlightBookingController::class, 'FlightAirPromotion'])->name('admin.AirPromotion');


    //after air promotion check air check promotion
    // Route::get('flight_air_check_promotion', [FlightBookingController::class, 'FlightAirCheckPromotion'])->name('admin.AirPromotion');



    //after air promotion check air price
    Route::get('flight_air_price', [FlightBookingController::class, 'FlightAirPrice'])->name('admin.FlightAirPrice');
    //after air price flight prebook
    Route::get('flight_hub_pre_book', [FlightBookingController::class, 'FlightPreBook'])->name('admin.FlightPreBook');
    Route::get('flight_hub_air_book', [FlightBookingController::class, 'FlightAirBook'])->name('admin.FlightAirBook');


    Route::get('flight_hub_air_retrive/{b_id}', [FlightBookingController::class, 'FlightAirRetrive'])->name('admin.FlightAirRetrive');
    Route::get('flight_hub_invoice/{b_id}', [FlightBookingController::class, 'FlightShowInvoice'])->name('admin.FlightInvoice');
    Route::get('flight_hub_air_ticketing/', [FlightBookingController::class, 'FlightAirTicket'])->name('admin.FlightAirTicket');
    Route::get('flight_hub_get_ticket/{t_id}', [FlightBookingController::class, 'get_ticket'])->name('admin.getTicket');
    Route::get('flight_hub_air_cancel', [FlightBookingController::class, 'FlightAirTicketCancel'])->name('admin.FlightAirTicketCancel');
    //ticket booking
    // Route::get('flight_booking_ticket/', [FlightBookingController::class, ''])

    Route::get('hub_success', [FlightBookingController::class, 'HubSuccessView']);



    // Route::get('flight_hub_book', [FlightBookingController::class, 'FlightHubBookPreiew']);
    //booking ends

    //booked starts
    //hub-booking
    Route::get('hub_booking', [AdminController::class, 'HubBookingView']);
    //hold-queue
    Route::get('hold_queue', [AdminController::class, 'HoldQueueView']);
    //air_tickets
    Route::get('air_tickets', [AdminController::class, 'AirTicketsView']);
    //air_tickets
    Route::get('hotel_booking', [AdminController::class, 'HotelBookingView']);

    // Route::get('AirTicketing', [FlightBookingController::class, 'GetTicketView']);
    //booked ends

    //transactions starts
    //balance
    Route::get('balance', [AdminController::class, 'BalanceView']);
    //bank details
    Route::get('bank_details', [AdminController::class, 'BankDetailsView']);
    //offline_payments
    Route::get('offline_payments', [AdminController::class, 'OfflinePaymentsView']);
    //online_payments
    Route::get('online_payments', [AdminController::class, 'OnlinePaymentsView']);
    //credit_payments
    Route::get('credit_payments', [AdminController::class, 'CreditPaymentsView']);
    //credit_request
    Route::get('credit_request', [AdminController::class, 'CreditRequestView']);
    //main_statement
    Route::get('main_statement', [AdminController::class, 'MainStatementView']);
    //agent_statement
    Route::get('agent_statement', [AdminController::class, 'AgentStatementView']);
    //payment_receipts
    Route::get('payment_receipts', [AdminController::class, 'PaymentReceiptstView']);
    //boubble_statement
    Route::get('boubble_statement', [AdminController::class, 'BoubbleStatementView']);
    //customer_statemcnt
    Route::get('customer_statement', [AdminController::class, 'CustomerStatementView']);
    //transactions ends

    //commission starts
    //hotel_packages
    Route::get('hotel_package', [CommissionController::class, 'HotelPackageView']);
    Route::get('manage_hotel_package', [CommissionController::class, 'ManageHotelPackageView']);
    Route::get('manage_hotel_package/{id}', [CommissionController::class, 'ManageHotelPackageView']);
    Route::post('manage_hotel_package', [CommissionController::class, 'ManageHotelPackageProcess'])->name('admin.ManageHotelPackageProcess');

    //hotel_commission
    Route::get('hotel_commission', [HotelCommissionController::class, 'HotelCommissionView']);
    Route::get('manage_hotel_commission', [HotelCommissionController::class, 'ManageHotelCommissionView']);
    Route::get('manage_hotel_commission/{id}', [HotelCommissionController::class, 'ManageHotelCommissionView']);
    Route::post('manage_hotel_commission', [HotelCommissionController::class, 'ManageHotelCommissionProcess'])->name('admin.ManageHotelCommissionProcess');

    //flight_packages
    Route::get('flight_package', [CommissionController::class, 'FlightPackageView']);
    Route::get('manage_flight_package', [CommissionController::class, 'ManageFlightPackageView']);
    Route::get('manage_flight_package/{id}', [CommissionController::class, 'ManageFlightPackageView']);
    Route::post('manage_flight_package', [CommissionController::class, 'ManageFlightPackageProcess'])->name('admin.ManageFlightPackageProcess');

    //commission delete
    Route::get('commission/delete/{id}', [CommissionController::class, 'DeleteCommission']);
    //status
    Route::get('commission/status/{status}/{id}', [CommissionController::class, 'status']);
    //payment_commission
    Route::get('payment_commission', [CommissionController::class, 'PaymentCommissionView']);
    //payment_commission
    Route::get('payment_commission_B2B', [CommissionController::class, 'PaymentCommissionB2BView']);

    //commission ends

    //hotel booking starts

    Route::get('hotel_booking', [AdminHotelBookingController::class, 'HotelBookingView'])->name('admin.hotel_booking');

    //search hotel
    Route::get('/search_hotel', [AdminHotelBookingController::class, 'SearchHotel'])->name('admin.SearchHotel');
    Route::get('/hotel_search_result', [AdminHotelBookingController::class, 'HotelSearchResultView']);
    Route::get('/room_list/{id}', [AdminHotelBookingController::class, 'HotelWiseRroomListView']);
    Route::get('/block_rooms/{hotel_id}/{id}/{price}', [AdminHotelBookingController::class, 'BlockRoomView']);
    //auto-complete search
    // Route::get('/auto-complete-search-query', [AdminHotelBookingController::class, 'query'])->name('autocomplete.search.query');

    Route::post('/booked-customer-infos', [AdminBookedCustomerInfoController::class, 'booked_customer_info'])->name('admin.booked_customer_info');
    Route::get('/hotel-booking-data-list', [AdminHotelBookingController::class, 'index'])->name('admin.data_list');

    //farid hotel booking

    Route::get('invoice/{id}', [AdminHotelBookingController::class, 'HotelInvoiceView']);
    Route::get('cancel/{id}', [AdminHotelBookingController::class, 'CancelRoom']);
    Route::get('hotel_booking', [AdminHotelBookingController::class, 'HotelBookingView'])->name('admin.hotel_booking');


    // //dashboard
    // Route::get('dashboard', [VendorController::class, 'IndexView']);
    //Manage room
    Route::get('roomlist', [AdminHotelBookingController::class, 'RoomView'])->name('admin.roomView');
    //for selecting a vendor (hotel)
    Route::get('get_vendor', [AdminHotelBookingController::class, 'SelectVendor'])->name('admin.getVendor');
    Route::get('available_rooms', [AdminHotelBookingController::class, 'AvailableRoomsView'])->name('admin.AvailableRoomsView');
    Route::POST('search_rooms', [AdminHotelBookingController::class, 'RoomSearch'])->name('room.Search');
    Route::get('booked_rooms', [AdminHotelBookingController::class, 'BookedRoomsView'])->name('admin.BookedRoomsView');
    //  addition
    Route::get('get_vendor_booked_rooms', [AdminHotelBookingController::class, 'SelectVendorBookedRooms'])->name('admin.getVendor.bookedRooms');
    Route::get('get_vendor_room_list', [AdminHotelBookingController::class, 'SelectVendorRoomsList'])->name('admin.getVendor.RoomsList');
    Route::get('get_vendor_manage_room', [AdminHotelBookingController::class, 'SelectVendorManageRoom'])->name('admin.getVendor.ManageRoom');
    Route::get('get_vendor_branch_list', [AdminHotelBookingController::class, 'SelectVendorBranchList'])->name('admin.getVendor.BranchList');
    Route::get('get_vendor_manage_branch', [AdminHotelBookingController::class, 'SelectVendorBranchManage'])->name('admin.getVendor.BranchManage');




    Route::get('manage_room', [AdminHotelBookingController::class, 'ManageRoomView'])->name("admin.manage_room");
    // Route::get('manage_room/{id}', [AdminHotelBookingController::class, 'ManageRoomView']);
    Route::post('manage_room_process', [AdminHotelBookingController::class, 'ManageRoomProcess'])->name('room.ManageRoomProcess');
    Route::get('room/status/{status}/{id}', [AdminHotelBookingController::class, 'status']);
    Route::get('room/delete/{id}', [AdminHotelBookingController::class, 'DeleteRoom']);
    //Manage branch
    Route::get('branch_list', [AdminHotelBookingController::class, 'BranchListView'])->name('admin.BranchListView');
    Route::get('hotel/manage_branch', [AdminHotelBookingController::class, 'ManageBranchView'])->name('admin.BranchView');
    Route::post('hotel/manage_branch_process', [AdminHotelBookingController::class, 'ManageBranchProcess'])->name('hotel.ManageBranchProcess');
    Route::get('hotel/manage_branch/{id}', [AdminHotelBookingController::class, 'ManageBranchView'])->name('admin.ManageBranchView');
    Route::get('hotel/branch/delete/{id}', [AdminHotelBookingController::class, 'DeleteBranch']);
    Route::get('hotel/status/{status}/{id}', [AdminHotelBookingController::class, 'status']);
    Route::get('hotel/branch_view/{id}', [AdminHotelBookingController::class, 'BranchView']);
    //booking
    Route::get('hotel_booking_form/{id}', [AdminHotelBookingController::class, 'BookingFormView'])->name('booking_form');
    Route::post('manage_book_process', [AdminHotelBookingController::class, 'ManageBookProcess'])->name('room.ManageBookProcess');
    Route::get('room/booking_status/{status}/{id}', [AdminHotelBookingController::class, 'UpdateBookingStatus']);
    //hotel booking end

    //arnob
    Route::get('hotel_booked_list', [AdminController::class, 'bookedHotelList'])->name('booked_hotels');
    Route::get('restaurant_booked_list', [AdminController::class, 'bookedRestaurantList'])->name('booked_restaurant');
    Route::get('restaurant_delete/{id}', [AdminController::class, 'restaurant_delete'])->name('restaurant_delete');
    Route::get('hotel_delete/{id}', [AdminController::class, 'hotel_delete'])->name('hotel_delete');



    //restaurant booking
    Route::get('admin_restaurant_booking', [AdminRestaurantController::class, 'RestaurantBookingView'])->name('admin.res.booking');
    Route::post('admin_search_restaurant', [AdminRestaurantController::class, 'SearchRestaurant'])->name('admin.restaurant.search');
    Route::get('admin_restaurant_search_result', [AdminRestaurantController::class, 'RestaurantSearchResult']);
    Route::get('admin_restaurant_booking/find/{id}', [AdminRestaurantController::class, 'CheckAvailableSlot'])->name('admin.restaurant.find');
    Route::post('admin_restaurant_booking/booking_details', [AdminRestaurantController::class, 'BookingDetails'])->name('admin.restaurant.details');
    Route::post('admin_restaurant_booking/user_info', [AdminRestaurantController::class, 'BookingUserDetails'])->name('admin.restaurant.user.details');
    Route::post('admin_restaurant_booking/user_info/save', [AdminRestaurantController::class, 'UserDetailsSave'])->name('admin.restaurant.save.book');
    Route::get('admin_restaurant_booking/list', [AdminRestaurantController::class, 'AllBookingList'])->name('admin.restaurant.book.list');
    Route::get('admin_restaurant_booking/find/getEmptyTables/{m}/{d}/{y}/{slotId}', [AdminRestaurantController::class, 'getEmptyTables'])->name('admin.restaurant.empty.table.list');
    Route::get('admin_restaurant_booking/delete/{id}', [AdminRestaurantController::class, 'DeleteBookingList'])->name('admin.restaurant.booking.delete');
    Route::get('restaurant_booking/edit/{id}', [AdminRestaurantController::class, 'EditBookingList'])->name('admin.restaurant.booking.edit');




    //manage slot

    Route::get('manage_slot', [AdminTimeSlotController::class, 'ManageSlotView'])->name('admin.manage.slot');
    Route::get('slot_list', [AdminTimeSlotController::class, 'SlotListView'])->name('admin.slot.list');
    Route::post('manage_slot_process', [AdminTimeSlotController::class, 'ManageSlotProcess'])->name('slot.ManageSlotProcess');
    Route::get('slot/delete/{id}', [AdminTimeSlotController::class, 'DeleteSlot']);
    Route::get('time_slot/status/{status}/{id}', [AdminTimeSlotController::class, 'status']);
    Route::get('get_vendor_manage_slot', [AdminTimeSlotController::class, 'SelectVendorManageSlot'])->name('admin.Vendor.Slot');
    Route::get('get_vendor_slot_list', [AdminTimeSlotController::class, 'SelectVendorSlotList'])->name('admin.Vendor.Slot.List');






    //manage table
    Route::get('manage_table', [AdminTableController::class, 'ManageTableView'])->name('admin.tableManage');
    Route::get('table_list', [AdminTableController::class, 'TableListView']);
    Route::post('manage_table_process', [AdminTableController::class, 'ManageTableProcess'])->name('table.ManageTableProcess');
    Route::get('available_table', [AdminTableController::class, 'AvailableTableView']);
    Route::get('manage_table/{id}', [AdminTableController::class, 'ManageTableView']);
    Route::get('table/status/{status}/{id}', [AdminTableController::class, 'status']);
    Route::get('table/delete/{id}', [AdminTableController::class, 'DeleteTable']);
    Route::get('get_vendor_table', [AdminTableController::class, 'SelectVendorTable'])->name('admin.Vendor.Table');
    Route::get('get_vendor_table_list', [AdminTableController::class, 'SelectVendorTableList'])->name('admin.Vendor.Table.List');

    // meal items

    Route::get('meal_items', [AdminFoodMenuController::class, 'MealItemView']);
    Route::get('manage_meal_items', [AdminFoodMenuController::class, 'ManageMealItemView'])->name('item.ManageMealItem');
    Route::get('manage_meal_items/{id}', [AdminFoodMenuController::class, 'ManageMealItemView']);
    Route::post('manage_meal_items_process', [AdminFoodMenuController::class, 'ManageMealItemProcess'])->name('Item.ManageMealItemProcess');
    Route::get('meal_items/delete/{id}', [AdminFoodMenuController::class, 'DeleteMealItem']);
    Route::get('meal_items/status/{status}/{id}', [AdminFoodMenuController::class, 'MealItemStatus']);
    Route::get('get_vendor_meal', [AdminFoodMenuController::class, 'SelectVendorMeal'])->name('admin.getVendor.meal');








    //set vendor form admin

    Route::get('/set-vendor', [AdminController::class, 'setVendorView'])->name('setvendor_view');
    Route::get('/set-agent', [AdminController::class, 'setAgentView'])->name('setagent_view');


    //manage outlet admin
    Route::get('outlet_list', [AdminOutletController::class, 'OutletListView'])->name('admin.outlet.list');
    Route::get('admin_outlet_list/ajax', [AdminOutletController::class, 'OutletListViewAjax'])->name('admin.outlet.ajax');
    Route::get('manage_outlet/{vendor?}', [AdminOutletController::class, 'ManageOutletView'])->name('admin.Manage.outlet');
    Route::post('manage_outlet_process', [AdminOutletController::class, 'AdminManageOutletProcess'])->name('admin.outlet.ManageOutletProcess');
    Route::get('manage_outlet/{id}', [AdminOutletController::class, 'ManageOutletView']);
    Route::get('outlet/delete/{id}', [AdminOutletController::class, 'DeleteOutlet']);
    Route::get('outlet/status/{status}/{id}', [AdminOutletController::class, 'status']);
    Route::get('get_vendor_outlet_list', [AdminOutletController::class, 'SelectVendorOutlet'])->name('admin.getVendor.outlet');



    //food_categories
    Route::get('food_categories', [AdminFoodMenuController::class, 'FoodCategoryView']);
    Route::get('manage_food_category', [AdminFoodMenuController::class, 'ManageFoodCategoryView'])->name('category.ManageFood');
    Route::get('manage_food_category/{id}', [AdminFoodMenuController::class, 'ManageFoodCategoryView']);
    Route::post('manage_food_category_process', [AdminFoodMenuController::class, 'ManageFoodCategoryProcess'])->name('Category.ManageFoodCategoryProcess');
    Route::get('food_category/delete/{id}', [AdminFoodMenuController::class, 'DeleteCategory']);
    Route::get('food_category/status/{status}/{id}', [AdminFoodMenuController::class, 'CategoryStatus']);

    Route::get('get_vendor_categories', [AdminFoodMenuController::class, 'SelectVendorCategory'])->name('admin.getVendor.category');

    //tour service===============

    Route::get('/tour_search', [AdminTourController::class, 'TourSearchView'])->name('admin/tour_search');
    Route::get('/create_package', [AdminTourController::class, 'CreatePackageView'])->name('admin.create_package');
    Route::post('/package_store', [AdminTourController::class, 'PackageStore'])->name('admin.package_store');
    Route::get('/package_list', [AdminTourController::class, 'PackageList'])->name('admin.package_list');
    Route::get('create_package/edit/{id}', [AdminTourController::class, 'EditCreatePackage'])->name('create.package.edit');
    Route::post('create_package/update/{id}', [AdminTourController::class, 'UpdatePackage'])->name('package.update');
    Route::get('package_list/delete/{id}', [AdminTourController::class, 'DeletePackageList'])->name('package.list.delete');
    Route::get('/search_tour', [AdminTourController::class, 'SearchTour'])->name('search.SearchTour');
    Route::get('/search_hotel', [SearchController::class, 'SearchHotel'])->name('search.SearchHotel');

    //tour hotel
    Route::get('/create_hotel', [TourHotelController::class, 'CreateHotel'])->name('admin.CreateHotel');
    Route::post('/hotel_store', [TourHotelController::class, 'HotelStore'])->name('admin.hotel_store');
    Route::get('/hotel_list', [TourHotelController::class, 'HotelList'])->name('admin.hotel_list');
    Route::get('create_hotel/edit/{id}', [TourHotelController::class, 'EditCreatehotel'])->name('create.hotel.edit');
    Route::post('create_hotel/update/{id}', [TourHotelController::class, 'UpdateHotel'])->name('hotel.update');
    Route::get('hotel_list/delete/{id}', [TourHotelController::class, 'DeleteHotelList'])->name('hotel.list.delete');
    
    //===================/Admin===============

});


//===================/Admin Booking End===============
