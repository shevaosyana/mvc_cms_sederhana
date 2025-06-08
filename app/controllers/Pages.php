<?php

class Pages extends Controller {
    public function __construct() {
    }

    public function index() {
        $data = [
            'title' => 'Welcome to ' . SITENAME,
            'description' => 'Simple CMS built with custom MVC framework'
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];

        $this->view('pages/about', $data);
    }
} 