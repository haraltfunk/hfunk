<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Section;

class CoursesCurriculum extends Component
{
    public $course, $section, $name;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->section = new Section();
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
    }

    public function store(){

        $this->validate([
            'name' => 'required'
        ]);

        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);

        $this->reset('name');
        
        //refresa la informacion del curso
        $this->course = Course::find($this->course->id);
    }

    public function edit(Section $section){
        $this->section  = $section;
    }

    public function update(){
        
        $this->validate();

        $this->section->save();
        $this->section = new Section();

        //refresa la informacion del curso
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Section $section){
        $section->delete();

        //refresa la informacion del curso
        $this->course = Course::find($this->course->id);
    }
}
