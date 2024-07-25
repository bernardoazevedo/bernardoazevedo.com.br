#php #laravel 

Any: `Route::any('/nomeDaRota', function(){
	return "seuRetornoAqui";
});`: Permite todo tipo de acesso http (put, delete, get, pos)

Match: `Route::match(['get', 'post'], '/nomeDaRota', function(){
	return "seuRetornoAqui";
});`: Permite apenas os acessos http definidos (get e post no exemplo)