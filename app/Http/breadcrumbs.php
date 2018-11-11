<?php

Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));

});

Breadcrumbs::register('category', function($breadcrumbs, $category) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category);
});
Breadcrumbs::register('posts', function($breadcrumbs, $view) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($view->category->categoryname, url('category/'.$view->category->categoryname));
    $breadcrumbs->push($view->title, url('posts/'.$view->title_coll));
});
