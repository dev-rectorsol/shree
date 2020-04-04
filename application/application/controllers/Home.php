<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// *************************************************************************
// *                                                                       *
// * Optimum LinkupComputers                              *
// * Copyright (c) Optimum LinkupComputers. All Rights Reserved                     *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: info@optimumlinkupsoftware.com                                 *
// * Website: https://optimumlinkup.com.ng								   *
// * 		  https://optimumlinkupsoftware.com							   *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// *                                                                       *
// *************************************************************************

//LOCATION : application - controller - Auth.php

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('web_model');
    }


    public function index(){
        $data = array();
        $data['page'] = 'Home';
        $data['main_content'] = $this->load->view('web/home', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function about(){
        $data = array();
        $data['page'] = 'About Us';
        $data['main_content'] = $this->load->view('web/about/about', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function service(){
        $data = array();
        $data['page'] = 'Our Services';
        $data['main_content'] = $this->load->view('web/services', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function privacy_policy(){
        $data = array();
        $data['page'] = 'Privacy Policy';
        $data['main_content'] = $this->load->view('web/privacy_policy', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function termandcondition(){
        $data = array();
        $data['page'] = 'Term &#038; Condition';
        $data['main_content'] = $this->load->view('web/term-and-condition', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function aboutme(){
        $data = array();
        $data['page'] = 'About Me';
        $data['main_content'] = $this->load->view('web/about/aboutme', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function associate_members(){
        $data = array();
        $data['page'] = 'Associate Members';
        $data['main_content'] = $this->load->view('web/about/associate-members', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function governing_council_members(){
        $data = array();
        $data['page'] = 'Governing Council Members';
        $data['main_content'] = $this->load->view('web/about/governing-council-members', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function mission(){
        $data = array();
        $data['page'] = 'Mission';
        $data['main_content'] = $this->load->view('web/about/mission', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function our_promters(){
        $data = array();
        $data['page'] = 'Our Promters';
        $data['main_content'] = $this->load->view('web/about/our-promters', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function our_team(){
        $data = array();
        $data['page'] = 'Our Team';
        $data['main_content'] = $this->load->view('web/about/our-team', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function vision(){
        $data = array();
        $data['page'] = 'Vision';
        $data['main_content'] = $this->load->view('web/about/vision', $data, TRUE);
        $this->load->view('web/index', $data);
    }

    // ssc Project


    public function unemployed_candidate_registration(){
        $data = array();
        $data['page'] = 'Unemployed Candidate Registration';
        $data['main_content'] = $this->load->view('web/ssc_projects/unemployed-candidate-registration', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function training_partner_registration(){
        $data = array();
        $data['page'] = 'Training Partner Registration';
        $data['main_content'] = $this->load->view('web/ssc_projects/training-partner-registration', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function indentrepreneurshipdevelopmentprograms(){
        $data = array();
        $data['page'] = 'Ind - Entrepreneurship Development Programs';
        $data['main_content'] = $this->load->view('web/ssc_projects/indentrepreneurshipdevelopmentprograms', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function careerpaths(){
        $data = array();
        $data['page'] = 'Career Paths';
        $data['main_content'] = $this->load->view('web/ssc_projects/careerpaths', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function recognisedpriorlearning(){
        $data = array();
        $data['page'] = 'Recognised Prior Learning (RPL coming soon)';
        $data['main_content'] = $this->load->view('web/ssc_projects/recognisedpriorlearning', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function worldskillsindia(){
        $data = array();
        $data['page'] = 'Worldskills India';
        $data['main_content'] = $this->load->view('web/ssc_projects/worldskillsindia', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function ytdeled(){
        $data = array();
        $data['page'] = 'Yoga Teacher Diploma in Elementary Education';
        $data['main_content'] = $this->load->view('web/ssc_projects/ytdeled', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function ytdeved(){
        $data = array();
        $data['page'] = 'Yoga Teacher Diploma in Evaluator Education';
        $data['main_content'] = $this->load->view('web/ssc_projects/ytdeved', $data, TRUE);
        $this->load->view('web/index', $data);
    }


    // SSC ESSC Training Programs

    public function setprograms(){
        $data = array();
        $data['page'] = 'SSC ESSC Training Programs';
        $data['main_content'] = $this->load->view('web/training/setprograms', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function companytrainingprograms(){
        $data = array();
        $data['page'] = 'Company Training Programs';
        $data['main_content'] = $this->load->view('web/training/companytrainingprograms', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function govtrainingpragrams(){
        $data = array();
        $data['page'] = 'Government Training Pragrams';
        $data['main_content'] = $this->load->view('web/training/govtrainingpragrams', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function trainingmaterials(){
        $data = array();
        $data['page'] = 'Training Materials';
        $data['main_content'] = $this->load->view('web/training/trainingmaterials', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function pvtsectortrainingprograms(){
        $data = array();
        $data['page'] = 'Private Sector Training Programs';
        $data['main_content'] = $this->load->view('web/training/pvtsectortrainingprograms', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function interactive(){
        $data = array();
        $data['page'] = 'Interactive';
        $data['main_content'] = $this->load->view('web/training/interactive', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function trainingtools(){
        $data = array();
        $data['page'] = 'Training Tools';
        $data['main_content'] = $this->load->view('web/training/trainingtools', $data, TRUE);
        $this->load->view('web/index', $data);
    }


    // News & Events
      public function news_events(){
          $data = array();
          $data['page'] = 'News &#038; Events';
          $data['main_content'] = $this->load->view('web/news_events', $data, TRUE);
          $this->load->view('web/index', $data);
      }

    // Our Partners

    public function industrypartnersmembership(){
        $data = array();
        $data['page'] = 'Industry Partners || Membership';
        $data['main_content'] = $this->load->view('web/our_partners/industrypartnersmembership', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function individualmembership(){
        $data = array();
        $data['page'] = 'Individual Membership';
        $data['main_content'] = $this->load->view('web/our_partners/individualmembership', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function trainingpartners(){
        $data = array();
        $data['page'] = 'Training Partners';
        $data['main_content'] = $this->load->view('web/our_partners/trainingpartners', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function assessmentpartners(){
        $data = array();
        $data['page'] = 'Assessment Partners';
        $data['main_content'] = $this->load->view('web/our_partners/assessmentpartners', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function knowledgepartners(){
        $data = array();
        $data['page'] = 'Knowledge Partners';
        $data['main_content'] = $this->load->view('web/our_partners/knowledgepartners', $data, TRUE);
        $this->load->view('web/index', $data);
    }
    public function strategicpartners(){
        $data = array();
        $data['page'] = 'Strategic Partners';
        $data['main_content'] = $this->load->view('web/our_partners/strategicpartners', $data, TRUE);
        $this->load->view('web/index', $data);
    }


    public function contact(){
        $data = array();
        $data['page'] = 'Home';
        $data['main_content'] = $this->load->view('web/contact', $data, TRUE);
        $this->load->view('web/index', $data);
    }


}
