<?php

namespace App\Search;

use App\Release;
use Elasticsearch\Client;

class ElasticsearchObserver
{
    /** @var \Elasticsearch\Client */
    private $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }
    public function saved($model)
    {
        $this->elasticsearch->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
            'body' => $model->toSearchArray(),
        ]);
    }

    public function deleted($model)
    {
        $this->elasticsearch->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
        ]);
    }
    /**
     * Handle the release "created" event.
     *
     * @param  \App\Release  $release
     * @return void
     */
    public function created(Release $release)
    {
        //
    }

    /**
     * Handle the release "updated" event.
     *
     * @param  \App\Release  $release
     * @return void
     */
    public function updated(Release $release)
    {
        //
    }

    /**
     * Handle the release "restored" event.
     *
     * @param  \App\Release  $release
     * @return void
     */
    public function restored(Release $release)
    {
        //
    }

    /**
     * Handle the release "force deleted" event.
     *
     * @param  \App\Release  $release
     * @return void
     */
    public function forceDeleted(Release $release)
    {
        //
    }
}
