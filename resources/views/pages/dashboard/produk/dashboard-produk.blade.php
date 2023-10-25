@extends('layouts.dashboard.halaman-layout')

@section('konten')


    <h1>Produk</h1>
    <!-- Tampilkan daftar produk dari database -->
    <table>
        <tr>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Harga</th>
        </tr>
        {{-- ungkan ke database dan ambil data produk
        // Misalnya, menggunakan MySQLi atau PDO
        $db = new mysqli("localhost", "username", "password", "database_name");

        // Periksa koneksi database
        if ($db->connect_error) {
            die("Koneksi database gagal: " . $db->connect_error);
        }

        $sql = "SELECT * FROM products";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Tidak ada produk yang ditemukan.";
        }

        $db->close(); --}}
        @foreach ($produk1 as $p)
        <tr>
            <td>
                {{$p->id_produk}}
            </td>
            <td>
                {{$p->nama_produk}}
            </td>
            <td>
                {{$p->harga_produk}}
            </td>
        </tr>
            @endforeach
    </table>


@endsection