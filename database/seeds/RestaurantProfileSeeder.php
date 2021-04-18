<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = array(
            array('title' => 'Seven Seafood & Grill',
                'headline' => "Kenya's Premier Steak & Seafood Restaurant",
                'location' => 'Langata Rd, Nairobi',
                'country_id' => 1,
                'website' => 'http://www.experienceseven.com/',
                'phone' => '+254737776677',
                'coordinates' => '-1.259749, 36.776335',
                'email' => 'reservations@experienceseven.com',
                'about' => "A mouth watering array of oysters, lobsters, prawns and ocean fish are delivered daily, freshly prepared and accompanied by Seven’s Signature Sauces. Meat lovers are also well catered for with Kenya’s finest beef carefully aged and butchered in house.",
                'logo' => 'images/restaurants/logo/logo1.png',
                'banner' => 'images/restaurants/banner/banner1.png',
                'postal_address' => 'ABC Place Waiyaki Way, Westlands Nairobi, Kenya',
                'category_id'=>1),
     /*       array('title' => 'The carnivore restaurant', 'headline' => "The ultimate 'Beast of a Feast'", 'location' => 'Ngong Rd, Nairobi', 'country_id' => 1, 'website' => 'https://tamarind.co.ke/restaurant.php?carnivore/', 'phone' => '205141300', 'coordinates' => '-1.329223, 36.801107', 'email' => 'RESERVATIONS.CARNIVORE@TAMARIND.CO.KE', 'about' => "Carnivore is an open-air restaurant in the Langata suburb of Nairobi, Kenya. Carnivore's specialty is meat, and features an all-you-can-eat meat buffet.", 'logo' => 'images/restaurants/logo/logo2.png', 'banner' => 'images/restaurants/banner/banner2.png', 'postal_address' => 'American'),
            array('title' => 'Talisman Restaurant', 'headline' => "An elegant gastrolounge.", 'location' => 'Ngong Rd, Nairobi', 'country_id' => 1, 'website' => 'http://www.thetalismanrestaurant.com/', 'phone' => '+254705999997', 'coordinates' => '-1.322738, 36.703837', 'email' => 'reservations@thetalismanrestaurant.com', 'about' => "The Talisman Restaurant situated in an old house in Karen was originally occupied by the famous wildlife photographer and author Alan Root in his youth. Talisman was created by Ian and Charlie Cameron as a small family and friendly kitchen restaurant.", 'logo' => 'images/restaurants/logo/logo3.png', 'banner' => 'images/restaurants/banner/banner3.png', 'postal_address' => 'P.O BOX 320','type'=>'Fish'),
            array('title' => 'About Thyme Restaurant', 'headline' => "Your Neighbourhood Refuge", 'location' => 'Eldama Ravine Rd, Nairobi', 'country_id' => 1, 'website' => 'http://about-thyme.com/', 'phone' => '+254721850026', 'coordinates' => '-1.252761, 36.802951', 'email' => '', 'about' => "About Thyme offers an eclectic menu with imaginative, well-prepared and beautifully presented dishes from around the world. Intimate dining in a leafy, secluded area of Westlands where good food and drinks can be enjoyed in a tranquil setting.", 'logo' => 'images/restaurants/logo/logo4.png', 'banner' => 'images/restaurants/banner/banner4.png', 'postal_address' => 'P.O.Box: 14150-00100 Nairobi GPO','type'=>'Mexican'),
            array('title' => 'Trout Tree Restaurant', 'headline' => "Open air dining & fresh farm to table dishes on our Sacred Fig Tree. ", 'location' => '100 metres off the main Kiganjo - Nanyuki Road by the Burguret River, Nanyuki', 'country_id' => 1, 'website' => 'http://trout-tree.com//', 'phone' => '0726 281 704', 'coordinates' => '-0.102734, 37.035561', 'email' => 'trouttreerestaurant@gmail.com', 'about' => "Built in an enormous Fig Tree along the Burguret River, below Mount Kenya, the Trout Tree Restaurant offers a truly unique dining experience.", 'logo' => 'images/restaurants/logo/logo5.png', 'banner' => 'images/restaurants/banner/banner5.png', 'postal_address' => ' P.O.Box 24371 Nairobi 00502 Kenya','type'=>'Fish'),
            array('title' => 'Fogo Gaucho Kilimani', 'headline' => "Nairobi's Favourite Steakhouse.", 'location' => 'Ground Floor, Galana Plaza, Galana Road, Off Argwings Khodhek, Road, Nairobi', 'country_id' => 1, 'website' => 'https://www.fogogaucho.co.ke/', 'phone' => '+254715414141', 'coordinates' => '-1.289841, 36.782993', 'email' => 'westlands@fogogaucho.co.ke', 'about' => "Fogo Gaucho is an authentic Brazilian Steakhouse that offers the most delectable selection of charcoal grilled meats that go along with a full buffet to choose from all for a set price per person, all you can eat.", 'logo' => 'images/restaurants/logo/logo6.png', 'banner' => 'images/restaurants/banner/banner6.png', 'postal_address' => '','type'=>'Brazilian'),
         */  );
        DB::table('restaurant_profiles')->delete();
        DB::table('restaurant_profiles')->insert($restaurants);
    }
}
