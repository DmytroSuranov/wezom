<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use App\StaticPage;
use App\Tag;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $category_culture = Category::where('name', 'LIKE', 'Культура')->where('publication', '=', 'yes')->first();
        $category_politic = Category::where('name', 'LIKE', 'Политика')->where('publication', '=', 'yes')->first();
        $category_sport = Category::where('name', 'LIKE', 'Спорт')->where('publication', '=', 'yes')->first();
        $about_page = StaticPage::where('url', 'LIKE', 'about')->where('publication', '=', 'yes')->first();
        $contact_page = StaticPage::where('url', 'LIKE', 'contact')->where('publication', '=', 'yes')->first();
        $football_tag = Tag::where('name', 'LIKE', 'Футбол')->where('publication', '=', 'yes')->first();
        View::share ( 'culture', $category_culture);
        View::share ( 'politic', $category_politic);
        View::share ( 'sport', $category_sport);
        View::share ( 'about_page', $about_page);
        View::share ( 'contact_page', $contact_page);
        View::share ( 'football_tag', $football_tag);
    }
}
