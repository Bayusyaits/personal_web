<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\MrCategories;
use App\Models\MrContentLanguage;
use App\Models\MrContentManagement;
use App\Models\MrMedia;
use App\Models\DynMenu;

class AppController extends Controller
{
    //

    public function getPages($list = "") {
        switch($list)  {
            case 'menu' : $dm = DynMenu::active()->get(); break;
            case 'content-menu' : $dm = MrContentManagement::contentmenu()->get(); break;
            case 'case-studies' : $dm = MrContentManagement::contentmenucasestudies()->get(); break;
        }
        return $dm;
    }
    public function getCategories($list = "") {
        switch($list)  {
            case 'fields' : $dm = MrCategories::fields()->get(); break;
            case 'categories' : $dm = MrCategories::categories()->get(); break;
        }
        return $dm;
    }
}
