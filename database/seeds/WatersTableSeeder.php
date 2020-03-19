<?php

use Illuminate\Database\Seeder;

class WatersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function __construct()
    {
      // code...
    }

    public function run()
    {
        //
        DB::table('waters')->insert([
            'nama' => 'Strong KanGen',
            'ph' => '11,5',
            'manfaat' => 'Membantu proses penyembuhan penyakit kronis seperti kanker, stroke, maag, dan penyakit kronis lainnya.',
        ]);
        DB::table('waters')->insert([
            'nama' => 'Air Kangen (Permulaan)',
            'ph' => '8,5',
            'manfaat' => 'Membantu melancarkan peredaran darah, menetralkan darah dari kondisi asam, membawa/melarutkan zat-zat asing (tingkat lemah) dalam tubuh keluar melalui eksresi (keringat dan/atau kencing).',
        ]);
        DB::table('waters')->insert([
            'nama' => 'Strong Acid',
            'ph' => '2,5',
            'manfaat' => 'Menghilangkan Jerawat,bisul dan kutu air, serta pengganti betadine',
        ]);
        DB::table('waters')->insert([
            'nama' => 'Clean Water',
            'ph' => '7,0',
            'manfaat' => 'Air mineral netral, untuk campuran susu formula bayi',
        ]);
        DB::table('waters')->insert([
            'nama' => 'Beauty Water',
            'ph' => '5,5',
            'manfaat' => 'Menghaluskan kulit, merawat kulit wajah',
        ]);
        DB::table('waters')->insert([
            'nama' => 'Air KanGen (Menengah)',
            'ph' => '9,0',
            'manfaat' => 'Melancarkan peredaran darah, mengankut zat-zat asing yang tertimbun dalam tubuh, menetralkan peredaran darah dari asam, melancarkan buang air kecil',
        ]);
        DB::table('waters')->insert([
            'nama' => 'Air KanGen (Tinggi)',
            'ph' => '9,5',
            'manfaat' => 'Membantu melancarkan peredaran darah, menetralkan darah dari kondisi asam, membawa/melarutkan zat-zat asing (tingkat lemah) dalam tubuh keluar melalui eksresi (keringat dan/atau kencing)',
        ]);
    }
}
