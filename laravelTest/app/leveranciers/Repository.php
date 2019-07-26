<?php 

namespace App\Leveranciers;

use App\Leveranciers;
use Illuminate\Support\Facades\DB;

class Repository {


	public function getList(){
		DB::enableQueryLog(); 

		// select * from `leveranciers` limit 15 offset 0
		// Leveranciers::paginate();

		// Raw Expressions
		// return DB::table('leveranciers')
		// 	->orderBy('id', 'desc')
		// 	->get();


		/*----------------------- ITERATION -----------------------*/

		// select * from `leveranciers`
		// Leveranciers::all()->chunk(1);
		/*
			[  
			   [  
			      {  
			         "id":1,
			         "supplier_name":"Padberg, Howell and Hoppe",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   ],
			   {  
			      "1":{  
			         "id":2,
			         "supplier_name":"Grady LLC",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   },
			   {  
			      "2":{  
			         "id":3,
			         "supplier_name":"Kunde, Stiedemann and Mosciski",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   },
			   {  
			      "3":{  
			         "id":4,
			         "supplier_name":"Christiansen, Johnston and Hermiston",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   },
			   {  
			      "4":{  
			         "id":5,
			         "supplier_name":"Blick-Fisher",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   },
			   {  
			      "5":{  
			         "id":6,
			         "supplier_name":"Littel-Collier",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   },
			   {  
			      "6":{  
			         "id":7,
			         "supplier_name":"Prosacco PLC",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   },
			   {  
			      "7":{  
			         "id":8,
			         "supplier_name":"Zieme Group",
			         "created_at":"2019-05-27 06:00:47",
			         "updated_at":"2019-05-27 06:00:47"
			      }
			   },
			   {  
			      "8":{  
			         "id":9,
			         "supplier_name":"Pacocha Inc",
			         "created_at":"2019-05-27 06:00:47",
			         "updated_at":"2019-05-27 06:00:47"
			      }
			   },
			   {  
			      "9":{  
			         "id":10,
			         "supplier_name":"Schaden-Walsh",
			         "created_at":"2019-05-27 06:00:47",
			         "updated_at":"2019-05-27 06:00:47"
			      }
			   },
			   {  
			      "10":{  
			         "id":11,
			         "supplier_name":"Nokia",
			         "created_at":"2019-05-27 06:10:35",
			         "updated_at":"2019-05-27 06:10:35"
			      }
			   }
			]
		*/

		// select * from `leveranciers`	
		// Leveranciers::all()->chunk(2);	
		/*
			[  
			   [  
			      {  
			         "id":1,
			         "supplier_name":"Padberg, Howell and Hoppe",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      },
			      {  
			         "id":2,
			         "supplier_name":"Grady LLC",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   ],
			   {  
			      "2":{  
			         "id":3,
			         "supplier_name":"Kunde, Stiedemann and Mosciski",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      },
			      "3":{  
			         "id":4,
			         "supplier_name":"Christiansen, Johnston and Hermiston",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   },
			   {  
			      "4":{  
			         "id":5,
			         "supplier_name":"Blick-Fisher",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      },
			      "5":{  
			         "id":6,
			         "supplier_name":"Littel-Collier",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      }
			   },
			   {  
			      "6":{  
			         "id":7,
			         "supplier_name":"Prosacco PLC",
			         "created_at":"2019-05-27 06:00:46",
			         "updated_at":"2019-05-27 06:00:46"
			      },
			      "7":{  
			         "id":8,
			         "supplier_name":"Zieme Group",
			         "created_at":"2019-05-27 06:00:47",
			         "updated_at":"2019-05-27 06:00:47"
			      }
			   },
			   {  
			      "8":{  
			         "id":9,
			         "supplier_name":"Pacocha Inc",
			         "created_at":"2019-05-27 06:00:47",
			         "updated_at":"2019-05-27 06:00:47"
			      },
			      "9":{  
			         "id":10,
			         "supplier_name":"Schaden-Walsh",
			         "created_at":"2019-05-27 06:00:47",
			         "updated_at":"2019-05-27 06:00:47"
			      }
			   },
			   {  
			      "10":{  
			         "id":11,
			         "supplier_name":"Nokia",
			         "created_at":"2019-05-27 06:10:35",
			         "updated_at":"2019-05-27 06:10:35"
			      }
			   }
			]
		*/	

		// Leveranciers::all()->chunk(2)->eachSpread(function($team1, $team2){
		// 	dd($team1);
		// });

		// select * from `leveranciers`	
		// return Leveranciers::all()->map(function($leveranciers, $key){
		// 	return $leveranciers->supplier_name;
		// });	

		/*
			[  
			   "Padberg, Howell and Hoppe",
			   "Grady LLC",
			   "Kunde, Stiedemann and Mosciski",
			   "Christiansen, Johnston and Hermiston",
			   "Blick-Fisher",
			   "Littel-Collier",
			   "Prosacco PLC",
			   "Zieme Group",
			   "Pacocha Inc",
			   "Schaden-Walsh",
			   "Nokia"
			]
		*/

		/*----------------------- END ITERATION -----------------------*/	

		/*----------------------- FILTERING -----------------------*/


		// select * from `leveranciers`
		// Leveranciers::all()->first();
		/*
			{  		
			   "id":1,
			   "supplier_name":"Padberg, Howell and Hoppe",
			   "created_at":"2019-05-27 06:00:46",
			   "updated_at":"2019-05-27 06:00:46"
			}
		*/

		// select * from `leveranciers	
		// Leveranciers::all()->firstWhere('users_count', '>', 2);	

		// select * from `leveranciers`	
		// Leveranciers::all()->filter();	
		/*
			[  
			   {  
			      "id":1,
			      "supplier_name":"Padberg, Howell and Hoppe",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":2,
			      "supplier_name":"Grady LLC",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":3,
			      "supplier_name":"Kunde, Stiedemann and Mosciski",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":4,
			      "supplier_name":"Christiansen, Johnston and Hermiston",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":5,
			      "supplier_name":"Blick-Fisher",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":6,
			      "supplier_name":"Littel-Collier",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":7,
			      "supplier_name":"Prosacco PLC",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":8,
			      "supplier_name":"Zieme Group",
			      "created_at":"2019-05-27 06:00:47",
			      "updated_at":"2019-05-27 06:00:47"
			   },
			   {  
			      "id":9,
			      "supplier_name":"Pacocha Inc",
			      "created_at":"2019-05-27 06:00:47",
			      "updated_at":"2019-05-27 06:00:47"
			   },
			   {  
			      "id":10,
			      "supplier_name":"Schaden-Walsh",
			      "created_at":"2019-05-27 06:00:47",
			      "updated_at":"2019-05-27 06:00:47"
			   },
			   {  
			      "id":11,
			      "supplier_name":"Nokia",
			      "created_at":"2019-05-27 06:10:35",
			      "updated_at":"2019-05-27 06:10:35"
			   }
			]
		*/

		// select * from `leveranciers 
		// Leveranciers::all()->reject(function($leveranciers){
		// 	$leveranciers->users_count > 2;
		// });		
		/*
			[  
			   {  
			      "id":1,
			      "supplier_name":"Padberg, Howell and Hoppe",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":2,
			      "supplier_name":"Grady LLC",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":3,
			      "supplier_name":"Kunde, Stiedemann and Mosciski",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":4,
			      "supplier_name":"Christiansen, Johnston and Hermiston",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":5,
			      "supplier_name":"Blick-Fisher",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":6,
			      "supplier_name":"Littel-Collier",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":7,
			      "supplier_name":"Prosacco PLC",
			      "created_at":"2019-05-27 06:00:46",
			      "updated_at":"2019-05-27 06:00:46"
			   },
			   {  
			      "id":8,
			      "supplier_name":"Zieme Group",
			      "created_at":"2019-05-27 06:00:47",
			      "updated_at":"2019-05-27 06:00:47"
			   },
			   {  
			      "id":9,
			      "supplier_name":"Pacocha Inc",
			      "created_at":"2019-05-27 06:00:47",
			      "updated_at":"2019-05-27 06:00:47"
			   },
			   {  
			      "id":10,
			      "supplier_name":"Schaden-Walsh",
			      "created_at":"2019-05-27 06:00:47",
			      "updated_at":"2019-05-27 06:00:47"
			   },
			   {  
			      "id":11,
			      "supplier_name":"Nokia",
			      "created_at":"2019-05-27 06:10:35",
			      "updated_at":"2019-05-27 06:10:35"
			   }
			]
		*/

		// return Leveranciers::all()->search(function($leveranciers){
		// 	$leveranciers->users_count > 2;
		// });		

		/*----------------------- END FILTERING -----------------------*/

		$query = DB::getQueryLog();
		$query = end($query);
		dd($query);	
	}

	public function getById($leveranciers){
		// return DB::table('leveranciers')->orderBy($leveranciers->id)->get();
		// return DB::select('select * from leveranciers where id = :id', ['id' => $leveranciers->id]);


		/*
		
		leveranciers	
		id | supplier_name | created_at | updated_at 
		
		tickets
		id | title | description | leveranciers_id | created_at | updated_at 
		
		points
		id | value | ticket_id | owner_id | created_at | updated_at 
			
		users
		id | name | email | email_verified_at | password | leveranciers_id | remember_token | created_at | updated_at	

		*/


		// DB::enableQueryLog(); 
		// $user = DB::table("users")->get();
		// $query = DB::getQueryLog();
		// $query = end($query);
		// dd($query);

		/* format 

		SELECT column_name(s)
		FROM table1
		INNER JOIN table2
		ON table1.column_name = table2.column_name;

		SELECT `users`.`id`
		FROM `leveranciers`
		INNER JOIN `users` 
		ON `leveranciers`.`id` = `users`.`leveranciers_id`
		WHERE `leveranciers`.`id` = 1;
		*/
			
		$users = $leveranciers
		// where `leveranciers`.`id` = ?
		->where('leveranciers.id', $leveranciers->id)
		
		// inner join `users` 
		// on `leveranciers`.`id` = `users`.`leveranciers_id`
		->join('users', 'leveranciers.id', '=', 'users.leveranciers_id')

		// select `users`.`id` from `leveranciers`
		->select('users.id');
				
		return $leveranciers
		// where `leveranciers`.`id` = ?
		->where('leveranciers.id', $leveranciers->id)
	
		// inner join `tickets` on `leveranciers`.`id` = `tickets`.`leveranciers_id
		->join('tickets', 'leveranciers.id', '=', 'tickets.leveranciers_id')

		// inner join `points` on `tickets`.`id` = `points`.`ticket_id`
		->join('points', 'tickets.id', '=', 'points.ticket_id')

		// and `points`.`owner_id` in (select `users`.`id` from `leveranciers` inner join `users` on `leveranciers`.`id` = `users`.`leveranciers_id` where `leveranciers`.`id` = ?)
		->whereIn('points.owner_id', $users)

		// select sum(`points`.`value`) as aggregate
		->sum('points.value');



		// $query = DB::getQueryLog();
		// $query = end($query);
		// dd($query);	
	}

	public function save($request){
		$leveranciers = new Leveranciers;
		$leveranciers->supplier_name = $request->input('supplier_name');
		$leveranciers->save();
		return;
	}


}