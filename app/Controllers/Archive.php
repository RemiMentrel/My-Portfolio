<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Archive extends Controller
{    
    public function projects() {
        $arg = [
            'posts_per_page' => -1,
            'post_type' => 'project'
        ];

        $projects = get_posts($arg);
        $projects_clean = [];

        if(!empty($projects)) {
            foreach($projects as $project) {
                $projects_clean[] = [
                    'title'       => $project->post_title,
                    'slug'        => $project->post_name,
                    'logo'        => get_field('logo', $project->ID),
                    'color'       => get_field('color', $project->ID),
                    'preview'     => get_field('preview_visual', $project->ID),
                    'description' => get_field('introduction', $project->ID)['content']['title'],
                    'link'        => get_permalink($project->ID),
                    'tags'        => get_the_tags($project->ID)
                ];
            }
        }

        return $projects_clean;
    }

    public function experiences() {
        $arg = [
            'posts_per_page' => -1,
            'post_type'      => 'experience',
            'category'       => get_queried_object_id()
        ];

        $experiences = get_posts($arg);
        $experiences_clean = [];

        if(!empty($experiences)) {
            foreach($experiences as $experience) {
                $experiences_clean[] = [
                    'title'       => $experience->post_title,
                    'slug'        => $experience->post_name,
                    'description' => get_field('description', $experience->ID),
                    'media'       => get_field('media', $experience->ID),
                    'link'        => get_permalink($experience->ID),
                    'categories'  => get_the_category($experience->ID)
                ];
            }
        }

        return $experiences_clean;
    }

    public function categories() {
        $categories = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ) );
        $categories_clean = [];

        foreach ($categories as $category) {
            if ($category->term_id === 1)
                continue;

            $categories_clean[] = [
                'name'    => $category->name,
                'slug'    => $category->slug,
                'link'    => get_category_link($category),
                'current' => get_queried_object_id() === $category->term_id,
            ];
        }

        return $categories_clean;
    }
}
