<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog İşlemleri</title>
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
<h2>Blog Ekle</h2>
<form action="{{ route('blog.ekle') }}" method="POST">
    @csrf
    <label for="category_id">Kategori Seç</label><br>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br><br>

    <label for="title">Blog Başlığı</label><br>
    <input type="text" id="title" name="title"><br><br>
    <label for="article">İçerik</label><br>
    <textarea id="article" name="article"></textarea><br><br>
    <button type="submit">Ekle</button>
</form>

<h2>Bloglar</h2>
<!-- Kategorilerin listelendiği tablo -->
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Kategori</th>
        <th>Başlık</th>
        <th>İçerik</th>
        <th>İşlemler</th>
    </tr>
    </thead>
    <tbody>
    <!-- Kategorilerin burada döngüyle listelendiği satırlar -->
    @foreach ($blogs as $blog)
        <tr>
            <td>{{ $blog->id }}</td>
            <td>{{ $blog->category_id }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->article }}</td>
            <td>
                <!-- Kategori güncelleme modalı açma butonu -->
                <button onclick="openModal('{{ route('blog.guncelle', ['id' => $blog->id]) }}')">Güncelle</button>
                <!-- Kategori silme formu -->
                <form action="{{ route('blog.sil', ['id' => $blog->id]) }}">
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
