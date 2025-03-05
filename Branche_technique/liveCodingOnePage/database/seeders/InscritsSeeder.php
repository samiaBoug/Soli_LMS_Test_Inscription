<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inscrit ;

class InscritsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Ajouter des inscrits réels
        Inscrit::create([
            'nom' => 'El Hadi',
            'prenom' => 'Ahmed',
            'email' => 'ahmed.elhadi@example.com',
            'mot_de_passe' => bcrypt('password123'),
            'specialisation' => 'Web',
            'tel' => '0612345678',
            'niveau_scolaire' => 'Bac+2',
            'date_naiss' => '1996-05-15',
            'adresse' => 'Casablanca, Maroc'
        ]);

        Inscrit::create([
            'nom' => 'Benali',
            'prenom' => 'Sami',
            'email' => 'sami.benali@example.com',
            'mot_de_passe' => bcrypt('password123'),
            'specialisation' => 'Mobile',
            'tel' => '0623456789',
            'niveau_scolaire' => 'Bac+3',
            'date_naiss' => '1994-07-20',
            'adresse' => 'Rabat, Maroc'
        ]);

        Inscrit::create([
            'nom' => 'Ait Ouarzit',
            'prenom' => 'Meriem',
            'email' => 'meriem.aitouarzit@example.com',
            'mot_de_passe' => bcrypt('password123'),
            'specialisation' => 'Web',
            'tel' => '0634567890',
            'niveau_scolaire' => 'Bac',
            'date_naiss' => '2000-12-05',
            'adresse' => 'Marrakech, Maroc'
        ]);
        
        // Vous pouvez ajouter plus d'inscrits ici...
    }
}

