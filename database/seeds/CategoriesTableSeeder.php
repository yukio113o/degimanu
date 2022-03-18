<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_category_names = [
            '銀のさら', '釜寅', 'すし上等'
        ];
        
        $silver_categories = [
            'A', 'B', 'F', 'C(ランチ)', 'お重', 'サイド', '仕込み'
            ];
            
        $kamatora_categories = [
            'B', 'C(ランチ)', 'お重', 'トッピング', '仕込み'
            ];
            
        $joto_categories = [
            'A', 'E', 'K', '丼', 'トッピング'
            ];
        
        foreach ($major_category_names as $major_category_name) {
            if ($major_category_name == '銀のさら') {
                foreach ($silver_categories as $silver_category) {
                    Category::create([
                        'name' => $silver_category,
                        'description' => $silver_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
            
            if ($major_category_name == '釜寅') {
                foreach ($kamatora_categories as $kamatora_category) {
                    Category::create([
                        'name' => $kamatora_category,
                        'description' => $kamatora_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
            
            if ($major_category_name == 'すし上等') {
                foreach ($joto_categories as $joto_category) {
                    Category::create([
                        'name' => $joto_category,
                        'description' => $joto_category,
                        'major_category_name' => $major_category_name
                    ]);
                }
            }
        }
    }
}
