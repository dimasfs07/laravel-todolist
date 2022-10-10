<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodolist()
    {
        $this->withSession([
            "user" => "dimas",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Dimas"
                ],
                [
                    "id" => "2",
                    "todo" => "Fahrul"
                ]
            ]
            ])->get('/todolist')
            ->assertSeeText('1')
            ->assertSeeText('Dimas')
            ->assertSeeText('2')
            ->assertSeeText('Fahrul');
    }

    public function testAddTodoFailed()
    {
        $this->withSession([
            "user" => "dimas"
        ])->post("/todolist", [])
        ->assertSeeText("Todo is required");
    }

    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => "dimas"
        ])->post("/todolist",[
            "todo" => "Fahrul"
        ])->assertRedirect("/todolist");
    }

    public function testRemoveTodolist()
    {
        $this->withSession([
            "user" => "dimas",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Dimas"
                ],
                [
                    "id" => "2",
                    "todo" => "Fahrul"
                ]
            ]
            ])->post('/todolist/1/delete')
            ->assertRedirect('todolist');
    }
}
