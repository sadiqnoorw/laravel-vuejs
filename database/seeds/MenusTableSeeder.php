<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Menu;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $categories = factory(Category::class, 5)->create();
     //     $categories->each (function($category){
     //    	factory(Menu::class, 3)->create([
     //    		'category_id' => $category->id,
     //    	]);
     //    }); 
       //factory(\App\Models\Menu::class, 10)->create();
        
        $dummyCategories = collect([
            'Soups', 'Chicken Main Course', 'Non-veg Rice', 'Non-veg Noodles'
        ]);
        $dummyCategories->each (function($category){
             factory(Category::class)->create([
                 'name' => $category,
             ]);
        });

        $this->addSoups();
        $this->addMainCourse();
        $this->addNonVegRice();
        $this->addNonVegNoodles();


    }

    private function addNonVegNoodles(){
        factory(Menu::class)->create([
            'name' => 'Fried Offer',
            'price' => '460',
            'category_id' => '4',
            'description' => 'Fried Offer mozzarella, and parmesan; served with spaghetti.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Creole Seafood Gumbo',
            'price' => '450',
            'category_id' => '4',
            'description' => 'Creole Seafood Gumbo Fried Calamari Tender cuts of paneed veal crowned with golden fried eggplant, Italian red gravy',
        ]);

        factory(Menu::class)->create([
            'name' => 'Lobster Bisque',
            'price' => '440',
            'category_id' => '4',
            'description' => 'Lobster Bisque Tender cuts of paneed veal crowned with golden fried eggplant, Italian red gravy, mozzarella, and parmesan; served with spaghetti.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Fried Eggplant',
            'price' => '430',
            'category_id' => '4',
            'description' => 'Fried Eggplant Tender cuts of paneed veal crowned with golden fried eggplant, Italian red gravy, mozzarella, and parmesan; served with spaghetti.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Our Menu',
            'price' => '420',
            'category_id' => '4',
            'description' => 'Our Menu Tender cuts of paneed veal crowned with golden fried eggplant, Italian red gravy, mozzarella, and parmesan; served with spaghetti.',
        ]);
    }


    private function addNonVegRice(){
        factory(Menu::class)->create([
            'name' => 'Fried Calamari',
            'price' => '310',
            'category_id' => '3',
            'description' => 'Fried Calamari Tender cuts of paneed veal crowned with golden fried eggplant, Italian red gravy, mozzarella, and parmesan; served with spaghetti.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Creole Seafood Gumbo',
            'price' => '320',
            'category_id' => '3',
            'description' => 'Creole Seafood Pan fried eggplant layered and topped with Italian red gravy, mozzarella, and parmesan baked until bubbly; served with spaghetti.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Veal Parmigiana',
            'price' => '330',
            'category_id' => '3',
            'description' => ' Veal Parmigiana Pan fried eggplant layered and topped with Italian red gravy, mozzarella, and parmesan baked until bubbly; served with spaghetti.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Eggplant Parmigiana',
            'price' => '340',
            'category_id' => '3',
            'description' => 'Eggplant Parmigiana Pan fried eggplant layered and topped with Italian red gravy, mozzarella, and parmesan baked until bubbly; served with spaghetti.',
        ]);
    }


    private function addSoups(){
        factory(Menu::class)->create([
            'name' => 'Lobster Bisque',
            'price' => '210',
            'category_id' => '2',
            'description' => 'Lobster Bisque Course Served with Italian red gravy.',
        ]);

        factory(Menu::class)->create([
            'name' => ' Served with',
            'price' => '220',
            'category_id' => '2',
            'description' => ' Served with Lobster Bisque Course Served with Italian red gravy.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Creole Seafood Gumbo',
            'price' => '230',
            'category_id' => '2',
            'description' => 'Creole Seafood Gumbo Lobster Bisque Course Served with Italian red gravy.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Bowl',
            'price' => '240',
            'category_id' => '2',
            'description' => 'Bowl Lobster Bisque Course Served with Italian red gravy.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Appetizers',
            'price' => '250',
            'category_id' => '2',
            'description' => 'Appetizers Lobster Bisque Course Served with Italian red gravy.',
        ]);

    }

    private function addMainCourse(){
        factory(Menu::class)->create([
            'name' => 'Chicken Main Course',
            'price' => '190',
            'category_id' => '1',
            'description' => 'Chicken Main Course Served with Italian red gravy.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Soups',
            'price' => '233',
            'category_id' => '1',
            'description' => 'Soups Served with Italian red gravy.',
        ]);

        factory(Menu::class)->create([
            'name' => 'Appetizers',
            'price' => '333',
            'category_id' => '1',
            'description' => ' Appetizers Served with Italian red gravy or honey mustard..',
        ]);

        factory(Menu::class)->create([
            'name' => 'Fried Calamari',
            'price' => '444',
            'category_id' => '1',
            'description' => 'Fried Calamari Served with Italian red gravy or honey mustard..',
        ]);

        factory(Menu::class)->create([
            'name' => 'Breakfast',
            'price' => '555',
            'category_id' => '1',
            'description' => 'Breakfast Fried Calamari Served with Italian red gravy or honey mustard..',
        ]);

    }

}
