<?php

public function setUp() {
        parent::setUp();
        $this->_setupAuthAdapter();
    }
    public function tearDown() {        
        $this->_clearAuth();
        parent::tearDown();
    }
    public function testIfNotLoggedUserGoesToIndex() {
        $this->dispatch('/user/');
        $this->assertAction('login');
    }
    public function testIfLoggedUserGoesToIndex() {
        // authenticate correct user
        $this->_authUser('test@test.com', 'osman');
        $this->dispatch('/user/');
        $this->assertNotRedirectTo('/user/login');
    }
    public function testIfLoggedUserGoestToLogin() {
        // authenticate correct user
        $this->_authUser('test@test.com', 'test12');
        $this->dispatch('/user/login');
        $this->assertRedirectTo('/index/index');
    }
    public function testIfNotLoggedUserGoestToLogin() {
        $this->dispatch('/user/login');
        $this->assertController('user');
        $this->assertAction('login');
    }

}
?>
