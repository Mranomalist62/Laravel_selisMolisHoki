<?php

namespace App\Http\Controllers;

use App\Models\Reservasi; // Make sure to import your Reservasi model
use App\Models\Ulasan; // Make sure to import your Ulasan model
use App\Models\DataPelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch data for the dashboard
        $totalReservasi = Reservasi::count();
        $homeServiceReservasi = Reservasi::where('servis', 'Home Service')->count();
        $bengkelReservasi = Reservasi::where('servis', 'Garage Service')->count();
        $averageRating = Ulasan::avg('rating'); // Get average rating from ulasans
        $totalPelanggan = DataPelanggan::count();

        return view('admin.dashboard', compact('totalReservasi', 'homeServiceReservasi', 'bengkelReservasi', 'averageRating', 'totalPelanggan'));
    }
}
