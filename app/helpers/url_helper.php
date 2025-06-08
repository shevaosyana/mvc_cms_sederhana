<?php
// Redirect function
function redirect($page) {
    header('location: ' . URLROOT . '/' . $page);
}

// Get current URL
function currentUrl() {
    return URLROOT . '/' . $_GET['url'];
}

// Get base URL
function baseUrl() {
    return URLROOT;
} 