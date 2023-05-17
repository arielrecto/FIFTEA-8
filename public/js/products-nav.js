document.addEventListener("DOMContentLoaded", () => {
    
    const milkteaContainer = document.getElementById('miltea');
    const siomaiContainer = document.getElementById('siomai');
    const waffleContainer = document.getElementById('waffle');
    const chickenContainer = document.getElementById('chicken');

    const links = document.querySelectorAll('.nav');
    // var currentActive = document.querySelector('active');

    const container = document.getElementById('products-container');

    console.log(links);

    links.forEach(nav => {
        nav.addEventListener('click', () => {
            var currentActive = document.querySelector('.active');
            currentActive.classList.remove('active');
            nav.classList.add('active');

            if (nav.id === 'milktea') {
                container.innerHTML = '<x-products-milktea/>'
            }
        
        })
    });



  });