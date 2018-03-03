<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller\FrontendController;

class DynMenuController extends FrontendController
{
    //
    public function getContact() {
    	$dm = DynMenu::menuactive()->get();
    	return $dm;
    }
}
