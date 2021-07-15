<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Archive extends Controller
{    
    public function projects() {
        $mode = isset($_GET['creations']) ? 'creations' : 'projects';
        
        $list_clean = [];

        // Return projects
        if($mode === 'projects') {
            $arg = [
                'posts_per_page' => -1,
                'post_type' => 'project'
            ];

            $projectsList = get_posts($arg);
            $list_clean = [];

            if(!empty($projectsList)) {
                foreach($projectsList as $project) {
                    $list_clean[] = [
                        'title'   => $project->post_title,
                        'slug'    => $project->post_name,
                        'image'   => get_the_post_thumbnail_url($project->ID, 'project-miniature'),
                        'link'    => get_permalink($project->ID),
                        'tags'    => get_the_tags($project->ID)
                    ];
                }
            }
        }
        
        // Return creations
        if ($mode === 'creations') {
            $arg = [
                'posts_per_page' => -1,
                'post_type' => 'creation'
            ];

            $creationsList = get_posts($arg);

            if(!empty($creationsList)) {
                foreach($creationsList as $creation) {
                    $list_clean[] = [
                        'title'       => $creation->post_title,
                        'slug'        => $creation->post_name,
                        'description' => get_field('description', $creation->ID),
                        'media'       => get_field('media', $creation->ID),
                        'link'        => get_permalink($creation->ID),
                        'tags'        => get_the_tags($creation->ID),
                    ];
                }
            }
        }

        return [
            'mode' => $mode,
            'list' => $list_clean, 
        ];
    }
}
