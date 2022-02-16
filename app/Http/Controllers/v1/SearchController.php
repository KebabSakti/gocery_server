<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SearchResource;
use App\Interfaces\SearchServiceInterface;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $service;

    public function __construct(SearchServiceInterface $service)
    {   
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $searches = $this->service->getSearchHistories($request);

        $collections = SearchResource::collection($searches);
        
        return $collections;
    }

    public function suggestion(Request $request)
    {
        $searches = $this->service->getSearchSuggestions($request);

        $collections = SearchResource::collection($searches);
        
        return $collections;
    }

    public function store(Request $request)
    {
        $this->service->storeSearchHistory($request);
    }

    public function delete(Request $request)
    {
        $this->service->removeSearchHistory($request);
    }
}
