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

Route::get('/', function () {
    return view('welcome');
});






Auth::routes();

//////// ***** ROUTE SISWA ****** ///////////////
Route::get('/home', 'SiswaController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logoutsiswa')->name('siswa.logout');
Route::get('/profilesiswa', 'siswaController@profilesiswa');
Route::get('/gantipassword', 'siswaController@getupdatepassword');
Route::PATCH('/gantipassword/{id}', 'siswaController@postupdatepassword');
Route::PATCH('/profilesiswa/{id}', 'siswaController@update');
// INPUT ABSENSI //
Route::get('/inputabsen', 'SiswaController@getinputabsen');
Route::POST('/postabsensiswa', 'SiswaController@store');
Route::get('/laporanabsen', 'SiswaController@laporanabsen');
Route::POST('/laporanabsen', 'SiswaController@laporanabsenkategori');
Route::get('/detailabsenku/{id}', 'SiswaController@detailabsenku');

Route::get('/lihatnilai', 'SiswaController@lihatnilai');
Route::POST('/lihatnilai', 'SiswaController@lihatnilaikategori');
Route::get('/lihatmading', 'SiswaController@lihatmading');




//LOGIN ADMIN
Route::prefix('admin')->group(function() {
    Route::get('/', 'AuthAdmin\LoginController@formlogin')->name('admin.login');
    Route::POST('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::POST('/register', 'AuthAdmin\LoginController@login')->name('admin.register');
    Route::get('/index', 'AdminController@index')->name('admin.home');
    Route::get('/logout', 'AuthAdmin\LoginController@logoutadmin')->name('admin.logout');         
});

//MENU SISWA
Route::get('/insertsiswa', 'AdminController@create');
Route::get('/insertsiswa/importexcel', 'AdminController@getimportexcelsiswa');
Route::POST('/insertsiswa/importexcel', 'AdminController@postimportexcelsiswa');
Route::POST('/insertsiswa', 'AdminController@store');
Route::delete('/hapussiswa/{id}', 'AdminController@destroy');
Route::PATCH('/insertsiswa/{id}', 'AdminController@update');

Route::get('/uploadfotosiswa', 'Admincontroller@uploadfotosiswa');

Route::get('/inputabsensi', 'AdminController@inputabsensi');
Route::get('/inputabsensi/{id}/input ', 'AdminController@forminputabsensi');

Route::get('/gettambahakunsiswa', 'AdminController@gettambahakunsiswa');
Route::get('/gettambahakunsiswa/importexcel', 'AdminController@gettambahakunsiswaexcel');
Route::get('/eksportakunsiswa', 'AdminController@eksportakunsiswa');
Route::get('/eksportdatasiswa', 'AdminController@eksportdatasiswapdf');

// MANAJEMEN AKUN ADMIN //
Route::get('/gettambahakunadmin', 'AdminController@gettambahakunadmin');
Route::get('/gettambahakunadmin/importexcel', 'AdminController@gettambahakunadminexcel');
Route::get('/eksportakunadmin', 'AdminController@eksportakunadmin');
Route::get('/eksportdataadmin', 'AdminController@eksportdataadmin');
Route::get('/updateakunadmin/{id}', 'AdminController@getupdateakunadmin');
Route::PATCH('/updatepasswordadmin/{id}', 'AdminController@updatepasswordadmin');
Route::PATCH('/updateakunadmin/{id}', 'AdminController@updateakunadmin');
Route::POST('/tambahakunadmin', 'AdminController@posttambahakunadmin');
Route::get('/hapusakunadmin/{id}', 'AdminController@hapusakunadmin');

//PROFILE ADMIN //
Route::get('/profileadmin', 'AdminController@profileadmin');
Route::PATCH('/profileadmin/{id}', 'AdminController@updateprofileadmin');


// MANAJEMEN AKUN SISWA //
Route::get('/updateakunsiswa/{id}', 'AdminController@getupdateakunsiswa');
Route::PATCH('/updateakunsiswa/{id}', 'AdminController@updateakunsiswa');
Route::PATCH('/updatepasswordsiswa/{id}', 'AdminController@updatepasswordsiswa');
Route::POST('/gettambahakunsiswa/importexcel', 'AdminController@posttambahakunsiswaexcel');
Route::POST('/tambahakunsiswa', 'AdminController@posttambahakunsiswa');
Route::delete('/hapusakunsiswa/{id}', 'AdminController@hapusakunsiswa');

Route::POST('/postinformasi', 'AdminController@postinformasi');
Route::get('/editmasterpengumuman/{id}', 'AdminController@editmasterpengumuman');
Route::PATCH('/editmasterdatapengumuman/{id}', 'AdminController@updatemasterdatapengumuman');
Route::delete('/hapusmasterdatapengumuman/{id}', 'AdminController@hapusmasterdatapengumuman');

// MANAJEMEN PDF ADMIN //
Route::get('/pdfdatasiswa', 'AdminController@pdfdatasiswa');
Route::get('/pdfakunsiswa', 'AdminController@pdfakunsiswa');
Route::get('/pdfdatakelas', 'AdminController@pdfdatakelas');
Route::get('/pdfakunadmin', 'AdminController@pdfakunadmin');
Route::get('/pdfpengumuman', 'AdminController@pdfpengumuman');
Route::get('/pdfdataguru', 'AdminController@pdfdataguru');


// MANAJEMEN EXCEL ADMIN //
Route::get('/eksportdatakelas', 'AdminController@eksportdatakelas');
Route::get('/eksportakunadmin', 'AdminController@eksportakunadmin');
Route::get('/eksportdataguru', 'AdminController@eksportdataguru');

//MENU MASTER DATA
Route::get('/masterdatasiswa', 'AdminController@masterdatasiswa');
Route::post('/masterdatasiswa', 'AdminController@masterdatasiswakategori');
Route::get('/masterdatapengumuman', 'AdminController@masterpengumuman');
Route::get('/masterdatakelas', 'AdminController@masterdatakelas');
Route::get('/editdatakelas/{id}/edit', 'AdminController@showeditdatakelas');
Route::PATCH('/editdatakelas/{id}', 'AdminController@updatemasterdatakelas');
Route::POST('/insertkelas', 'AdminController@insertkelas');
Route::delete('/hapuskelas/{id}', 'AdminController@hapuskelas');
Route::get('/masterdetailsiswa/{id}', 'AdminController@masterdetailsiswa');
Route::get('/admin/register', 'AuthAdmin\RegisterController@formregister')->name('admin.register');
Route::get('/masterdataguru', 'AdminController@masterdataguru');
Route::DELETE('/hapusdataguru/{id}', 'AdminController@hapusdataguru');

Route::get('/tahunajaran', 'AdminController@settingtahunajaran');
Route::get('/tahunajaran/{id}', 'AdminController@aktifkantahunajaran');
Route::get('/nonaktifkantahunajaran/{id}', 'AdminController@nonaktifkantahunajaran');

Route::get('/naikkelas', 'AdminController@getnaikkelas');




Route::get('/masterabsensiswa', 'AdminController@masterabsensiswa');
Route::DELETE('/hapusabsensiswa/{id}', 'AdminController@hapusabsensiswa');
Route::get('/detailabsen/{id}', 'AdminController@detailabsensiswa');

Route::POST('/masterdataguru', 'AdminController@masterdatagurukategori');
Route::POST('/insertdataguru', 'AdminController@insertdataguru');
Route::get('/masterdatawalas', 'AdminController@getmasterdatawalas');
Route::POST('/inputdatawalikelas', 'AdminController@postmasterdatawalas');


Route::get('/insertguru/importexcel', 'AdminController@getimportexcelguru');
Route::POST('/insertguru/importexcel', 'AdminController@postimportguru');

Route::GET('/detaildataguru/{id}', 'AdminController@detaildataguru');
Route::GET('/getupdatedataguru/{id}', 'AdminController@getupdatedataguru');
Route::PATCH('/postupdatedataguru/{id}', 'AdminController@postupdatedataguru');
Route::PATCH('/updatepasswordguru/{id}', 'AdminController@updatepasswordguru');





//////// ***** ROUTE GURU ****** ///////////////

// AUTH GURU //
Route::prefix('guru')->group(function() {
Route::get('/', 'AuthTeacher\LoginController@formlogin')->name('teacher.login');
Route::POST('/login', 'AuthTeacher\LoginController@login')->name('teacher.login.submit');
Route::get('/register', 'AuthTeacher\RegisterController@formregister')->name('teacher.register');
Route::get('/index', 'GuruController@index')->name('teacher.home');
Route::get('/logout', 'AuthTeacher\LoginController@logoutguru')->name('guru.logout');


// MANAJEMEN ABSENSI SISWA //
Route::get('/verifikasiabsen', 'GuruController@verifikasiabsen');
Route::get('/verifikasiabsen/{id}', 'GuruController@statusverifikasiabsen');
Route::get('/tolakverifikasiabsen/{id}', 'GuruController@tolakverifikasiabsen');
Route::get('/tolakverifikasiabsen/{id}', 'GuruController@detailtolakabsen');
Route::PATCH('/tolakabsen/{id}', 'GuruController@tolakverifikasiabsen');
Route::PATCH('/editabsensiswa/{id}', 'GuruController@postupdateabsensiswa');
Route::get('/daftarabsen', 'GuruController@daftarabsensiswa');
Route::get('/editabsensiswa/{id}', 'GuruController@geteditabsensiswa');
Route::POST('/laporanabsenkategori', 'GuruController@laporanabsenkategori');
Route::POST('/laporanabsenkategorikelas', 'GuruController@laporanabsenkategorikelas');



Route::get('/daftardatasiswa', 'GuruController@show');
Route::POST('/daftardatasiswa', 'GuruController@showsiswa');
Route::get('/daftarwalikelas', 'GuruController@daftardatawalikelas');
Route::get('/daftarakunsiswa', 'GuruController@daftarakunsiswa');
Route::get('/daftardataguru', 'GuruController@daftardataguru');
Route::POST('/daftardataguru', 'GuruController@daftardatagurukategori');
Route::get('/daftardatakelas', 'GuruController@daftardatakelas');
Route::get('/detaildatakelas/{id}', 'GuruController@detaildatakelas');
Route::get('/detaildatasiswa/{id}', 'GuruController@detaildatasiswa');
Route::get('/detailakunsiswa/{id}', 'GuruController@detailakunsiswa');
Route::get('/detaildataguru/{id}', 'GuruController@detaildataguru');

Route::get('/profileguru', 'GuruController@profileguru');
Route::get('/updateakunguru/{id}', 'GuruController@getupdateakunguru');
Route::PATCH('/updateakunguru/{id}', 'GuruController@updateakunguru');
Route::PATCH('/updatepasswordguru/{id}', 'GuruController@updatepasswordguru');

Route::get('/informasiguru', 'GuruController@informasiguru');
Route::get('/informasisiswa', 'GuruController@informasisiswa');
Route::get('/editinformasisiswa/{id}', 'GuruController@editinformasisiswa');
Route::PATCH('/editinformasisiswa/{id}', 'GuruController@updateinformasisiswa');
Route::POST('/postinformasi', 'GuruController@postinformasi');


//INPUT NILAI SISWA ///
Route::get('/inputnilaisiswa', 'GuruController@getinputnilaisiswa');
Route::get('/inputnilaisiswa/{id}/input', 'GuruController@forminputnilaisiswa');
Route::POST('/inputnilaitugas', 'GuruController@inputnilaitugas');
Route::PATCH('/inputnilaitugas', 'GuruController@inputnilaitugas');
Route::PATCH('/inputnilaiuts', 'GuruController@inputnilaiuts');
Route::PATCH('/inputnilaiuas', 'GuruController@inputnilaiuas');
Route::PATCH('/inputnilaiharian', 'GuruController@inputnilaiharian');
Route::PATCH('/inputnilaipraktek', 'GuruController@inputnilaipraktek');

Route::get('/inputabsensi', 'AdminController@inputabsensi');
Route::get('/inputabsensi/{id}/input ', 'AdminController@forminputabsensi');


// MANAJEMEN PDF GURUN //
Route::get('/pdfdatasiswa', 'GuruController@pdfdatasiswa');
Route::get('/pdfakunsiswa', 'GuruController@pdfakunsiswa');
Route::get('/pdfdatakelas', 'AdminController@pdfdatakelas');
Route::get('/pdfakunadmin', 'AdminController@pdfakunadmin');
Route::get('/pdfpengumuman', 'AdminController@pdfpengumuman');
Route::get('/pdfdataguru', 'GuruController@pdfdataguru');


// MANAJEMEN EXCEL GURU //
Route::get('/eksportdatasiswa', 'GuruController@eksportdatasiswa');
Route::get('/eksportakunsiswa', 'GuruController@eksportakunsiswa');
Route::get('/eksportdatakelas', 'AdminController@eksportdatakelas');
Route::get('/eksportdataguru', 'GuruController@eksportdataguru');
});





