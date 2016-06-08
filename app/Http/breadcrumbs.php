<?php

	// Dashboard
	Breadcrumbs::register('dashboard', function($breadcrumbs)
	{
	    $breadcrumbs->push('Dashboard', route('dashboard'));
	});

    //---------Backend------------------//


    // Calendar
	Breadcrumbs::register('backend.calendar', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Calendar', url('admin/calendar'));
	});


    	// ----------RoLe -------------//

	// Role
	Breadcrumbs::register('roles.index', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Roles', route('roles.index'));
	});

	// Role Create
	Breadcrumbs::register('roles.create', function($breadcrumbs)
	{
	    $breadcrumbs->parent('roles.index');
	    $breadcrumbs->push('Create', route('roles.create'));
	});

	// Role Edit
	Breadcrumbs::register('roles.edit', function($breadcrumbs)
	{
	    $breadcrumbs->parent('roles.index');
	    $breadcrumbs->push('Edit', route('roles.edit'));
	});

	// Role Show
	Breadcrumbs::register('roles.show', function($breadcrumbs)
	{
	    $breadcrumbs->parent('roles.index');
	    $breadcrumbs->push('Show', route('roles.show'));
	});

			// ----------END RoLe -------------//


			// ----------Users  -------------//
	// User
	Breadcrumbs::register('users.index', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('users', route('users.index'));
	});

	// User Create
	Breadcrumbs::register('users.create', function($breadcrumbs)
	{
	    $breadcrumbs->parent('users.index');
	    $breadcrumbs->push('Create', route('users.create'));
	});

	// User Edit
	Breadcrumbs::register('users.edit', function($breadcrumbs)
	{
	    $breadcrumbs->parent('users.index');
	    $breadcrumbs->push('Edit', route('users.edit'));
	});

	// User Show
	Breadcrumbs::register('users.show', function($breadcrumbs)
	{
	    $breadcrumbs->parent('users.index');
	    $breadcrumbs->push('Show', route('users.show'));
	});
				// ----------END USERS -------------//

				// ----------Profile -------------//

	// Profile
	Breadcrumbs::register('profile.index', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Profile', route('profile.index'));
	});

	// Profile Edit
	Breadcrumbs::register('profile.edit', function($breadcrumbs)
	{
	    $breadcrumbs->parent('profile.index');
	    $breadcrumbs->push('Edit', route('profile.edit'));
	});
			// ----------END Profile -------------//

			// ----------Article Categorys -------------//

	// Article Categorys
	Breadcrumbs::register('backend.articlecategorys.index', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Article Categorys', route('articlecategorys.index'));
	});

	// articlecategorys Create
	Breadcrumbs::register('backend.articlecategorys.create', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.articlecategorys.index');
	    $breadcrumbs->push('Create', route('articlecategorys.create'));
	});

	// articlecategorys Edit
	Breadcrumbs::register('backend.articlecategorys.edit', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.articlecategorys.index');
	    $breadcrumbs->push('Edit', route('articlecategorys.edit'));
	});

	// articlecategorys Show
	Breadcrumbs::register('backend.articlecategorys.show', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.articlecategorys.index');
	    $breadcrumbs->push('Show', route('articlecategorys.show'));
	});

			// ----------END Article Categorys -------------//


				// ----------Article Categorys -------------//

	// Article
	Breadcrumbs::register('backend.articles.index', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Article', route('articles.index'));
	});

	// articles Create
	Breadcrumbs::register('backend.articles.create', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.articles.index');
	    $breadcrumbs->push('Create', route('articles.create'));
	});

	// articles Edit
	Breadcrumbs::register('backend.articles.edit', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.articles.index');
	    $breadcrumbs->push('Edit', route('articles.edit'));
	});

	// articles Show
	Breadcrumbs::register('backend.articles.show', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.articles.index');
	    $breadcrumbs->push('Show', route('articles.show'));
	});

			// ----------END Article s -------------//


	// ----------Product Categorys -------------//

	// Product Categorys
	Breadcrumbs::register('backend.productcategorys.index', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Product Categorys', route('productcategorys.index'));
	});

	// productcategorys Create
	Breadcrumbs::register('backend.productcategorys.create', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.productcategorys.index');
	    $breadcrumbs->push('Create', route('productcategorys.create'));
	});

	// productcategorys Edit
	Breadcrumbs::register('backend.productcategorys.edit', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.productcategorys.index');
	    $breadcrumbs->push('Edit', route('productcategorys.edit'));
	});

	// productcategorys Show
	Breadcrumbs::register('backend.productcategorys.show', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.productcategorys.index');
	    $breadcrumbs->push('Show', route('productcategorys.show'));
	});

			// ----------END product Categorys -------------//

	// Product 
	Breadcrumbs::register('backend.products.index', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Products', route('products.index'));
	});

	// products Create
	Breadcrumbs::register('backend.products.create', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.products.index');
	    $breadcrumbs->push('Create', route('products.create'));
	});

	// products Edit
	Breadcrumbs::register('backend.products.edit', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.products.index');
	    $breadcrumbs->push('Edit', route('products.edit'));
	});

	// products Show
	Breadcrumbs::register('backend.products.show', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.products.index');
	    $breadcrumbs->push('Show', route('products.show'));
	});

			// ----------END product Categorys -------------//

	// ----------Slides -------------//

	// Slide
	Breadcrumbs::register('backend.slides.index', function($breadcrumbs)
	{
	    $breadcrumbs->parent('dashboard');
	    $breadcrumbs->push('Slide', route('slides.index'));
	});

	// articles Create
	Breadcrumbs::register('backend.slides.create', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.slides.index');
	    $breadcrumbs->push('Create', route('slides.create'));
	});

	// slides Edit
	Breadcrumbs::register('backend.slides.edit', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.slides.index');
	    $breadcrumbs->push('Edit', route('slides.edit'));
	});

	// slides Show
	Breadcrumbs::register('backend.slides.show', function($breadcrumbs)
	{
	    $breadcrumbs->parent('backend.slides.index');
	    $breadcrumbs->push('Show', route('slides.show'));
	});

			// ----------END Article s -------------//


	//---------End Backend------------------//


?>