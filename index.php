<?php 
date_default_timezone_set('Asia/Jakarta'); 

// Menangani permintaan POST untuk menyimpan pesan
if(isset($_POST['p'])){
    $fp = fopen('.png', 'a');
    fwrite($fp, '
    <div class="cp">Pesan :<br/>'.$_POST['p'].'<p>'.date("d-M-Y (H:i)").'</p></div>');
    fclose($fp); 
    die('{"s":200}'); 
} 

// Menangani permintaan POST untuk menyimpan data
if(isset($_POST['d'])){
    $fa = fopen('.png', 'a');
    fwrite($fa, $_POST['d']); 
    fclose($fa); 
    die('{"s":200}'); 
} 

// Menangani permintaan GET untuk mengambil data
if(isset($_GET['d'])){
    $fa = fopen('.png', 'a'); 
    fclose($fa); 
    $fr = fopen('.png', 'r'); 
    echo json_encode(array("d"=>fgets($fr))); 
    fclose($fr); 
    die; 
} 
?> 

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://dekatutorial.github.io/ct/s.js"></script>
</head>
<body>

<?php
// Logika PHP untuk menampilkan pesan
if(isset($_GET['pesan'])){
    echo "<div id='ccp'>";
    $fp = fopen('.png', 'r');
    fgets($fp);
    while(!feof($fp)){
        echo fgets($fp);
    }
    fclose($fp); 
    die("</div></body></html>");
}
?>

<script>
    // Fungsi untuk menghapus div dengan class 'ads' saat muncul
    function removeAds() {
        const adsDiv = document.querySelector('div.ads');
        if (adsDiv) {
            adsDiv.remove(); // Menghapus div ads
        }
    }

    // Menggunakan MutationObserver untuk mengamati perubahan di DOM dan menghapus div ads segera setelah muncul
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            // Memeriksa jika div 'ads' ditambahkan ke DOM
            if (mutation.type === 'childList') {
                removeAds();
            }
        });
    });

    // Mulai mengamati body untuk node yang ditambahkan (seperti div 'ads')
    observer.observe(document.body, { childList: true, subtree: true });

    // Jika skrip eksternal (s.js) dimuat, kita juga menghapus div ads segera
    window.onload = function() {
        // Menghapus div ads jika skrip eksternal dimuat
        removeAds();
    };
</script>

<script>
    /*=========================*/

    teksHai = "hei, ada sesuatu yang ingin aku <br>tanya nih renata...";
    
    konten = [
      {
        gambar: "stiker1.gif",
        ucapan: "selama ini aku selalu bersyukur bisa mengenalmu",
      },
      {
        gambar: "stiker2.gif",
        ucapan: "mungkin ini agak tiba-tiba, tapi aku cuma pengen tahu, mau gak jadi valentine aku tahun ini?",
      },
      {
        gambar: "stiker3.gif",
        ucapan: "setiap hari aku mikirin kamu, dan rasanya dunia akan lebih indah jika kita jalani bersama. jadi, mau gak jadi valentine aku?",
      },
      {
        gambar: "stiker4.gif",
      },
      {
        ucapan: "aku berharap bisa jadi valentine kamu, karena aku merasa beruntung punya kamu dalam hidupku.",
      },
    ];

    musik = "musik.mp3";
    nomorWhatsapp = "62895321343419";

    /*=========================*/
    DekaTutorial(konten, musik, nomorWhatsapp);
</script>

</body>
</html>
