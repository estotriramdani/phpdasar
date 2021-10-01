// Ambil elemen2 yang dibutuhkan

const keyword = document.getElementById('keyword');
const tombolCari = document.getElementById('tombol-cari');
const container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
	
	// buat object ajax
	var xhr = new XMLHttpRequest();

	// cek kesiapan ajax
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200){
			container.innerHTML = xhr.responseText;		
		} else if (xhr.readyState == 4 && xhr.status == 404){
			container.innerHTML = 'Tidak ada'
		}
	}
	// eksekusi ajax
	xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
	xhr.send();
})