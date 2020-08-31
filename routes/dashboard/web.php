<?php

Route::prefix('dashboard')->name('dashboard.')->group(function(){

  route::get('/check',function(){

return "hi";

  });

});

?>
