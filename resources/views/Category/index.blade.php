<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori İşlemleri</title>
    <style>
        /* Modal stilleri */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h2>Kategori Ekle</h2>
<form action="{{ route('category.kaydet') }}" method="POST">
    @csrf
    <label for="name">Kategori Adı:</label><br>
    <input type="text" id="name" name="name"><br><br>
    <button type="submit">Ekle</button>
</form>

<h2>Kategoriler</h2>
<!-- Kategorilerin listelendiği tablo -->
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Başlık</th>
        <th>İşlemler</th>
    </tr>
    </thead>
    <tbody>
    <!-- Kategorilerin burada döngüyle listelendiği satırlar -->
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <!-- Kategori güncelleme modalı açma butonu -->
                <button onclick="openModal('{{ route('category.guncelle', ['id' => $category->id]) }}')">Güncelle</button>
                <!-- Kategori silme formu -->
                <form action="{{ route('category.sil', ['id' => $category->id]) }}">
                    @csrf
                    <button type="submit">Sil</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<!-- Kategori güncelleme modalı -->
<div id="updateModal" class="modal">
    <!-- Modal içeriği -->
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <iframe id="updateFrame" src="" style="width:100%;height:500px;border:none;"></iframe>
    </div>
</div>

<script>
    // Modalı açma fonksiyonu
    function openModal(url) {
        document.getElementById('updateFrame').src = url; // İframe'e güncelleme formu sayfasının URL'sini ayarla
        document.getElementById('updateModal').style.display = 'block'; // Modalı göster
    }

    // Modalı kapatma fonksiyonu
    function closeModal() {
        document.getElementById('updateModal').style.display = 'none'; // Modalı gizle
    }
</script>
</body>
</html>
