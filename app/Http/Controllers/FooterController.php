<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{



    //Footer--Menu

    public function payKode24()
    {
        return view('footerMenu.payKode24');
    }

    public function fees()
    {
        return view('footerMenu.fees');
    }

    public function invoices()
    {
        return view('footerMenu.invoices');
    }


    public function fAQ()
    {
        return view('footerMenu.fAQ');
    }

    public function blog()
    {
        return view('footerMenu.blog');
    }

    public function partners()
    {
        return view('footerMenu.partners');
    }

    public function agreement()
    {
        return view('footerMenu.agreement');
    }

    public function privacyPolicy()
    {
        return view('footerMenu.privacyPolicy');
    }

    public function amlKYCPolicy()
    {
        return view('footerMenu.amlKYCPolicy');
    }

    public function aboutUs()
    {
        return view('footerMenu.aboutUs');
    }

    public function contacts()
    {
        return view('footerMenu.contacts');
    }

    public function newses()
    {
        return view('footerMenu.newses');
    }



}
