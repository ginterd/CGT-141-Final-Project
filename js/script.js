  function filterCards(monsters) {


    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
      if (monsters === 'all' || card.getAttribute('aliens-or-yokai') === monsters) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }


 

  /*References
  https://www.w3schools.com/jsref/prop_style_display.asp
  https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/forEach
  */
