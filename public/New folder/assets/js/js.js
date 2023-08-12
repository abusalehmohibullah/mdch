

// JavaScript
// document.addEventListener("DOMContentLoaded", function () {
//   const menuBtns = document.getElementById('menu-btns');
//   const menuItems = document.getElementById('menuItems');
//   const buttons = menuItems.getElementsByClassName('nav-link');

//   menuBtns.classList.remove('d-none');

//   let totalWidth = menuBtns.offsetWidth;
//   let buttonsWidth = 0;
//   let visibleButtons = 0;

//   for (let i = 0; i < buttons.length; i++) {
//     buttonsWidth += buttons[i].offsetWidth;
//     if (buttonsWidth < totalWidth) {
//       visibleButtons++;
//     } else {
//       buttons[i].parentNode.classList.add('d-none'); // Add d-none class
//     }
//   }

//   console.log(`Visible buttons: ${visibleButtons}`);
//   console.log(`Total Width: ${totalWidth}`);
//   console.log(`Buttons Width: ${buttonsWidth}`);
//   console.log(`Visible Buttons: ${visibleButtons}`);
// });





$(document).ready(function () {

    // Show the modal
    $('#sectionModal').modal('show');
  

});




const ul = document.querySelector(".notice-container ul");
const container = document.querySelector(".notice-container");
const ulWidth = ul.scrollWidth;
const containerWidth = container.offsetWidth;
const animationDuration = ulWidth / 60; // adjust this value to change the animation speed
const style = document.createElement("style");

style.textContent = `
  .notice-container ul {
    animation: scroll ${animationDuration}s infinite linear;
  }

  .notice-container:hover ul {
    animation-play-state: paused;
  }

  @keyframes scroll {
    from {
      transform: translateX(calc(${containerWidth}px));
    }
  
    to {
      transform: translateX(calc(-${ulWidth}px));
    }
  }
`;

document.head.appendChild(style);






function openAlbum(id) {
  // Use the id parameter in your JavaScript logic
  console.log('Opening album with id:', id);

  Fancybox.bind('[data-fancybox="album-' + id + '"]', {
    //
  });
}

$(".testmonial_slider_area").owlCarousel({
  autoplay: true,
  slideSpeed: 1000,
  items: 3,
  loop: true,
  nav: true,
  navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
  margin: 30,
  dots: true,
  responsive: {
    320: {
      items: 1
    },
    767: {
      items: 2
    },
    600: {
      items: 2
    },
    1000: {
      items: 3
    }
  }

});

$(".specialization_slider_area").owlCarousel({
  autoplay: true,
  slideSpeed: 1000,
  items: 3,
  loop: true,
  nav: true,
  navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
  margin: 30,
  dots: true,
  responsive: {
    320: {
      items: 2
    },
    767: {
      items: 3
    },
    600: {
      items: 2
    },
    1000: {
      items: 4
    }
  }

});




$(document).ready(function() {
    // Select all image and text containers
    const $imageContainers = $('.img-container');
    const $textContainers = $('.text-container');

    // Loop through each section
    $imageContainers.each(function(index) {
        const $image = $(this);
        const $text = $textContainers.eq(index);

        // Get the height of the image
        const imageHeight = $image.height();

        // Apply the image height to the text container
        $text.css('height', imageHeight + 'px');
        $text.css('display', 'block');
    });
});



