<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Student;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

     /** @test */
     public function it_can_display_student_list()
     {
         // Manually student insert
        Student::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'address' => '123 Street, City'
        ]);
         $response = $this->get(route('students.index'));
 
         $response->assertStatus(200);
         $response->assertViewIs('students.index');
         $response->assertViewHas('students');
     }
 
     /** @test */
     public function it_can_store_a_student()
     {
         $data = [
             'name' => 'John Doe',
             'email' => 'johndoe@example.com',
             'phone' => '1234567890',
             'address' => '123 Street, City'
         ];
 
         $response = $this->post(route('students.store'), $data);
 
         $response->assertRedirect(route('students.index'));
         $this->assertDatabaseHas('students', ['email' => 'johndoe@example.com']);
     }
 
     /** @test */
     public function it_can_update_a_student()
     {
        $student = Student::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'address' => '123 Street, City'
        ]);
 
         $updatedData = [
             'name' => 'Updated Name',
             'email' => 'updatedemail@example.com',
             'phone' => '9876543210',
             'address' => '456 New Street'
         ];
 
         $response = $this->put(route('students.update', $student->id), $updatedData);
 
         $response->assertRedirect(route('students.index'));
         $this->assertDatabaseHas('students', ['email' => 'updatedemail@example.com']);
     }
 
}
