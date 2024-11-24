<?php

class ErrorHandler extends Controller {
    public function pageNotFound() {
        $this->view('client/view/error/404');
    }
    
    public function pageNotAllowed() {
        $this->view('client/view/error/405');
    }
}