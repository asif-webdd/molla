<?php

use App\Models\Admin\Category;


/********** Message **********/
function set_message($type, $message){
    session()->flash('type', $type);
    session()->flash('message', $message);
}


/********** Verify Token **********/
function random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


/********** Slug **********/
function slugify($text, string $divider = '-'): string
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}


/********** Category Options **********/
function category_options($categories, $label = 2, $selected = null, $product = false)
{
    if ($product) $html = '<option value="">Select Category</option>';
    else $html = '<option value="0">Root</option>';

    foreach ($categories as $category) {

        if ($selected === $category->id) {
            $html .= '<option value="' . $category->id . '" selected="">' . $category->name . '</option>';
        } else {
            $html .= '<option value="' . $category->id . '">' . $category->name . '</option>';
        }

        if ($label >= 2) {
            foreach ($category->sub_cats as $sub_category) {

                if ($selected === $sub_category->id) {
                    $html .= '<option value="' . $sub_category->id . '" selected="">' . $category->name . ' > ' . $sub_category->name . '</option>';
                } else {
                    $html .= '<option value="' . $sub_category->id . '">' . $category->name . ' > ' . $sub_category->name . '</option>';
                }

                if ($label >= 3) {
                    foreach ($sub_category->sub_cats as $sub_sub_category) {
                        $html .= '<option value="' . $sub_sub_category->id . '">' . $category->name . ' > ' . $sub_category->name . ' > ' . $sub_sub_category->name . '</option>';
                    }
                }
            }
        }
    }
    return $html;
}


function get_cat_ids($category)
{
    $ids = [$category->slug];

    $sub_cats = Category::where('root', $category->slug)->get();
    foreach ($sub_cats as $sub) {
        array_push($ids, $sub->slug);
        $sub_sub_cats = Category::where('root', $sub->slug)->get();
        foreach ($sub_sub_cats as $cats) {
            array_push($ids, $cats->slug);
        }
    }

    return $ids;
}


function order_status($key = null)
{
    $data = [
        'pending' => 'pending',
        'success' => 'success',
        'shipped' => 'shipped',
        'return' => 'return',
    ];

    if ($key) return array_rand($data);
    else return $data;
}








