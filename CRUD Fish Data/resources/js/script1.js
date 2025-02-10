// Ganti warna teks dan background saat tag h1 di klik

let h1Node = document.getElementsByTagName('h1');

h1Node[0].addEventListener('click',function(e){
    e.target.style.backgroundColor = 'tomato';
    e.target.style.color = 'black';
});
