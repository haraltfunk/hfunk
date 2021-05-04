<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;

    public $course, $section, $name;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->section = new Section();

        $this->authorize('dictated', $course);
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor', ['course' =>$this->course]);
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
