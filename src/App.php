<?php

use Google\Cloud\Firestore\CollectionReference;
use Google\Cloud\Firestore\DocumentSnapshot;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\QuerySnapshot;
use Kreait\Firebase\Factory;

/**
 * Class App
 *
 * Our workhorse.
 */
class App
{
	/**
	 * Firestore Client instance.
	 *
	 * @var Google\Cloud\Firestore\FirestoreClient
	 */
	public $client;

	/**
	 * Prep our client.
	 */
	public function initialize()
	{
		// Use the SDK to connect a Firestore Client
		$this->client = (new Factory)->createFirestore()->database();

		$this->expectType($this->client, FirestoreClient::class);
	}

	/**
	 * Run our app.
	 *
	 * @return string  Output for the browser/CLI
	 */
	public function run(): string
	{
		// Get our CollectionReference
		$collection = $this->client->collection('users');
		$this->expectType($collection, CollectionReference::class);

		// Fish for the first row
		$snapshot = $collection->limit(1)->documents();
		$this->expectType($snapshot, QuerySnapshot::class);

		// If nothing matched then quit
		if ($snapshot->isEmpty())
		{
			throw new \RuntimeException('Failed to find any documents in `users` collection');
		}

		// Get the actual document
		$documents = $snapshot->rows();
		$document  = reset($documents);
		$this->expectType($document, DocumentSnapshot::class);

		// Get the metadata fields
		$row = [
			'id'        => $document->id(),
			'createdAt' => $document->createTime(),
			'updatedAt' => $document->updateTime(),
		];

		// Add the array of data
		$row = array_merge($row, $document->data());

		// Backtrace will include the FirestoreClient in this class, which causes the failure
		$trace  = debug_backtrace();
		print_r($trace);

		return print_r($row, true);
	}

	/**
	 * Checks a variable for expected type and throws on failure.
	 *
	 * @return string  Output for the browser/CLI
	 */
	protected function expectType(&$var, string $type)
	{
		if (! is_object($var))
		{
			print_r($var);
			throw new \RuntimeException('Failed to acquire on object for ' . $type);
		}

		if (get_class($var) !== $type)
		{
			print_r($var);
			throw new \RuntimeException(get_class($var) . ' does not match expected type ' . $type);
		}
	}
}
