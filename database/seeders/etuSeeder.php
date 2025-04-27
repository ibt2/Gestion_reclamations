<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class etuSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // Liste de prénoms et de noms de famille courants
        $firstNames = ['aya', 'Ali', 'ayeman', 'hajar', 'asmae', 'hafssa', 'zineb', 'saad', 'adam', 'ibtissam'];
        $lastNames = ['alaoui', 'benjelloun', 'essami', 'saad', 'idriss', 'sebbar', 'hatim', 'najd', 'said', 'yamani'];

        // Génère un nom aléatoire en combinant un prénom aléatoire avec un nom de famille aléatoire
        $name = $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)];

        // Liste de domaines d'email fictifs
        $domains = ['rec.um5.ma'];

        // Génère un email avec un nom aléatoire et un domaine d'email aléatoire
        $email = strtolower(str_replace(' ', '.', $name)) . '@' . $domains[array_rand($domains)];

        DB::table('etudiants')->insert([
            'name' => $name,
            'phone' => '06' . mt_rand(10000000, 99999999), // Génère un numéro de téléphone aléatoire de 8 chiffres préfixé par "06"
            'email' => $email,
        ]);
    }
}