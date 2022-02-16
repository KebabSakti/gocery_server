<?php

namespace App\Services;

use App\Models\Search;
use Illuminate\Support\Str;
use App\Interfaces\SearchServiceInterface;

class SearchService implements SearchServiceInterface {
    public function getSearchHistories($request) {
        $keywords = Search::where('customer_account_uid', $request->user()->uid)->orderBy('created_at', 'desc')->limit(5)->get();

        return $keywords;
    }

    public function getSearchSuggestions($request) {
        $keywords = Search::selectRaw('keyword, count(keyword) as search_count')
                          ->where('keyword', 'like', '%'.$request->keyword.'%')
                          ->orderByRaw('count(keyword) desc')
                          ->groupBy('keyword')
                          ->limit(5)
                          ->get();

        return $keywords;
    }


    public function storeSearchHistory($request) {
        $keyword = Search::where('keyword', $request->keyword)->where('customer_account_uid', $request->user()->uid)->firstOrFail();

        if($keyword == null) {
            Search::create([
                'customer_account_uid' => $request->user()->uid,
                'uid' => Str::uuid(),
                'keyword' => $request->keyword,
            ]);
        }
    }


    public function removeSearchHistory($request) {
        $keyword = Search::where('uid', $request->uid)->where('customer_account_uid', $request->user()->uid)->firstOrFail();

        $keyword->delete();
    }
}