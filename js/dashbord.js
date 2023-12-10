let menuToggle = document.querySelector('.menuToggle');
let sidebar = document.querySelector('.sidebar');

menuToggle.onclick = function() {
    menuToggle.classList.toggle('active');
    sidebar.classList.toggle('active');
}

let MenuList = document.querySelectorAll('.Menulist li');

function activeLink() {
    MenuList.forEach((item) =>
        item.classList.remove('active'));
    this.classList.add('active');
}

MenuList.forEach((item) =>
    item.addEventListener('click', activeLink));
    function showContent(contentId) {
        // Sembunyikan semua konten
        const contents = document.querySelectorAll('.content');
        contents.forEach(content => {
            content.style.display = 'none';
        });

        // Tampilkan konten yang sesuai dengan id yang diklik
        const selectedContent = document.getElementById(contentId);
        selectedContent.style.display = 'block';
    }