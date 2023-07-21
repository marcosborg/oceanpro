<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\InnerService;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceList;
use App\Models\Slide;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {

        $slides = Slide::all();
        $serviceList = ServiceList::all();
        $feature1 = Feature::find(1);
        $feature2 = Feature::find(2);
        $innerServices = InnerService::all();

        return view('website.pages.home', compact('slides', 'serviceList', 'feature1', 'feature2', 'innerServices'));
    }

    public function aboutUs()
    {

        $page = Page::find(1);

        return view('website.pages.about_us', compact('page'));
    }

    public function services()
    {
        $services = Service::all();

        return view('website.pages.services', compact('services'));

    }

    public function service($url)
    {
        switch ($url) {
            case 'mergulho-profissional':
                $page_id = 2;
                $service_id = 1;
                break;
            case 'inspecao-e-reabilitacao';
                $page_id = 3;
                $service_id = 2;
                break;
            case 'dragagens-e-drenagens';
                $page_id = 4;
                $service_id = 3;
                break;
            default:
                $page_id = 5;
                $service_id = 4;
                break;
        }

        $page = Page::find($page_id);
        $service = Service::find($service_id);

        return view('website.pages.service', compact('page', 'service'));
    }

    public function quotation()
    {

        $services = Service::all();

        return view('website.pages.quotation', compact('services'));
    }

    public function contacts()
    {
        return view('website.pages.contacts');
    }
}