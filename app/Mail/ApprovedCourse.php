<?php

namespace App\Mail;

use App\Models\admin\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedCourse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $course;
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // Se encarga de traernos una vista
    public function build()
    {
        return $this->view('admin.mail.approved-course')->subject('¡Cool, hemos aprobado tu curso...!');
    }
}