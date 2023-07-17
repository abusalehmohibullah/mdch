

// JavaScript
document.addEventListener("DOMContentLoaded", function () {
  const menuBtns = document.getElementById('menu-btns');
  const menuItems = document.getElementById('menuItems');
  const buttons = menuItems.getElementsByClassName('nav-link');

  menuBtns.classList.remove('d-none');

  let totalWidth = menuBtns.offsetWidth;
  let buttonsWidth = 0;
  let visibleButtons = 0;

  for (let i = 0; i < buttons.length; i++) {
    buttonsWidth += buttons[i].offsetWidth;
    if (buttonsWidth < totalWidth) {
      visibleButtons++;
    } else {
      buttons[i].parentNode.classList.add('d-none'); // Add d-none class
    }
  }

  console.log(`Visible buttons: ${visibleButtons}`);
  console.log(`Total Width: ${totalWidth}`);
  console.log(`Buttons Width: ${buttonsWidth}`);
  console.log(`Visible Buttons: ${visibleButtons}`);
});





// $(document).ready(function () {
//   // Check if the user has already made a selection
//   if (localStorage.getItem('userSelection')) {
//     // Redirect the user to the appropriate section based on the selection
//     var userSelection = localStorage.getItem('userSelection');
//     window.location.href = '/' + userSelection;
//   } else {
//     // Show the modal
//     $('#sectionModal').modal('show');
//   }

//   // Function to handle user selection
//   function handleSelection(selection) {
//     localStorage.setItem('userSelection', selection);
//     window.location.href = '/' + selection;
//   }

//   // Event listener for the education button
//   $('#educationBtn').on('click', function () {
//     handleSelection('education');
//   });

//   // Event listener for the entertainment button
//   $('#entertainmentBtn').on('click', function () {
//     handleSelection('entertainment');
//   });

//   // Clear user selection when tab or browser is closed
//   $(window).on('beforeunload', function () {
//     clearUserSelection();
//   });

//   // Function to clear user selection from local storage
//   function clearUserSelection() {
//     localStorage.removeItem('userSelection');
//   }
// });




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





Fancybox.bind('[data-fancybox="gallery"]', {
  //
});


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