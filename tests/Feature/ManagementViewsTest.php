<?php

it('renders the major form with code, name, and description fields', function () {
    $response = $this->get('/majors/create');

    $response->assertOk();
    $response->assertSee('name="code"', false);
    $response->assertSee('name="name"', false);
    $response->assertSee('name="description"', false);
});

it('renders the teacher index with a nip column', function () {
    $response = $this->get('/teachers');

    $response->assertOk();
    $response->assertSee('NIP');
});
