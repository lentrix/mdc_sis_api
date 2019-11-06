<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getSection($class_code)
    {
        $section = \App\Section::where('class_code', $class_code)->first();
        $data = [
            '_id' => $section->class_code,
            'courseNumber' => $section->subject->name,
            'description' => $section->subject->descript,
            'schedule' => $section->time->t_start . "-" . $section->time->t_end . " " . $section->time->day,
            'semester' => $section->semester->sem
        ];

        return json_encode($data);
    }

    public function sectionList($class_code)
    {
        $section = \App\Section::where('class_code', $class_code)->first();
        $data = [];

        foreach ($section->subEnrols as $s) {
            if ($stEn = $s->studEnrol()) {
                $data[] = [
                    'idnum' => $s->idnum,
                    'section_id' => $s->class_code,
                    'lastName' => $s->studInfo->lname,
                    'firstName' => $s->studInfo->fname,
                    'course' => $stEn->theCourse->cr_acrnm,
                    'year' => $s->studEnrol()->year
                ];
            }
        }


        return json_encode($data);
    }

    public function semesterList($sem_code) {
        $list = \App\StudEnrol::where('sem_code', $sem_code)
                ->with('studInfo')
                ->with('theCourse')
                ->get()->map(function($item, $key){
                    return [
                        'idnum' => $item->idnum,
                        'lname' => $item->studInfo->lname,
                        'fname' => $item->studInfo->fname,
                        'cr_acrnm' => $item->theCourse->cr_acrnm,
                        'year' => $item->year
                    ];
                });

        return response()
                ->json(['data'=>$list]);
    }
}
