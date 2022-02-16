<?php

namespace App\Interfaces;

interface SearchServiceInterface {
    public function getSearchHistories($request);

    public function getSearchSuggestions($request);

    public function storeSearchHistory($request);

    public function removeSearchHistory($request);
}