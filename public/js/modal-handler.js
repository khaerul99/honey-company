document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('productModal');
    const modalBox = document.getElementById('modalBox');
    const overlay = document.getElementById('closeOverlay');
    const cards = document.querySelectorAll('.btn-detail');
    const closeBtn = document.getElementById('closeBtn');

    // 1. Fungsi Tutup Modal
    const closeModal = () => {
        overlay.classList.add('opacity-0');
        
        if (window.innerWidth < 1024) {
            modalBox.classList.add('translate-y-full');
        } else {
            modalBox.classList.add('lg:scale-95', 'lg:opacity-0');
        }

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 500);
    };

    cards.forEach(card => {
        card.addEventListener('click', function() {
            const data = {
                name: this.getAttribute('data-name'),
                price: this.getAttribute('data-price'),
                desc: this.getAttribute('data-description'),
                img: this.getAttribute('data-image'),
                cat: this.getAttribute('data-category')
            };

            document.getElementById('modalTitle').innerText = data.name;
            document.getElementById('modalPrice').innerText = 'Rp ' + data.price;
            document.getElementById('modalDesc').innerHTML = data.desc;
            document.getElementById('modalImg').src = data.img;
            document.getElementById('modalCat').innerText = data.cat;
            document.getElementById('modalWA').href = `https://wa.me/628123456789?text=Halo Honey Mood, saya ingin pesan ${data.name}`;

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            requestAnimationFrame(() => {
                overlay.classList.remove('opacity-0');
                overlay.classList.add('opacity-100');
                
                if (window.innerWidth < 1024) {
                    modalBox.classList.remove('translate-y-full');
                } else {
                    modalBox.classList.remove('lg:scale-95', 'lg:opacity-0');
                    modalBox.classList.add('lg:scale-100', 'lg:opacity-100');
                }
            });
        });
    });

    // 3. EVENT LISTENER UNTUK TUTUP
    closeBtn.addEventListener('click', closeModal);
    overlay.addEventListener('click', closeModal);

    // 4. CEGAH MODAL TUTUP SAAT KLIK BOX PUTIH (Stop Propagation)
    modalBox.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // 5. Support tombol ESC
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
});