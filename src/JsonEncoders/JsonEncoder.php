<?php

namespace Swis\LaravelApi\JsonEncoders;

use Illuminate\Contracts\Pagination\Paginator;
use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\EncoderOptions;
use Neomerx\JsonApi\Encoder\Parameters\EncodingParameters;
use Swis\LaravelApi\Exceptions\SchemaNotFoundException;
use Swis\LaravelApi\Repositories\Repository;

class JsonEncoder
{
    /**
     * @var Repository
     * */
    protected $repository;
    protected $modelsToEncode;

    /**
     * Encodes the given data to the JSON API format.
     *
     * @param $object
     *
     * @return string
     */
    public function encodeToJson($object)
    {
        $encoder = Encoder::instance($this->getModelsToEncode(), $this->getEncoderOptions())->withMeta($this->getMeta($object));

        return $encoder->encodeData($object, new EncodingParameters($this->getIncludes()));
    }

    protected function getEncoderOptions()
    {
        return new EncoderOptions(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES, env('API_URL'));
    }

    protected function getIncludes()
    {
        return explode(',', request()->get('include', null));
    }

    protected function getMeta($items)
    {
        if (!$items instanceof Paginator) {
            return null;
        }

        return [
            'total' => $items->count(),
            'per_page' => $items->perPage(),
            'current_page' => $items->currentPage(),
            'total_pages' => $items->lastPage(),
            'previous_page_url' => $items->previousPageUrl(),
            'next_page_url' => $items->nextPageUrl(),
        ];
    }

    public function setRepository(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * This method generates Model names and ModelSchema names based on the repository model.
     *
     * @return array|mixed
     */
    protected function getModelsToEncode()
    {
        $model = $this->repository->getModel();
        $modelClass = get_class($model);
        $this->insertIntoModelsToEncode($modelClass);

        $relationships = $this->repository->getModelRelationships();
        foreach ($relationships as $relation) {
            $modelClass = get_class($model->$relation()->getRelated());
            $this->insertIntoModelsToEncode($modelClass);
        }

        return $this->modelsToEncode;
    }

    /**
     * Helper function to insert the model and schema into an array.
     * Example: [User::class => UserSchema::class];
     *
     * @param $modelClass
     * @return mixed
     */
    protected function insertIntoModelsToEncode($modelClass)
    {
        $schemaName = $this->createSchemaName($modelClass);
        $this->modelsToEncode[$modelClass] = $schemaName;

        return $this;
    }

    protected function createSchemaName($modelClass)
    {
        $modelSchema = app()->make($modelClass)->schema;
        if ($modelSchema !== null) {
            return $modelSchema;
        }

        // TODO: Met Arnaud bespreken of we niet gewoon altijd willen configureren in de Model. Dus als modelSchema null is throw new Exception
        $schemaInModelFolder = $modelClass.'\\'.class_basename($modelClass).'Schema';
        if (class_exists($schemaInModelFolder)) {
            return $schemaInModelFolder;
        }

        $schemaInSchemasFolder = 'App\JsonSchemas\\'.class_basename($modelClass).'Schema';
        if (class_exists($schemaInSchemasFolder)) {
            return $schemaInSchemasFolder;
        }

        throw new SchemaNotFoundException('No Schema found for: ' . $modelClass);
    }
}