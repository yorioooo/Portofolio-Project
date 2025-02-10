<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function collectionSatu()
    {
        // Cara pendefinisian collection dengan membuat object Collection
        $myArray = [1, 9, 3, 4, 5, 3, 5, 7];
        $collection = new \Illuminate\Support\Collection($myArray);

        // Cara pendefinisian collection dengan helper function collect()
        $myArray = [1, 9, 3, 4, 5, 3, 5, 7];
        $collection = collect($myArray);

        // Cara pendefinisian collection dengan helper function collect()
        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);

        // Cetak struktur detail variabel
        echo "<pre>";
        var_dump($collection);
        echo "</pre>";

        // Cetak struktur detail variabel
        dump($collection);
    }

    public function collectionDua()
    {
        // Cara pendefinisian collection dengan helper function collect()
        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);

        // Akses isi collection secara individu
        echo $collection[0];  echo "<br>";
        echo $collection[2];  echo "<br>";

        // Akses isi collection menggunakan perulangan foreach
        foreach($collection as $value) {
            echo "$value ";
        }

        // Langsung men-echo collection
        echo $collection;

        echo "<hr>";

        // Collection dari berbagai tipe data
        $collection = collect(["belajar", "laravel", "uncover", 1, 2, 3]);
        echo $collection;        //  ["belajar","laravel","uncover",1,2,3]

        echo "<br>";

        // Collection dari associative array
        $collection = collect([
            "nama" => "Laura",
            "sekolah" => "SMA 5 Lampung",
            "kota" => "Lampung",
            "jurusan" => "IPA",
        ]);

        echo $collection;
        // {"nama":"Laura","sekolah":"SMA 5 Lampung","kota":"Lampung","jurusan":"IPA"}

        // Percobaam beda antara array biasa dengan associative array
        $varA = [1,2,3];
        $varB = ["0"=>1, "1"=>2, "2"=>3];

        dump($varA===$varB);  // true

        $varA = collect([1,2,3]);
        $varB = collect(["1"=>1, "2"=>2, "3"=>3]);

        echo $varA;     // [1,2,3]
        echo "<br>";
        echo $varB;     // {"1":1,"2":2,"3":3}

    }

    public function collectionTiga()
    {
        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);

        // Method Matematis
        dump( $collection->sum() );           // 37
        dump( $collection->avg() );           // 4.625
        dump( $collection->max() );           // 9
        dump( $collection->min() );           // 1
        dump( $collection->median() );        // 4.5

        // Mengambil 1 element acak dari collection
        dump( $collection->random() );        // 5

        // Menambah element baru ke dalam collection
        echo $collection->concat([10,11,12]);   // [1,9,3,4,5,3,5,7,10,11,12]

        // Cek apakah angka 3 ada di dalam collection
        dump( $collection->contains(3) );       // true

        // Cek apakah angka 8 ada di dalam collection
        dump( $collection->contains(8) );       // false

        // Filter dan tampilkan element yang tidak berulang (unik)
        // $collection = collect(["0"=>1, "1"=>9, "2"=>3, "3"=>4, "4"=>5, "5"=>3, "6"=>5, "7"=>7]);
        echo $collection->unique();       // {"0":1,"1":9,"2":3,"3":4,"4":5,"7":7}

        // Ambil semua nilai collection menjadi array
        dump( $collection->all() );      // [1, 9, 3, 4, 5, 3, 5, 7]

        // Percobaan beda hasil dump() antara collection dan array

        // $varA = [1,2,3];
        // $varB = collect([1,2,3]);

        // dump($varA);
        // dump($varB);

        // Ambil element pertama dari collection
        dump( $collection->first() );       // 1

        // Ambil element terakhir dari collection
        dump( $collection->last() );        // 7

		// Hitung jumlah element
        dump( $collection->count() );       // 8

        // Urutkan element di collection
        echo $collection->sort();
        // {"0":1,"2":3,"5":3,"3":4,"4":5,"6":5,"7":7,"1":9}
    }

    public function collectionEmpat()
    {
        $collection = collect([
            "nama" => "Laura",
            "sekolah" => "SMA 5 Lampung",
            "kota" => "Lampung",
            "jurusan" => "IPA",
        ]);

        // Ambil nilai berdasarkan key
        dump( $collection->get('sekolah') );         // "SMA 5 Lampung"

        // Ambil nilai berdasarkan key. Jika tidak ditemukan, kembalikan nilai di argument kedua
        dump( $collection->get('umur',17) );         // 17"

        // Cek apakah ada key tertentu
        dump( $collection->has('jurusan') );        // true
        dump( $collection->has('umur') );           // false

        // Ganti isi collection
        $hasil = $collection->replace([
            'sekolah' => 'SMK 2 Palembang',
            'kota' => 'Palembang'
        ]);

        dump( $hasil );

        // Hapus isi collection
        // dump( $collection->forget('sekolah') );

        // Balik isi collection, yakni key menjadi value dan value menjadi key
        dump( $collection->flip() );

        // Ambil semua key
        dump( $collection->keys() );

        // Ambil semua value
        dump( $collection->values() );

        // Cari element collection dengan nilai 'IPA', lalu kembalikan key yang berisi nilai tersebut
        dump( $collection->search('IPA') );

        // Method each sebagai bentuk lain dari foreach
		$collection->each(function ($val, $key) {
            echo "$key: $val <br>";
        });

        echo "<hr>";

        // Sama dengan kode berikut
        foreach($collection as $key => $val) {
            echo "$key = $val <br>";
        }
    }

    public function collectionLima()
    {
        $collection = collect([
            ['namaProduk' => 'Laptop A', 'harga' => 59990000],
            ['namaProduk' => 'Smartphone B', 'harga' => 1599000],
            ['namaProduk' => 'Speaker C', 'harga' => 350000],
        ]);

        dump( $collection );

        // Urutkan berdasarkan key harga
        dump( $collection->sortBy('harga') );

        // Urutkan berdasarkan key harga
        dump( $collection->sortByDesc('harga') );

        // Urutkan berdasarkan key harga dan tampilkan sebagai array
        dump( $collection->sortBy('harga')->all() );

        // Urutkan berdasarkan key harga dan tampilkan menggunakan method each()
        $collection->sortBy('harga')->each(function ($val, $key) {
            echo $val['namaProduk']."<br>";
        });

        // Filter untuk mengambil element collection dengan harga < 2000000
        $hasil = $collection->filter(function ($val, $key) {
            return $val['harga'] < 2000000;
        });
        dump( $hasil );

        // Cari element yang key harga bernilai 350000
        dump( $collection->where('harga', 350000) );

        // Tampilkan nama produk yang element key harga lebih dari 1000000
        dump( $collection->where('harga','>=', 1000000) );

        // Tampilkan nama produk yang element key harga bernilai 350000
        $hasil = $collection->where('harga', 350000)->first();
        echo $hasil['namaProduk']."<br>";      // Speaker C

        // Tampilkan nama produk yang element key harga bernilai 350000
        $hasil = $collection->firstWhere('harga', 350000);
        echo $hasil['namaProduk']."<br>";      // Speaker C

        // Tampilkan nama produk yang element key harga lebih dari 1000000
        $hasil = $collection->where('harga','>=', 1000000)->all();

        echo "<hr>";

        foreach($hasil as $val) {
            echo $val['namaProduk']."<br>";
        }

        // Cari element dengan harga antara  100000 - 2000000
        dump( $collection->whereBetween('harga', [100000, 2000000]) );

        // Cari element dengan harga bukan di antara  100000 - 2000000
        dump( $collection->whereNotBetween('harga', [100000, 2000000]) );

        // Cari element dengan harga 1599000, 2999000 atau 3999000
        dump( $collection->whereIn('harga', [1599000, 2999000, 3999000]) );

        // Cari element dengan harga selain 1599000, 2999000, 3999000
        dump( $collection->whereNotIn('harga', [1599000, 2999000, 3999000]) );

        // Ambil namaProduk dari semua element
        dump( $collection->pluck('namaProduk') );
    }

    public function collectionEnam()
    {
        $siswa00 = new \stdClass();
        $siswa00->nama = "Rian";
        $siswa00->sekolah = "SMK Pelita Ibu";
        $siswa00->jurusan = "IPA";

        $siswa01 = new \stdClass();
        $siswa01->nama = "Nova";
        $siswa01->sekolah = "SMA 2 Kota Baru";
        $siswa01->jurusan = "IPA";

        $siswa02 = new \stdClass();
        $siswa02->nama = "Rudi";
        $siswa02->sekolah = "MA Al Hidayah";
        $siswa02->jurusan = "IPS";

        $siswas = collect([
            0 => $siswa00,
            1 => $siswa01,
            2 => $siswa02,
        ]);

        dump($siswas);

        // Cara mengakses nilai collection
        echo $siswas[0]->nama;
        echo "<br>";
        echo $siswas[2]->sekolah;

        echo "<hr>";

        // Perulangan foreach untuk menampilkan data
        foreach($siswas as $siswa) {
            echo $siswa->nama;  echo "<br>";
        }

        echo "<hr>";

        // Tampilkan nama sekolah dari siswa bernama Nova
        $siswa = $siswas->where('nama','Nova')->first();
        echo $siswa->sekolah;    // SMA 2 Kota Baru

        // Percobaan jika tidak pakai first
        $siswa = $siswas->where('nama','Nova');
        // echo $siswa->sekolah;    // Ini akan error
        dump($siswa);
        // echo $siswa[1]->sekolah;

        // Percobaan jika pakai first
        $siswa = $siswas->where('nama','Nova')->first();
        dump($siswa);

        // Tampilkan data siswa dengan key 2
        $siswa = $siswas->get(2);
        echo "$siswa->nama, $siswa->sekolah, $siswa->jurusan";
        // Rudi, MA Al Hidayah, IPS

        // Sortir siswa berdasarkan jurusan
        $hasil = $siswas->groupBy('jurusan');
        dump($hasil);

        // Tampilkan nama mahasiswa jurusan IPA
        $namaJurusanIpa = $siswas->groupBy('jurusan')->get('IPA')
                          ->pluck('nama')->all();
        echo 'Nama siswa jurusan IPA: '.implode(', ',$namaJurusanIpa);
    }

    public function exercise()
    {
        $matkul00 = new \stdClass();
        $matkul00->namaMatkul = "Sistem Operasi";
        $matkul00->jumlahSks = 3;
        $matkul00->semester = 3;

        $matkul01 = new \stdClass();
        $matkul01->namaMatkul = "Algoritma dan Pemrograman";
        $matkul01->jumlahSks = 4;
        $matkul01->semester = 1;

        $matkul02 = new \stdClass();
        $matkul02->namaMatkul = "Kalkulus Dasar";
        $matkul02->jumlahSks = 2;
        $matkul02->semester = 1;

        $matkul03 = new \stdClass();
        $matkul03->namaMatkul = "Basis Data";
        $matkul03->jumlahSks = 2;
        $matkul03->semester = 3;

        $matkuls = collect([$matkul00, $matkul01, $matkul02, $matkul03]);

        dump($matkuls);

        // Tampilkan daftar mata kuliah di semester 3, menggunakan implode
        $matkulsSem3 = $matkuls->groupBy('semester')->get(3)
                       ->pluck('namaMatkul')->all();
        echo 'Nama mata kuliah di semester 3: '.implode(', ',$matkulsSem3);

        echo "<hr>";

        // Tampilkan daftar mata kuliah di semester 3, menggunakan foreach
        $matkulsSem3 = $matkuls->where('semester',3);

        $stringMatkul = "";
        foreach($matkulsSem3 as $matkul) {
            $stringMatkul .= $matkul->namaMatkul.", ";
        }

        echo 'Nama mata kuliah di semester 3: '.substr($stringMatkul,0,-2);

        echo "<hr>";

         // Urutkan mata kuliah berdasarkan jumlah sks, lalu tampilkan sebagai string.
        $matkulsSort = $matkuls->sortByDesc('jumlahSks');

        $stringMatkul = "";
        foreach($matkulsSort as $matkul) {
            $stringMatkul .= "$matkul->namaMatkul ($matkul->jumlahSks), ";
        }
        echo 'Nama mata kuliah: '.substr($stringMatkul,0,-2);
    }
}