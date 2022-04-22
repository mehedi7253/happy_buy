<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        //category
        $sql = "
            INSERT INTO `categories` (`category_name`, `cat_banner`, `status`, `url`, `created_at`, `updated_at`) VALUES
            ('Electronics', '1650386828.jpg', '0', 'electronics', '2022-04-19 04:47:08', '2022-04-21 20:40:03'),
            ('Fashion', '1650617505.jpg', '0', 'fashion', '2022-04-19 04:47:08', '2022-04-22 02:51:45'),
            ('Kitchen', '1650617656.png', '0', 'kitchen', '2022-04-19 04:47:08', '2022-04-22 02:54:16'),
            ('Computer Accessories', '1650617731.jpg', '0', 'computer-accessories', '2022-04-22 02:55:31', '2022-04-22 02:55:31'),
            ('Mobile Accessories', '1650617855.jpg', '0', 'mobile-accessories', '2022-04-22 02:57:35', '2022-04-22 02:57:35'),
            ('Child Fashion', '1650617935.jpg', '0', 'child-fashion', '2022-04-22 02:58:55', '2022-04-22 02:58:55')
        ";
        DB::select($sql);

        //products
        $sql = "
            INSERT INTO `products` (`category_id`, `product_name`, `product_price`, `special_price`, `banner`, `name`, `image_path`, `description`, `type`, `status`, `created_at`, `updated_at`) VALUES
            (1, 'Samsung TV', 25000.00, NULL, '1650619155.webp', '[\"LED8000_Frt.webp\",\"levant-fhd-t5300-ua43t5300auxtw-frontblack-229857917.webp\",\"PDP680_Frt.webp\"]', '[\"LED8000_Frt.webp\",\"levant-fhd-t5300-ua43t5300auxtw-frontblack-229857917.webp\",\"PDP680_Frt.webp\"]', '<p>The UND8000 is Samsung&#39;s best LED TV for 2011, with improved local dimming from an edge-lit configuration and a touch-screen remote, not to mention a 0.2-inch-wide frame.</p>', 'Regular', 0, '2022-04-22 03:19:15', '2022-04-22 03:19:15'),
            (1, 'Samsung Fridge', 50000.00, NULL, '1650619277.jpg', '[\"images.jpg\",\"refrigerator-1540426.jpg\",\"top-mount-two-door-refrigerator-260nw-1379019992.webp\"]', '[\"images.jpg\",\"refrigerator-1540426.jpg\",\"top-mount-two-door-refrigerator-260nw-1379019992.webp\"]', '<p>Samsung has made fridges with touchscreens before. LG has made fridges with doors that turn transparent to show you the inside. This year at CES 2018, those two ideas are finally merging into one with&nbsp;<a href=\"http://www.lgnewsroom.com/2018/01/lgs-connected-appliance-network-makes-the-future-kitchen-more-delightful/\">LG&rsquo;s new InstaView ThinQ smart refrigerator</a>, which features a 29-inch touchscreen that becomes transparent if users knock on it twice.</p>', 'Regular', 0, '2022-04-22 03:21:17', '2022-04-22 03:21:17'),
            (6, 'Child Dress', 1000.00, NULL, '1650619412.jpg', '[\"19e-Baby_Dress_Suitable_for_all_Occasions_6-12_months.jpg\",\"9191d270e425e200bbd14c1a2c743daf.jpg\",\"images (1).jpg\"]', '[\"19e-Baby_Dress_Suitable_for_all_Occasions_6-12_months.jpg\",\"9191d270e425e200bbd14c1a2c743daf.jpg\",\"images (1).jpg\"]', '<p>child dress</p>', 'Regular', 0, '2022-04-22 03:23:32', '2022-04-22 03:23:32'),
            (4, 'Mouse', 350.00, NULL, '1650619676.jpg', '[\"3-Tasten-Maus_Microsoft.jpg\",\"854833.jpg\",\"imgbin-computer-mouse-technical-support-output-device-input-devices-computer-mouse-CjBiUnSTknehZ1yEzvUGCbwhT.jpg\"]', '[\"3-Tasten-Maus_Microsoft.jpg\",\"854833.jpg\",\"imgbin-computer-mouse-technical-support-output-device-input-devices-computer-mouse-CjBiUnSTknehZ1yEzvUGCbwhT.jpg\"]', '<p>Computer Mouse</p>', 'Regular', 0, '2022-04-22 03:27:56', '2022-04-22 03:27:56'),
            (4, 'Dell Laptop', 50000.00, NULL, '1650619762.jpg', '[\"a315-53-n17c4-1-500x500.jpg\",\"a315-53-n17c4-2-500x500.jpg\",\"dell-inspiron-15-5000-15.jpg\"]', '[\"a315-53-n17c4-1-500x500.jpg\",\"a315-53-n17c4-2-500x500.jpg\",\"dell-inspiron-15-5000-15.jpg\"]', '<p>Dell Laptop</p>', 'Regular', 0, '2022-04-22 03:29:22', '2022-04-22 03:29:22'),
            (4, 'Headphone', 1000.00, 950.00, '1650619811.png', '[\"best_3.png\",\"deals.png\",\"featured_3.png\"]', '[\"best_3.png\",\"deals.png\",\"featured_3.png\"]', '<p>Computer Headphone</p>', 'Offer', 0, '2022-04-22 03:30:11', '2022-04-22 03:30:11'),
            (5, 'Mobile Headphone', 500.00, NULL, '1650619846.png', '[\"adv_1.png\",\"best_2.png\"]', '[\"adv_1.png\",\"best_2.png\"]', '<p>Mobile Headphone</p>', 'Regular', 0, '2022-04-22 03:30:46', '2022-04-22 03:30:46'),
            (2, 'Men Watch', 1200.00, 1000.00, '1650619945.jpg', '[\"FS5903-alt.jpg\",\"image-1022-163343566-1-big-hr.jpg\"]', '[\"FS5903-alt.jpg\",\"image-1022-163343566-1-big-hr.jpg\"]', '<p>Men Watch</p>', 'Offer', 0, '2022-04-22 03:32:25', '2022-04-22 03:32:48'),
            (5, 'Xomi s2', 18000.00, NULL, '1650620028.jpg', '[\"download.jpg\",\"gsmarena_007.jpg\",\"xiaomi-redmi-s2-14-1.jpg\"]', '[\"download.jpg\",\"gsmarena_007.jpg\",\"xiaomi-redmi-s2-14-1.jpg\"]', '<p>Xomi s2</p>', 'Regular', 0, '2022-04-22 03:33:48', '2022-04-22 03:33:48'),
            (5, 'Remi Note 8', 20000.00, NULL, '1650620115.jpg', '[\"section-04_slider_2.png\",\"section-04_slider_3.png\"]', '[\"section-04_slider_2.png\",\"section-04_slider_3.png\"]', '<p>Note 8</p>', 'Regular', 0, '2022-04-22 03:35:15', '2022-04-22 03:35:15'),
            (2, 'Women Dress', 1200.00, NULL, '1650620170.jpg', '[\"7d63d371-1e23-4a9c-8875-6a9e98f1f7991568193468392-Deewa-Printed-Jumpsuit-1581568193467754-4.jpg\",\"10e0a246-a793-4f45-8462-567d0f5561131568193468366-Deewa-Printed-Jumpsuit-1581568193467754-5.jpg\",\"458f601d-a183-49e7-a333-ef91493bd2d91568193468425-Deewa-P', '[\"7d63d371-1e23-4a9c-8875-6a9e98f1f7991568193468392-Deewa-Printed-Jumpsuit-1581568193467754-4.jpg\",\"10e0a246-a793-4f45-8462-567d0f5561131568193468366-Deewa-Printed-Jumpsuit-1581568193467754-5.jpg\",\"458f601d-a183-49e7-a333-ef91493bd2d91568193468425-Deewa-P', '<p>Women Fashion Dress</p>', 'Regular', 0, '2022-04-22 03:36:10', '2022-04-22 03:36:10');
        ";
        DB::select($sql);

        //shop
        $sql = "
            INSERT INTO `shops` (`shop_name`, `location`, `url`, `phone_number`, `shop_info`, `status`, `name`, `image_path`, `google_map`, `created_at`, `updated_at`) VALUES
            ('BD Electronic', 'City Centre (Level 16), 90/1 Motijheel C/A, Dhaka 1000.', 'bd-electronic', '09606111777', 'Best Electronics, a concern of Zaman Group, is the fastest growing electronics retail company in Bangladesh. Our company was officially launched in 2013 with a clear vision of delivering world-class home appliances from all major global brands to the high', '0', '[\"Best-Electronics.png\"]', '[\"Best-Electronics.png\"]', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"300\" height=\"300\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=best%20electronics&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://fmovies-online.net\">fmovies</a><br><style>.mapouter{position:relative;text-align:right;height:300px;width:300px;}</style><a href=\"https://www.embedgooglemap.net\"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:300px;}</style></div></div>', '2022-04-22 03:01:08', '2022-04-22 03:01:56'),
            ('Star Tech', '6th floor, 28 Kazi Nazrul Islam Ave,Navana', 'star-tech', '09678002003', 'Star Tech always prioritizes its customers and to ensure better customer service started the e-commerce shop in addition to the physical stores. The goal was to meet more customer needs in the shortest time. Since then, We have had the top spot as the bes', '0', '[\"logo1.png\"]', '[\"logo1.png\"]', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"300\" height=\"300\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=star%20tech&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://fmovies-online.net\">fmovies</a><br><style>.mapouter{position:relative;text-align:right;height:300px;width:300px;}</style><a href=\"https://www.embedgooglemap.net\"></a><style>.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:300px;}</style></div></div>', '2022-04-22 03:07:04', '2022-04-22 03:07:50'),
            ('Fashion House', 'Dhanmondi 32', 'fashion-shop', '01941685273', 'fashion house Dhaka', '0', '[\"fashion-house-concept-banner-header-vector-23673981.jpg\"]', '[\"fashion-house-concept-banner-header-vector-23673981.jpg\"]', '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"300\" height=\"300\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=fashion%20house&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://123movies-to.org\">123 movies</a><br><style>.mapouter{position:relative;text-align:right;height:300px;width:300px;}</style><a href=\"https://www.embedgooglemap.net\">google map html embed</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:300px;}</style></div></div>', '2022-04-22 03:09:28', '2022-04-22 03:38:20');
        ";
        DB::select($sql);
        //product in shop
        $sql = "
            INSERT INTO `product_in_shops` (`category_id`, `shop_id`, `created_at`, `updated_at`) VALUES
            (1, 1, NULL, NULL),
            (4, 1, NULL, NULL),
            (1, 2, NULL, NULL),
            (4, 2, NULL, NULL),
            (5, 2, NULL, NULL),
            (2, 3, NULL, NULL),
            (6, 3, NULL, NULL)
        ";
        DB::select($sql);

    }
}
