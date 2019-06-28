<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
							//create or use database  or use/create collections/drop them
$db = $client->companydb;
$collection = $db->emp2;

/*$collection = $db->collection_name;
$result = $db->createCollection('emp');

foreach($db->listCollections() as $coll)
{
	var_dump($coll);

	}

$result1 = $db->createCollection('emp2');
$result2 = $db->dropCollection('emp1');

print_r($result2);
foreach($client->listDatabases() as $db)
{
	
	print_r($db);
}

	//insertone 



$insertone = $collection->insertOne(['id' => 1,'name' => 'akhil','branch'=>'cse']);
printf("The no. of insertions is %d",$insertone->getInsertedCount());
print_r($insertone->getInsertedId());

		//insert many
		
		
	
	$id = 10;
	$insertmany = $collection->insertMany([['_id' => $id,'name' => 'akash','branch' => 'cse'],
									      ['_id' => 9,'name' => 'halo','branch' => 'cse']]);

		printf("The no. of insertions is %d",$insertmany->getInsertedCount());
		print_r("Inserted id is ".$insertmany->getInsertedIds());								

   //findOne()
		
		$doc = $collection->findOne(['_id' =>10]);
		print_r($doc);
		
    //findMany() with projection		
		
		$doc = $collection->find(['branch' => 'cse' ],
								 ['projection' => ['_id' => '1','name'=>1,]]);
		
		foreach( $doc as $d)
		{
			print_r($d);
		}


		//updateOne()
		
		$res = $collection->updateOne(['name' => 'alam'],
									  ['$set' => ['name' => 'alok']]);
		printf("%d matched \n",$res->getMatchedCount());								


//updateMany()
				$res = $collection->updateMany(['branch' => 'cse'],
												['$set' => ['add' => 'hello']]);

				printf("%d matched \n",$res->getMatchedCount());
				
				
*/	//replaceOne()

			$res = $collection->replaceOne(['_id' => 4],
										   [ '_id' => 4, 'name' => 'halaa' ,'ohoda'=>'mana']);
	
				printf("%d matched \n",$res->getMatchedCount());
?>