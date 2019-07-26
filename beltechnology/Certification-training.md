https://certification.laravel.com/prepare/

Caching https://laravel.com/docs/5.7/session
1.  Drivers / Configuration

	- where session configuration file stored ?
	 	* config/session.php
	- default session driver ? 
	 	* file 
	 	ex: 
	 	return [
	 	    'driver' => env('SESSION_DRIVER', 'file'),
	 	];
	- supported session driver ? 
		"file", "cookie", "database", "apc","memcached", "redis", "array"     

	- when to use memcached or redis ? 
		* when in production mode

	- why used memcached or redis drivers in production mode ? 
		*  for even faster session performance.

	- what is session driver ?

		ex: 
			return [
	 	    	'driver' => '' 
	 	    ];	

	 	* defines where session data will be stored for each request.    

	- what 'file' do ?
		* file - sessions are stored in storage/framework/sessions.

	- what 'cookie' do ?
		* cookie - sessions are stored in secure, encrypted cookies.

	- what 'database' do ?
		* database - sessions are stored in a relational database.

	- what 'memcached / redis ' do ?
		* memcached / redis - sessions are stored in one of these fast, cache based stores.

	- what 'array' do ?
		* array - sessions are stored in a PHP array and will not be persisted.

https://github.com/TBlindaruk/laravel-certification-preparing/blob/master/documentation/certification.md
laravel-certification-preparing

// Request Lifecycle
laravel/
	pub/
		index.php - The entry point for all requests to a Laravel application
		bootstrap/
			app.php - 	
		app/
			Http/
				Kernel.php - extends Illuminate\Foundation\Http\Kernel
		config/
			app.php - configured all of the service providers for the application.
					array => providers - configuration file's
		vendor/
			laravel/
				framework/
					src/
						Illuminate/
							foundation/
								Http/
									Kernel.php - which defines an array of bootstrappers that will be run before the request is executed. 
												::handle() -  receive a Request and return a Response 

