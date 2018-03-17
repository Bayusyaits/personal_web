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
            case 'home' : $dm = MrContentManagement::contentmenupage(55101)->first(); break;
            case 'about' : $dm = MrContentManagement::contentmenupage(55102)->first(); break;
            case 'case-studies' : $dm = MrContentManagement::contentmenupage(55103)->first(); break;
            case 'contact' : $dm = MrContentManagement::contentmenupage(55104)->first(); break;
        }
        return $dm;
    }
    public function getCaseStudies($list = "") {
        switch($list)  {
            case 'projects' : $dm = MrContentManagement::contentmenucasestudies()->get(); break;
        }
        return $dm;
    }
    public function getMedSos($list = "") {
        switch($list)  {
            case 'med-sos' : $dm = MrMedia::medialogosmedsos()->get(); break;
        }
        return $dm;
    }
    public function getCategories($list = "") {
        switch($list)  {
            case 'fields' : $mc = MrCategories::fields()->get(); break;
            case 'categories' : $mc = MrCategories::categories()->get(); break;
            case 'subjects' : $mc = MrCategories::subjects()->get(); break;
        }
        return $mc;
    }
}
