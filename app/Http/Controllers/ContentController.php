<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show children page (5-12 years)
     */
    public function children()
    {
        return view('content.children');
    }

    /**
     * Show bullying info page for children
     */
    public function bullyingInfo()
    {
        return view('content.bullying_info');
    }

    /**
     * Show bullying quiz page for children
     */
    public function bullyingQuiz()
    {
        return view('content.bullying_quiz');
    }

    /**
     * Show bully self-reflection quiz page for children
     */
    public function bullyQuiz()
    {
        return view('content.bully_quiz');
    }

    /**
     * Show reflection page for those who bully
     */
    public function bullyReflection()
    {
        return view('content.bully_reflection');
    }

    /**
     * Show teens page (13-17 years)
     */
    public function teens()
    {
        return view('content.teens');
    }

    /**
     * Show sexual harassment info page for teens
     */
    public function sexualHarassment()
    {
        return view('content.sexual_harassment');
    }

    /**
     * Show cyberbullying info page for teens
     */
    public function cyberbullyingInfo()
    {
        return view('content.cyberbullying_info');
    }

    /**
     * Show digital footprint info page for teens
     */
    public function digitalFootprint()
    {
        return view('content.digital_footprint');
    }

    /**
     * Show general what is bullying page
     */
    public function whatIsBullying()
    {
        return view('content.what_is_bullying');
    }

    /**
     * Show types of bullying page
     */
    public function typesOfBullying()
    {
        return view('content.types_of_bullying');
    }

    /**
     * Show impact of bullying page
     */
    public function impactOfBullying()
    {
        return view('content.impact_of_bullying');
    }

    // Science/Pojok Ilmu Pages
    public function scienceBiology()
    {
        return view('content.science_biology');
    }

    public function sciencePsychology()
    {
        return view('content.science_psychology');
    }

    public function scienceSocial()
    {
        return view('content.science_social');
    }

    public function scienceSpiritual()
    {
        return view('content.science_spiritual');
    }



    /**
     * Show adults page
     */
    public function adults()
    {
        return view('content.adults');
    }

    // Adults Content Pages
    public function earlyDetection()
    {
        return view('content.early_detection');
    }

    public function mythsAndFacts()
    {
        return view('content.myths_and_facts');
    }

    public function legalProtection()
    {
        return view('content.legal_protection');
    }
}
