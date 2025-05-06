<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('login');
    }

    // Memproses form login
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');

        // Redirect ke dashboard dengan username sebagai query parameter
        return redirect()->route('dashboard', ['username' => $username]);
    }

    // Menampilkan dashboard dengan username dari query parameter
    public function dashboard(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
        }

        // Data Statistik
        $stats = [
            'total_reservasi' => 60,
            'reservasi_hari_ini' => 3,
            'kamar_tersedia' => 12,
            'reservasi_bulan_ini' => 5,
            'reservasi_tahun_ini' => 50,
            'checkin_hari_ini' => 2,
            'checkout_hari_ini' => 1,
            'total_kamar' => 30,
            'kamar_terisi' => 18,
        ];

        // Data Tipe Kamar
        $room_types = [
            'deluxe' => [
                'name' => 'Deluxe Room',
                'price' => 1500000,
                'image' => 'deluxe.png',
                'facilities' => [
                    'Luas: 30 m²',
                    'Kasur King Size',
                    'AC & TV LED 32"',
                    'Kamar Mandi Lux'
                ],
                'availability' => true
            ],
            'suite' => [
                'name' => 'Suite Room',
                'price' => 2500000,
                'image' => 'suite-room.png',
                'facilities' => [
                    'Luas: 50 m²',
                    'Kasur King Size + Sofa Bed',
                    'Private Balcony',
                    'Bath Tub & Shower'
                ],
                'availability' => true
            ]
        ];

        // Data Fasilitas Hotel
        $facilities = [
            [
                'icon' => 'wifi',
                'name' => 'Wi-Fi Gratis',
                'description' => 'Akses internet cepat di seluruh area hotel'
            ],
            [
                'icon' => 'cup-hot',
                'name' => 'Restoran',
                'description' => 'Menu Nusantara'
            ],
            [
                'icon' => 'water',
                'name' => 'Kolam Renang',
                'description' => 'Kolam outdoor dengan view kota'
            ],
            [
                'icon' => 'car-front',
                'name' => 'Parkir Gratis',
                'description' => 'Area parkir 24 jam'
            ],
            [
                'icon' => 'brightness-high',
                'name' => 'Ruang Meeting',
                'description' => 'Kapasitas hingga 50 orang'
            ],
            [
                'icon' => 'heart-fill',
                'name' => 'Spa',
                'description' => 'Pijat tradisional'
            ]
        ];

        // Data Galeri
        $gallery = [
            'lobi.png',
            'restoran.png',
            'kolam-renang.png',
            'kamar-mandi.png',
            'taman.png',
            'view-kota.png'
        ];

        $welcome_message = 'Selamat datang, ' . $username . '!';

        return view('dashboard', [
            'username' => $username,
            'stats' => $stats,
            'welcome_message' => $welcome_message,
            'room_types' => $room_types,
            'facilities' => $facilities,
            'gallery' => $gallery
        ]);
    }

    //Menampilkan halaman pengelolaan data
    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
        }


        $reservations = [
            [
                'id' => 1,
                'nama_tamu' => 'Nandini Putri',
                'check_in' => '2024-06-15',
                'check_out' => '2024-06-18',
                'tipe_kamar' => 'Deluxe',
                'status' => 'Confirmed',
                'total_harga' => 1500000
            ],
            [
                'id' => 2,
                'nama_tamu' => 'Afiyah Denok',
                'check_in' => '2024-06-20',
                'check_out' => '2024-06-25',
                'tipe_kamar' => 'Suite',
                'status' => 'Confirmed',
                'total_harga' => 2500000
            ],
            [
                'id' => 3,
                'nama_tamu' => 'Rafika Fauziah',
                'check_in' => '2024-07-09',
                'check_out' => '2024-07-21',
                'tipe_kamar' => 'Suite',
                'status' => 'Pending',
                'total_harga' => 2500000
            ],
            [
                'id' => 4,
                'nama_tamu' => 'Faried',
                'check_in' => '2024-07-10',
                'check_out' => '2024-07-15',
                'tipe_kamar' => 'Standard',
                'status' => 'Cancelled',
                'total_harga' => 1000000
            ],
            [
                'id' => 5,
                'nama_tamu' => 'Diana Sari',
                'check_in' => '2024-07-12',
                'check_out' => '2024-07-20',
                'tipe_kamar' => 'Deluxe',
                'status' => 'Confirmed',
                'total_harga' => 1500000
            ],
            [
                'id' => 6,
                'nama_tamu' => 'Sasindy',
                'check_in' => '2024-07-15',
                'check_out' => '2024-07-18',
                'tipe_kamar' => 'Standard',
                'status' => 'Confirmed',
                'total_harga' => 1000000
            ],
            [
                'id' => 7,
                'nama_tamu' => 'Aisyah Gita',
                'check_in' => '2024-07-20',
                'check_out' => '2024-07-25',
                'tipe_kamar' => 'Suite',
                'status' => 'Pending',
                'total_harga' => 2500000
            ],
            [
                'id' => 8,
                'nama_tamu' => 'Andi Saputra',
                'check_in' => '2024-07-22',
                'check_out' => '2024-07-28',
                'tipe_kamar' => 'Deluxe',
                'status' => 'Cancelled',
                'total_harga' => 1500000
            ],
            [
                'id' => 9,
                'nama_tamu' => 'Budi Santoso',
                'check_in' => '2024-07-25',
                'check_out' => '2024-07-30',
                'tipe_kamar' => 'Standard',
                'status' => 'Confirmed',
                'total_harga' => 1000000
            ],
            [
                'id' => 10,
                'nama_tamu' => 'Cindy Lestari',
                'check_in' => '2024-08-01',
                'check_out' => '2024-08-05',
                'tipe_kamar' => 'Suite',
                'status' => 'Confirmed',
                'total_harga' => 2500000
            ]
        ];

        return view('pengelolaan', [
            'username' => $username,
            'reservations' => $reservations
        ]);
    }

    // Menampilkan halaman profile dengan username dari query parameter
    public function profile(Request $request) {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
        }

        // User database
        $users = [
            'admin' => [
                'email' => 'admin@hotel.com',
                'telepon' => '0812-3456-7890',
                'member_sejak' => '2022-01-10',
                'account_type' => 'Administrator',
                'status' => 'Aktif'
            ],
            'nandini' => [
                'email' => 'nandini@gmail.com',
                'telepon' => '0812-8888-9999',
                'member_sejak' => '2023-01-15',
                'account_type' => 'Premium Member',
                'status' => 'Aktif'
            ],
            'afiyah' => [
                'email' => 'afiyah@gmail.com',
                'telepon' => '0812-7777-8888',
                'member_sejak' => '2023-02-20',
                'account_type' => 'Standard Member',
                'status' => 'Aktif'
            ],
        ];

        // Default profile for new users
        $profile = array_key_exists($username, $users)
            ? $users[$username]
            : [
                'email' => $username . '@gmail.com',
                'telepon' => '0812-0000-0000',
                'member_sejak' => now()->format('Y-m-d'),
                'account_type' => 'Standard Member',
                'status' => 'Aktif'
            ];

        return view('profile', [
            'username' => $username,
            'profile' => $profile
        ]);
    }

    public function logout(Request $request)
    {
        // Redirect ke login
        return redirect()->route('login')->with([
            'message' => 'Anda telah berhasil logout'
        ]);
    }
}
