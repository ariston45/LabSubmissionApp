<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$menus = [
			['mn_title' => 'Home', 'mn_parent_id' => 0, 'mn_sort_id' => 0, 'mn_slug' => '/','mn_level_user'=>'admin'],
			['mn_title' => 'Pages', 'mn_parent_id' => 0, 'mn_sort_id' => 1, 'mn_slug' => '/pages','mn_level_user'=>'admin'],
			['mn_title' => 'Our Services', 'mn_parent_id' => 2, 'mn_sort_id' => 2, 'mn_slug' => '/our-services','mn_level_user'=>'admin'],
			['mn_title' => 'About', 'mn_parent_id' => 2, 'mn_sort_id' => 3, 'mn_slug' => '/about','mn_level_user'=>'admin'],
			['mn_title' => 'About Team', 'mn_parent_id' => 4, 'mn_sort_id' => 3, 'mn_slug' => '/about-team','mn_level_user'=>'admin'],
			['mn_title' => 'About Clients', 'mn_parent_id' => 4, 'mn_sort_id' => 3, 'mn_slug' => '/about-clients','mn_level_user'=>'admin'],
			['mn_title' => 'Contact Team', 'mn_parent_id' => 5, 'mn_sort_id' => 3, 'mn_slug' => '/contact-team','mn_level_user'=>'admin'],
			['mn_title' => 'Contact Clients', 'mn_parent_id' => 6, 'mn_sort_id' => 3, 'mn_slug' => '/contact-clients','mn_level_user'=>'admin'],
			['mn_title' => 'Contact', 'mn_parent_id' => 2, 'mn_sort_id' => 4, 'mn_slug' => '/contact','mn_level_user'=>'admin'],
			['mn_title' => 'Portfolio', 'mn_parent_id' => 2, 'mn_sort_id' => 4, 'mn_slug' => '/portfolio','mn_level_user'=>'admin'],
			['mn_title' => 'Gallery', 'mn_parent_id' => 2, 'mn_sort_id' => 4, 'mn_slug' => '/gallery','mn_level_user'=>'admin']
	];
	foreach ($menus as $menu) {
		Menu::Create($menu);
	}
	}
}
