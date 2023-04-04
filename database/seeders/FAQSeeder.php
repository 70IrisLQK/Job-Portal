<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'question' => 'Accordion Item #1',
                'answer' => 'Lorem ipsum dolor sit amet, tacimates mediocritatem sit ei, dicta commodo mei id, ut has labore audire molestie. Vel ut vidit diceret molestiae, impetus copiosae tacimates an sed. An aliquip alterum efficiantur vis, audiam nonumes nominavi has te, aliquip dolores at cum. Sea esse summo diceret te. Eum ex debet verterem maluisset, vis ut copiosae sensibus, eirmod integre expetenda pro no.',
            ],
            [
                'question' => 'Accordion Item #2',
                'answer' => 'Lorem ipsum dolor sit amet, tacimates mediocritatem sit ei, dicta commodo mei id, ut has labore audire molestie. Vel ut vidit diceret molestiae, impetus copiosae tacimates an sed. An aliquip alterum efficiantur vis, audiam nonumes nominavi has te, aliquip dolores at cum. Sea esse summo diceret te. Eum ex debet verterem maluisset, vis ut copiosae sensibus, eirmod integre expetenda pro no.',
            ],
            [
                'question' => 'Accordion Item #3',
                'answer' => 'Lorem ipsum dolor sit amet, tacimates mediocritatem sit ei, dicta commodo mei id, ut has labore audire molestie. Vel ut vidit diceret molestiae, impetus copiosae tacimates an sed. An aliquip alterum efficiantur vis, audiam nonumes nominavi has te, aliquip dolores at cum. Sea esse summo diceret te. Eum ex debet verterem maluisset, vis ut copiosae sensibus, eirmod integre expetenda pro no.',
            ],
        ];

        foreach ($faqs as  $value) {
            FAQ::updateOrCreate($value);
        }
    }
}