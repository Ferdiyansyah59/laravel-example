<?php

namespace App\Models;


class Posts
{
    private static $blog_posts = [
        [
            "title" => "Halaman Pertama",
            "slug" => "halaman-pertama",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Deleniti ex itaque nihil amet repudiandae, quos cumque non ducimus necessitatibus 
            explicabo? In, sapiente, quo fuga est at, perspiciatis quas explicabo sequi 
            doloribus unde maxime expedita autem. Maiores excepturi enim eligendi labore sint 
            a voluptate alias cupiditate porro. Autem ullam voluptates impedit iusto animi, dolorum 
            beatae natus pariatur porro dolores sapiente! Odio vero ullam at harum hic nihil blanditiis 
            illum eum est enim fugit dolorum alias quaerat reprehenderit eveniet, cupiditate sequi qui. 
            Sed officiis pariatur et, distinctio, placeat sint voluptatem earum accusamus laudantium vitae 
            nulla obcaecati vel temporibus nemo tempora at labore."
        ],
        [
            "title" => "Halaman Kedua",
            "slug" => "halaman-kedua",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Deleniti ex itaque nihil amet repudiandae, quos cumque non ducimus necessitatibus 
            explicabo? In, sapiente, quo fuga est at, perspiciatis quas explicabo sequi 
            doloribus unde maxime expedita autem. Maiores excepturi enim eligendi labore sint 
            a voluptate alias cupiditate porro. Autem ullam voluptates impedit iusto animi, dolorum 
            beatae natus pariatur porro dolores sapiente! Odio vero ullam at harum hic nihil blanditiis 
            illum eum est enim fugit dolorum alias"
        ]
    ];

    public static function all() {
        // Karena Properti static jadi gini
        return collect(self::$blog_posts);

        // Kalau properti biasa
        // return $this->blog_posts
    }

    public static function find($slug) {
        $posts = static::all();
        
        return $posts->firstWhere('slug', $slug);
    }
}
