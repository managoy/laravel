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

//Route::get('/', function () {
//
//    return view('welcome');
//
//});

 use Intervention\Image\Facades\Image;


 Route::view('/','home');
 Route::view('vue','Vue.test');
 Route::post('formSubmit','FormController@submit');

 Route::get('contact','ContactFormController@create');
 Route::post('contact','ContactFormController@store');

//Route::view('contact','contact');

// Route::get('contact', function(){
//     return view('contact');
// });

 Route::view('about','about');

// Route::get('about', function(){
//     return view('about');
// });

//Use of middleware green light red light
 //Route::get('customers', 'CustomersController@index')->middleware('auth');
 Route::get('customers', 'CustomersController@index');
 Route::get('customers/create', 'CustomersController@create');
 Route::post('customers','CustomersController@store');
 Route::get('customers/{customer}','CustomersController@show');
 Route::get('customers/{customer}/edit','CustomersController@edit');
 Route::patch('customers/{customer}','CustomersController@update');
 Route::delete('customers/{customer}','CustomersController@destroy');


 //Route::resouce('customers','CustomersController');

 Route::get('gdimage', function()
 {
    // $img = Image::make('foo.jpg')->resize(300, 200);
     //$img = \Intervention\Image\Facades\Image::make(public_path('storage/uploads/' . 'laptop.jpg'))->resize(1000,1000);

     //$image = Image::make(public_path('storage/uploads/' . 'AXm3QnPfD9PhMJT8CzZWlUiMuM54gFY7rxa5OS2V.jpeg'))->fit(300,300);

    // $image->save(public_path('edited/edited.jpg'));

     //echo 'success';

   /*    // create empty canvas with background color
         $img = Image::canvas(100, 100, '#ddd');

             // draw a blue line
             $img->line(10, 10, 100, 10, function ($draw) {
             $draw->color('#0000ff');
              });

         // draw a red line with 5 pixel width
         $img->line(10, 10, 195, 195, function ($draw) {
         $draw->color('#f00');
         $draw->width(5);
     });*/


     $height = Image::make(public_path('storage/uploads/' . 'AXm3QnPfD9PhMJT8CzZWlUiMuM54gFY7rxa5OS2V.jpeg'))->height();
     $width = Image::make(public_path('storage/uploads/' . 'AXm3QnPfD9PhMJT8CzZWlUiMuM54gFY7rxa5OS2V.jpeg'))->width();

     return 'Height of the image: ' . $height . ' and width: ' . $width;

 });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
